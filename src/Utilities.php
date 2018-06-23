<?php

namespace MailchimpAPI;

class Utilities
{

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