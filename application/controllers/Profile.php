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

        $tabs = [
            ['id' => 'registration', 'title' => 'Pendaftaran'],
            ['id' => 'e_battle', 'title' => 'Battle of Technology'],
            ['id' => 'e_music', 'title' => 'IT-Music'],
            ['id' => 'e_paper', 'title' => 'IT-Paper'],
            ['id' => 'e_semnas', 'title' => 'Seminar Nasional']
        ];

        $tab = $this->input->get('tab');
        $tab = isset($tab) ? $tab : 'registration';

        $page = '';
        $data = [];

        if ($tab === 'e_battle') {
            $participant = $this->events->participant_get($_SESSION['user_id'], 'battle', 'user_id');
            if (isset($participant)) {
                $identity = $this->events->battle_get($_SESSION['user_id']);
                if (isset($_SESSION['profile_battle_identity'])) {
                    $identity = $_SESSION['profile_battle_identity'];
                    unset($_SESSION['profile_battle_identity']);
                }
                if (isset($identity)) {
                    $this->load->library('storage');

                    $idcard_url = NULL;
                    if ($this->storage->exists('idcard/'.$_SESSION['user_id'])) {
                        $idcard_url = site_url('profile/battle_idcard');
                    }

                    $page = 'profile/index/setup_battle';
                    $data = ['identity' => $identity, 'idcard_url' => $idcard_url];
                } else {
                    $page = 'profile/index/setup';
                    $data = ['event' => 'battle'];
                }
            } else {
                $page = 'profile/index/unregistered';
                $data = ['event' => 'battle'];
            }
        } else if ($tab === 'e_music') {
            $participant = $this->events->participant_get($_SESSION['user_id'], 'music', 'user_id');
            if (isset($participant)) {
                $identity = $this->events->music_get($_SESSION['user_id']);
                if (isset($_SESSION['profile_music_identity'])) {
                    $identity = $_SESSION['profile_music_identity'];
                    unset($_SESSION['profile_music_identity']);
                }
                if (isset($identity)) {
                    $page = 'profile/index/setup_music';
                    $data = ['identity' => $identity];
                } else {
                    $page = 'profile/index/setup';
                    $data = ['event' => 'music'];
                }
            } else {
                $page = 'profile/index/unregistered';
                $data = ['event' => 'music'];
            }
        } else if ($tab === 'e_paper') {
            $page = 'profile/index/unregistered';
            $data = ['event' => 'paper'];
        } else if ($tab === 'e_semnas') {
            $page = 'profile/index/unregistered';
            $data = ['event' => 'semnas'];
        } else {
            $invoice_expire = $this->cfg->get('invoice_expire');
            $invoice_expire = !empty($invoice_expire) ? $invoice_expire : 86400;

            $events = $this->events->list_events();

            $registration_data = $this->events->participant_get_list($_SESSION['user_id']);
            $registration = [];
            foreach ($registration_data as $item) {
                $registration[$item['event_id']] = $item;
                $registration[$item['event_id']]['expired'] = $item['timestamp'] + $invoice_expire;
                switch ($item['event_id']) {
                case 'battle':
                    $registration[$item['event_id']]['setup'] = $this->events->battle_get($_SESSION['user_id']) !== NULL;
                    break;
                case 'music':
                    $registration[$item['event_id']]['setup'] = $this->events->music_get($_SESSION['user_id']) !== NULL;
                    break;
                default:
                    $registration[$item['event_id']]['setup'] = FALSE;
                    break;
                }
                $registration[$item['event_id']]['tab'] = 'e_'.$item['event_id'];
            }

            $bank_account = $this->cfg->get('bank_account');
            $bank_account = !empty($bank_account) ? $bank_account : '-';

            $page = 'profile/index/registration';
            $data = ['events' => $events, 'registration' => $registration, 'bank_account' => $bank_account];
        }

        $status = NULL;
        if (isset($_SESSION['profile_status'])) {
            $status = $_SESSION['profile_status'];
            unset($_SESSION['profile_status']);
        }

        $this->load->view('header', ['title' => 'Your Profile']);
        $this->load->view('profile/details', ['user' => $this->user, 'tabs' => $tabs, 'tab' => $tab, 'status' => $status]);
        $this->load->view($page, $data);
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
                        $participant['timestamp'] = time();
                        if (!empty($event['price'])) {
                            $participant['status'] = 0;
                            $participant['invoice'] = $event['price'];
                            $participant['unique'] = random_int(0, 999);
                            $participant['total'] = $participant['invoice'] + $participant['unique'];
                        } else {
                            $participant['status'] = 1;
                            $participant['invoice'] = 0;
                            $participant['unique'] = 0;
                            $participant['total'] = 0;
                        }
                        if ($this->events->participant_add($participant)) {
                            $_SESSION['profile_status'] = 'SUCCESS: Berhasil membuat invoice. Silakan untuk membayar ke rekening yang tertera sesuai jumlah invoice total';
                            redirect(site_url('profile/index').'?tab=registration#invoice-'.md5($event_id));
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

    public function setup() {
        $this->check_login();

        $event_id = $this->input->get('event');
        $event = $this->events->get($event_id, 'event_id');
        if (isset($event)) {
            if ($event_id === 'battle') {
                $identity = [];
                $identity['user_id'] = $_SESSION['user_id'];
                $identity['team_name'] = '';
                $identity['school'] = '';
                $identity['phone'] = $this->user['phone'];
                $identity['leader'] = $this->user['name'];
                $identity['member_1'] = '';
                $identity['member_2'] = '';
                if ($this->events->battle_add($identity)) {
                    $_SESSION['profile_status'] = 'SUCCESS: Berhasil membuat identitas. Silakan lengkapi identitas keikutsertaan anda sebelum terkunci';
                } else {
                    $_SESSION['profile_status'] = 'ERROR: Gagal membuat identitas. Silakan coba lagi. Hubungi CP apabila masalah masih berlanjut';
                }
            } else if ($event_id === 'music') {
                $identity = [];
                $identity['user_id'] = $_SESSION['user_id'];
                $identity['group_name'] = '';
                $identity['leader'] = $this->user['name'];
                $identity['phone'] = $this->user['phone'];
                $identity['members'] = json_encode(['data' => []]);
                $identity['link_gdrive'] = '';
                $identity['link_igtv'] = '';
                if ($this->events->music_add($identity)) {
                    $_SESSION['profile_status'] = 'SUCCESS: Berhasil membuat identitas. Silakan lengkapi identitas keikutsertaan anda sebelum terkunci';
                } else {
                    $_SESSION['profile_status'] = 'ERROR: Gagal membuat identitas. Silakan coba lagi. Hubungi CP apabila masalah masih berlanjut';
                }
            }
            redirect(site_url('profile/index').'?tab=e_'.urlencode($event_id));
        }

        redirect('profile/index');
    }

    public function setup_battle() {
        $this->check_login();

        $site = site_url('profile/index').'?tab=e_battle';

        $identity = $this->events->battle_get($_SESSION['user_id']);
        if (!isset($identity)) {
            redirect($site);
        }

        if (!empty($this->input->post('submit'))) {
            $this->load->library('form_validation');

            $identity = [];
            $identity['team_name'] = $this->input->post('team_name');
            $identity['school'] = $this->input->post('school');
            $identity['phone'] = $this->input->post('phone');
            $identity['leader'] = $this->input->post('leader');
            $identity['member_1'] = $this->input->post('member_1');
            $identity['member_2'] = $this->input->post('member_2');

            $this->form_validation->set_rules('team_name', 'Nama Tim', 'required|max_length[100]');
            $this->form_validation->set_rules('school', 'Asal Sekolah', 'required|max_length[100]');
            $this->form_validation->set_rules('phone', 'No. Telp. Ketua', 'required|max_length[20]');
            $this->form_validation->set_rules('leader', 'Nama Ketua', 'required|max_length[100]');
            $this->form_validation->set_rules('member_1', 'Anggota #1', 'required|max_length[100]');
            $this->form_validation->set_rules('member_2', 'Anggota #2', 'required|max_length[100]');

            if ($this->form_validation->run()) {
                if ($this->events->battle_set($_SESSION['user_id'], $identity)) {
                    $upload_status = $this->upload_battle_idcard();

                    $_SESSION['profile_status'] = 'SUCCESS: Berhasil memperbarui identitas'.(!$upload_status ? ' namun gagal mengunggah file kartu tanda pelajar' : '');
                } else {
                    $_SESSION['profile_status'] = 'ERROR: Gagal memperbarui identitas. Silakan coba lagi. Kontak CP apabila masalah masih berlanjut';
                }
            } else {
                $_SESSION['profile_status'] = 'ERROR: '.implode(' ', $this->form_validation->error_array());
            }

            $_SESSION['profile_battle_identity'] = $identity;
        }

        redirect($site);
    }

    public function battle_idcard() {
        $this->check_login();

        $this->load->library('storage');

        $token = $this->storage->make_token('idcard/'.$_SESSION['user_id'], 10);
        redirect(site_url('storage_data').'?token='.urlencode($token));
    }

    public function setup_music() {
        $this->check_login();

        $site = site_url('profile/index').'?tab=e_music';

        $identity = $this->events->music_get($_SESSION['user_id']);
        if (!isset($identity)) {
            redirect($site);
        }

        if (!empty($this->input->post('submit'))) {
            $this->load->library('form_validation');

            $identity = [];
            $identity['group_name'] = $this->input->post('group_name');
            $identity['leader'] = $this->input->post('leader');
            $identity['phone'] = $this->input->post('phone');
            $identity['members'] = $this->input->post('members');
            $identity['link_gdrive'] = $this->input->post('link_gdrive');
            $identity['link_igtv'] = $this->input->post('link_igtv');

            $this->form_validation->set_rules('group_name', 'Nama Group', 'required|max_length[50]');
            $this->form_validation->set_rules('leader', 'Nama Ketua', 'required|max_length[100]');
            $this->form_validation->set_rules('phone', 'No. Telp. Ketua', 'required|max_length[20]');

            if ($this->form_validation->run()) {
                if ($this->events->music_set($_SESSION['user_id'], $identity)) {
                    $_SESSION['profile_status'] = 'SUCCESS: Berhasil memperbarui identitas';
                } else {
                    $_SESSION['profile_status'] = 'ERROR: Gagal memperbarui identitas. Silakan coba lagi. Kontak CP apabila masalah masih berlanjut';
                }
            } else {
                $_SESSION['profile_status'] = 'ERROR: '.implode(' ', $this->form_validation->error_array());
            }

            $_SESSION['profile_music_identity'] = $identity;
        }

        redirect($site);
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
        if (PF_ENV === 'production') {
            die('Fake logout is disabled in production environment');
        }

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

    private function upload_battle_idcard() {
        $this->load->library('storage');

        $blob_path = $this->storage->blob_path('idcard/'.$_SESSION['user_id']);

        if ($_FILES['idcard']['size'] > 0) {
            if ($_FILES['idcard']['size'] <= 15728640) {
                $contents = file_get_contents($_FILES['idcard']['tmp_name']);
                $metadata = ['type' => mime_content_type($_FILES['idcard']['tmp_name'])];
                if (($metadata['type'] === 'application/pdf') && $this->storage->put('idcard/'.$_SESSION['user_id'], $contents, $metadata)) {
                    return is_readable($blob_path);
                }
            }
            return FALSE;
        }
        return TRUE;
    }

}

