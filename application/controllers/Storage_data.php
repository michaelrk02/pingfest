<?php
defined('BASEPATH') OR exit;

class Storage_data extends CI_Controller {

    public function index() {
        $this->load->library('storage');

        $token = $this->input->get('token');
        if (isset($token)) {
            $id = $this->storage->get_id($token);
            if (isset($id)) {
                $resource = $this->storage->get($id);
                if (isset($resource) && !empty($resource['metadata']['type'])) {
                    $filename = $this->input->get('filename');

                    $this->output->set_status_header(200);
                    $this->output->set_content_type($resource['metadata']['type']);
                    if (!empty($filename)) {
                        $this->output->set_header('Content-Disposition: attachment; filename="'.addslashes($filename).'"');
                    }
                    $this->output->set_output($resource['contents']);
                } else {
                    $this->output->set_status_header(404);
                }
            } else {
                $this->output->set_status_header(403);
            }
        } else {
            $this->output->set_status_header(400);
        }
    }

}

