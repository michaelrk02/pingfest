<?php
defined('BASEPATH') OR exit;

class Profile extends CI_Controller {

    private $user;

    public function __construct() {
        parent::__construct();

        $this->load->helper('rupiah');

        $this->load->model('profile_cfg_model', 'cfg');
        $this->load->model('profile_events_model', 'events');
        $this->load->model('profile_users_model', 'users');
    }

    public function index() {
        $this->check_login();

        $invoice_expire = $this->cfg->get('invoice_expire');
        $invoice_expire = !empty($invoice_expire) ? $invoice_expire : 86400;

        $events = $this->events->list_events();

        $registration_data = $this->events->participant_get_list($_SESSION['user_id']);
        $registration = [];
        foreach ($registration_data as $item) {
            $registration[$item['event_id']] = $item;
            $registration[$item['event_id']]['expired'] = $item['timestamp'] + $invoice_expire;
        }

        $bank_account = $this->cfg->get('bank_account');
        $bank_account = !empty($bank_account) ? $bank_account : '-';

        $status = NULL;
        if (isset($_SESSION['profile_status'])) {
            $status = $_SESSION['profile_status'];
            unset($_SESSION['profile_status']);
        }

        $this->load->view('header', ['title' => 'Your Profile']);
        $this->load->view('profile/details', ['user' => $this->user, 'events' => $events, 'registration' => $registration, 'bank_account' => $bank_account, 'status' => $status]);
        $this->load->view('footer');
    }

    public function register() {
        $this->check_login();

        $event_id = $this->input->get('event');

        if (!empty($event_id)) {
            $event = $this->events->get($event_id, 'price,available');
            if (isset($event)) {
                if ($this->events->participant_get($_SESSION['user_id'], $event_id, 'user_id') === NULL) {
                    if (!empty($event['available'])) {
                        $participant = [];
                        $participant['user_id'] = $_SESSION['user_id'];
                        $participant['event_id'] = $event_id;
                        $participant['status'] = 0;
                        $participant['timestamp'] = time();
                        $participant['invoice'] = $event['price'];
                        $participant['unique'] = random_int(0, 999);
                        $participant['total'] = $participant['invoice'] + $participant['unique'];
                        if ($this->events->participant_add($participant)) {
                            $_SESSION['profile_status'] = 'SUCCESS: Berhasil membuat invoice. Silakan untuk membayar ke rekening yang tertera sesuai jumlah invoice total';
                            redirect(site_url('profile/index').'#invoice-'.md5($event_id));
                            return;
                        } else {
                            $_SESSION['profile_status'] = 'ERROR: Gagal membuat invoice. Silakan coba lagi. Jika masalah masih berlanjut, segera hubungi CP';
                        }
                    } else {
                        $_SESSION['profile_status'] = 'ERROR: Pendaftaran telah ditutup untuk event tersebut';
                    }
                } else {
                    $_SESSION['profile_status'] = 'ERROR: Anda telah terdaftar dalam event ini';
                }
            } else {
                $_SESSION['profile_status'] = 'ERROR: Event tidak tersedia';
            }
        }
        redirect('profile/index');
    }

    public function reset() {
        $this->check_login();

        $event_id = $this->input->get('event');

        if (!empty($event_id)) {
            $event = $this->events->get($event_id, 'event_id');
            if (isset($event)) {
                if ($this->events->participant_get($_SESSION['user_id'], $event_id, 'user_id') !== NULL) {
                    if ($this->events->participant_remove($_SESSION['user_id'], $event_id)) {
                        $_SESSION['profile_status'] = 'SUCCESS: Berhasil menghapus invoice. Anda dapat melakukan pemesanan lagi';
                    } else {
                        $_SESSION['profile_status'] = 'ERROR: Gagal menghapus invoice. Silakan coba lagi. Hubungi CP jika masalah berlanjut';
                    }
                } else {
                    $_SESSION['profile_status'] = 'ERROR: Anda tidak terdaftar dalam event ini';
                }
            } else {
                $_SESSION['profile_status'] = 'ERROR: Event tidak tersedia';
            }
        }
        redirect('profile/index');
    }

    public function fake_login() {
        if (PF_ENV === 'production') {
            die('Fake login is disabled in production environment');
        }

        if (!empty($_SESSION['user_id'])) {
            redirect('profile/index');
        }

        if (!empty($this->input->post('submit'))) {
            $this->load->model('profile_users_model', 'users');

            $user_id = $this->input->post('user_id');

            $user = $this->users->get($user_id, 'user_id');
            if (isset($user)) {
                $_SESSION['user_id'] = $user_id;
                redirect('profile/index');
            } else {
                die('User does not exist');
            }
        }

        $this->load->view('header', ['title' => 'Fake Login']);
        $this->load->view('profile/fake_login');
        $this->load->view('footer');
    }

    public function fake_logout() {
        if (isset($_SESSION['user_id'])) {
            unset($_SESSION['user_id']);
        }
        redirect('profile/index');
    }

    private function check_login() {
        if (empty($_SESSION['user_id'])) {
            redirect('auth/login');
        }

        $this->user = $this->users->get($_SESSION['user_id'], 'name, email, phone');
    }

}

