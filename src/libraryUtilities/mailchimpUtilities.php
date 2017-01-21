<?php

class MC_Utils
{

    const USER_AGENT = 'jhut89/Mailchimp-API-3.0-PHP (https://github.com/Jhut89/Mailchimp-API-3.0-PHP)';

    public static function oauthRun($oauth_string)
    {

        $ch = curl_init('https://login.mailchimp.com/oauth2/token');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $oauth_string);
        $return = curl_exec($ch);
        if (!is_null(json_decode($return))) {
            $return = json_decode($return);
        }
        curl_close($ch);

        if (!$return->access_token) {
            throw new Library_Exception(
                'MailChimp did not return an access token',
                $return
            );
        }

        $headers = array('Authorization: OAuth '.$return->access_token);
        $ch = curl_init("https://login.mailchimp.com/oauth2/metadata/");
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $account = curl_exec($ch);
        if (!is_null(json_decode($account))) {
            $account = json_decode($account);
        }
        curl_close($ch);

        if (!$account->dc) {
            throw new Library_Exception(
                'Unable to retrieve account meta-data',
                $account
            );
        }

        return $return->access_token. "-" . $account->dc;

    }

    public static function checkKey($exp_apikey)
    {

        if (strlen($exp_apikey[0]) < 10) {
            throw new Library_Exception('You must provide a valid API key');
        }

        if (!isset($exp_apikey[1])) {
            throw new Library_Exception(
                'Make sure you provided the data-center at the end of your API key'
            );
        }
    }

    public static function debug(
        $url,
        $http_code,
        $apikey,
        $response_body
    ) {
        $debug_report = (object) array(
            'url' => $url,
            'http_code' => $http_code,
            'apikey' => $apikey,
            'response_body' => $response_body
        );
        if (Mailchimp::DEBUGGER == true
            && !is_null(Mailchimp::DEBUGGER_LOG_FILE)
        ) {
            $log_file = fopen(Mailchimp::DEBUGGER_LOG_FILE, 'a');
            fwrite($log_file, print_r($debug_report, true) . "\n");
            fclose($log_file);
        }
        return $debug_report;
    }

    public static function validateResponse($response)
    {
        $decoded_response = json_decode($response, false);
        if (is_null($decoded_response)) {
            return $response;
        } else {
            return $decoded_response;
        }
    }

    public static function checkRequiredFields($given_params, $req_post_params)
    {
        if (empty($given_params)) {
            throw new Library_Exception("verbs sending a payload cannot be empty");
        } else {
            foreach ($given_params as $key => $value) {
                $param_keys[] = $key;
            }
            foreach ($req_post_params as $param) {
                if (!in_array($param, $param_keys)) {
                    throw new Library_Exception(
                        'This request is missing a required param: "' . $param . '"'
                    );
                }
            }
        }
    }
} 