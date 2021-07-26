<?php
defined('BASEPATH') OR exit;

class Storage {

    protected $ci;

    public function __construct() {
        $this->ci =& get_instance();
    }

    public function get($id) {
        $blob_path = $this->blob_path($id);
        $meta_path = $this->meta_path($id);

        if (is_readable($blob_path) && is_readable($meta_path)) {
            $resource = [];
            $resource['contents'] = file_get_contents($blob_path);
            $resource['metadata'] = file_get_contents($meta_path);

            if (($resource['contents'] !== FALSE) && ($resource['metadata'] !== FALSE)) {
                $resource['metadata'] = json_decode($resource['metadata'], TRUE);

                return ($resource['metadata'] !== NULL) ? $resource : NULL;
            }
            return NULL;
        }
        return NULL;
    }

    public function put($id, $contents, $metadata) {
        $blob_path = $this->blob_path($id);
        $meta_path = $this->meta_path($id);
        if (is_writable($this->dir())) {
            $success = TRUE;
            $success = $success && (file_put_contents($blob_path, $contents) !== FALSE);
            $success = $success && (file_put_contents($meta_path, json_encode($metadata)) !== FALSE);

            return $success;
        }
        return FALSE;
    }

    public function remove($id) {
        $blob_path = $this->blob_path($id);
        $meta_path = $this->meta_path($id);

        $success = TRUE;
        if (is_writable($blob_path)) {
            $success = $success && unlink($blob_path);
        }
        if (is_writable($meta_path)) {
            $success = $success && unlink($meta_path);
        }
        return $success;
    }

    public function dir() {
        return APPPATH.'storage/';
    }

    public function blob_path($id) {
        return $this->dir().md5($id).'.blob';
    }

    public function meta_path($id) {
        return $this->dir().md5($id).'.meta';
    }

    public function exists($id) {
        $blob_path = $this->blob_path($id);
        $meta_path = $this->meta_path($id);
        return file_exists($blob_path) && file_exists($meta_path);
    }

    public function make_token($id, $age) {
        $params = [];
        $params['id'] = $id;
        $params['expired'] = time() + $age;
        $params = base64_encode(json_encode($params));
        $signature = hash_hmac('sha256', $params, PF_SECRET_KEY);
        return base64_encode($params.':'.$signature);
    }

    public function get_id($token) {
        $token = explode(':', @base64_decode($token));
        if (count($token) == 2) {
            $params = $token[0];
            $signature = $token[1];
            if ($signature === hash_hmac('sha256', $params, PF_SECRET_KEY)) {
                $params = @json_decode(@base64_decode($params), TRUE);
                if (isset($params) && (time() < $params['expired'])) {
                    return isset($params['id']) ? $params['id'] : NULL;
                }
            }
        }
        return NULL;
    }

    public function access($id, $age) {
        $token = $this->make_token($id, $age);
        redirect(site_url('storage_data').'?token='.urlencode($token));
    }

}

