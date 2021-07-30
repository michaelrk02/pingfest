<?php
defined('BASEPATH') OR exit;

class Jwt {

    public function create($data, $age, $secret) {
        if (!is_array($data)) {
            $data = [];
        }
        if (isset($age)) {
            $data['__exp'] = time() + $age;
        }
        $data = base64_encode(json_encode($data));
        $signature = hash_hmac('sha256', $data, $secret);
        return base64_encode($data.':'.$signature);
    }

    public function get_data($token, $encoded = FALSE) {
        $token = explode(':', @base64_decode($token));
        if (count($token) == 2) {
            $data = $token[0];
            if (!$encoded) {
                $data = @json_decode(@base64_decode($data), TRUE);
            }
            return $data;
        }
        return NULL;
    }

    public function get_signature($token) {
        $token = explode(':', @base64_decode($token));
        if (count($token) == 2) {
            $signature = $token[1];
            return $signature;
        }
        return NULL;
    }

    public function extract($token, $secret) {
        $token = explode(':', @base64_decode($token));
        if (count($token) == 2) {
            $data = $token[0];
            $signature = $token[1];
            if ($signature === hash_hmac('sha256', $data, $secret)) {
                $data = @json_decode(@base64_decode($data), TRUE);
                if ((!isset($data['__exp'])) || (isset($data['__exp']) && (time() < $data['__exp']))) {
                    return $data;
                }
            }
        }
        return NULL;
    }

}

