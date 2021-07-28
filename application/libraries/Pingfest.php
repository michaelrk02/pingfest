<?php
defined('BASEPATH') OR exit;

class Pingfest {

    protected $ci;

    public function __construct() {
        $this->ci =& get_instance();

        $this->ci->load->model('pingdb_model', 'pingdb');

        $this->ci->load->library('jwt');
        $this->ci->load->library('storage');
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
                            $user = $this->ci->pingdb->get_user($_SESSION['user_id'], 'user_id, name, email');
                            if (isset($user)) {
                                $response_data = [];
                                $response_data['expired'] = time() + 5;
                                $response_data['user_id'] = $user['user_id'];
                                $response_data['name'] = $user['name'];
                                $response_data['email'] = $user['email'];
                                if (($app_id === 'botplatform') || ($app_id === 'bottour')) {
                                    $battle_data = $this->ci->pingdb->get_battle_data($user['user_id'], 'team_name');
                                    if (isset($battle_data)) {
                                        $response_data['name'] = $battle_data['team_name'];
                                    } else {
                                        $response_data['disallow'] = TRUE;
                                    }
                                }

                                $response = $this->ci->jwt->create($response_data, 86400, $app['secret_key']);
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

}

