<?php
defined('BASEPATH') OR exit;

class Pingfest {

    protected $ci;

    public function __construct() {
        $this->ci =& get_instance();

        $this->ci->load->model('pingdb_model', 'pingdb');
        
        $this->ci->load->helper('rupiah');

        $this->ci->load->library('email');
        $this->ci->load->library('jwt');
        $this->ci->load->library('storage');

        $this->ci->email->initialize([
            'mailtype' => 'html',
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE,
            'crlf' => "\r\n",
            'newline' => "\r\n",
            'validate' => TRUE
        ]);
    }

    public function view_battle_idcard($user_id) {
        $this->ci->storage->access('idcard/battle/'.$user_id, 10, 'IDCARD_BATTLE_'.url_title($user_id).'.pdf');
    }

    public function view_paper_idcard($user_id) {
        $this->ci->storage->access('idcard/paper/'.$user_id, 10, 'IDCARD_PAPER_'.url_title($user_id).'.pdf');
    }

    public function view_paper_submission($user_id) {
        $this->ci->storage->access('submission/paper/'.$user_id, 10, 'SUBMISSION_PAPER_'.url_title($user_id).'.pdf');
    }

    public function sso_handle() {
        $request = $this->ci->input->get('sso');

        $sso = NULL;

        if (!empty($request)) {
            $request_data = $this->ci->jwt->get_data($request);

            $app_id = isset($request_data['app_id']) ? $request_data['app_id'] : NULL;
            $timestamp = isset($request_data['timestamp']) ? $request_data['timestamp'] : NULL;
            if (isset($app_id) && isset($timestamp) && (time() < $timestamp + 900)) {
                $app = $this->ci->pingdb->get_sso_app($app_id);
                if (isset($app)) {
                    $request_data = $this->ci->jwt->extract($request, $app['secret_key']);
                    if (isset($request_data)) {
                        $sso = [];
                        $sso['app_name'] = $app['name'];
                        $sso['url_param'] = '?sso='.urlencode($request);

                        if (isset($_SESSION['user_id'])) {
                            $user = $this->ci->pingdb->get_user($_SESSION['user_id'], 'user_id, name, email, phone');
                            if (isset($user)) {
                                $response_data = [];
                                $response_data['expired'] = time() + 5;
                                $response_data['user_id'] = $user['user_id'];
                                $response_data['name'] = $user['name'];
                                $response_data['email'] = $user['email'];
                                if (($app_id === 'botplatform') || ($app_id === 'bottour')) {
                                    $battle_data = $this->ci->pingdb->get_battle_data($user['user_id'], 'team_name');
                                    if (isset($battle_data)) {
                                        $response_data['name'] = $battle_data['team_name'].' (@'.$user['user_id'].')';
                                    } else {
                                        $response_data['disallow'] = TRUE;
                                    }
                                }
                                if ($app_id === 'semnas') {
                                    $semnas_data = $this->ci->pingdb->get_semnas_data($user['user_id'], 'user_id, institution');
                                    if (!isset($semnas_data)) {
                                        $response_data['disallow'] = TRUE;
                                    } else {
                                        $response_data['phone'] = $user['phone'];
                                        $response_data['institution'] = $semnas_data['institution'];
                                    }
                                }

                                $response = $this->ci->jwt->create($response_data, NULL, $app['secret_key']);
                                if (isset($request_data['redirect_url']) && isset($request_data['redirect_param'])) {
                                    redirect($request_data['redirect_url'].'?'.$request_data['redirect_param'].'='.urlencode($response));
                                }
                            } else {
                                die('User does not exist');
                            }
                        }
                    } else {
                        die('Invalid SSO token');
                    }
                } else {
                    die('App not found');
                }
            } else {
                die('Invalid SSO parameters');
            }
        }

        return $sso;
    }

    public function send_email($to, $subject, $message) {
        if (PF_EMAIL_PIPE !== NULL) {
            $message = '<!-- to: '.htmlspecialchars($to).', subject: '.htmlspecialchars($subject).' -->'.PHP_EOL.$message;
            file_put_contents(PF_EMAIL_PIPE, $message);
        } else {
            $this->ci->email->from(PF_EMAIL_ADDRESS, 'PINGFEST');
            $this->ci->email->to($to);
            $this->ci->email->subject('[PINGFEST] '.$subject);
            $this->ci->email->message($message);
            @$this->ci->email->send();
        }
    }

    public function send_payment_accept_email($user_id, $event_id, $invoice) {
        $user = $this->ci->pingdb->get_user($user_id, 'email');
        $event = $this->ci->pingdb->get_event($event_id, 'name');
        $message = $this->ci->load->view('templates/email_accept_payment', [
            'user_id' => $user_id,
            'event_name' => $event['name'],
            'invoice' => $invoice,
            'profile_url' => site_url('profile/index')
        ], TRUE);
        $this->send_email($user['email'], 'Pembayaran Diterima ('.$user_id.' @ '.$event['name'].')', $message);
    }

    public function send_payment_decline_email($user_id, $event_id, $invoice) {
        $user = $this->ci->pingdb->get_user($user_id, 'email');
        $event = $this->ci->pingdb->get_event($event_id, 'name');
        $message = $this->ci->load->view('templates/email_decline_payment', [
            'user_id' => $user_id,
            'event_name' => $event['name'],
            'invoice' => $invoice,
            'profile_url' => site_url('profile/index')
        ], TRUE);
        $this->send_email($user['email'], 'Pembayaran Ditolak ('.$user_id.' @ '.$event['name'].')', $message);
    }

    public function antispam_init($module, $cooldown) {
        $var = 'antispam:'.$module;
        if (!isset($_SESSION[$var])) {
            $_SESSION[$var] = ['cooldown' => $cooldown, 'timestamp' => 0];
        }
    }

    public function antispam_handle($module) {
        $var = 'antispam:'.$module;
        if (isset($_SESSION[$var])) {
            $timeleft = $_SESSION[$var]['timestamp'] + $_SESSION[$var]['cooldown'] - time();
            if ($timeleft <= 0) {
                $_SESSION[$var]['timestamp'] = time();
            } else {
                die('Harap untuk menunggu selama '.$timeleft.' detik kemudian ulangi kembali tindakan anda');
            }
        } else {
            die('Terjadi suatu kesalahan. Harap untuk kembali dan merefresh halaman lagi');
        }
    }

}

