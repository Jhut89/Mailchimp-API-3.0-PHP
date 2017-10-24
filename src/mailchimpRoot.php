<?php

require 'inclusionReference.php';

class Mailchimp
{

    // Settings
    const DEBUGGER = false;
    const DEBUGGER_LOG_FILE = null;
    const VERIFY_SSL = true;
    const HEADERS = false;

    // Request components
    public $auth;
    public $url;
    public $exp_apikey;
    public $apikey;
    public $response;
    public $http_code;


    // Instantiations for child classes
    public $account;
    public $apps;
    public $automations;
    public $batches;
    public $batch_webhooks;
    public $campaign_folders;
    public $campaigns;
    public $conversations;
    public $ecomm_stores;
    public $file_manager_files;
    public $file_manager_folders;
    public $lists;
    public $reports;
    public $search_campaigns;
    public $search_members;
    public $template_folders;
    public $templates;

    public function __construct($apikey)
    {
        $this->exp_apikey = explode('-', trim($apikey));
        $this->auth = array(
            'Authorization: apikey ' . $this->exp_apikey[0] . '-' . $this->exp_apikey[1]
        );

        $this->url = "Https://" . $this->exp_apikey[1] . ".api.mailchimp.com/3.0";
        $this->apikey = $apikey;

        try {
            MC_Utils::checkKey($this->exp_apikey);
        } catch (Library_Exception $e) {
            die("Mailchimp-API-3.0-PHP Says: ".$e->message);
        }
    }

    // ROOT OBJECT FUNCTIONS

    public function account()
    {
        $this->account = new Mailchimp_Account($this->apikey);
        return $this->account;
    }

    public function apps( $class_input = null )
    {
        $this->apps = new Authorized_Apps($this->apikey, $class_input);
        return $this->apps;
    }

    public function automations( $class_input = null )
    {
        $this->automations = new Automations($this->apikey, $class_input);
        return $this->automations;
    }

    public function batches( $class_input = null )
    {
        $this->batches = new Batch_Operations($this->apikey, $class_input);
        return $this->batches;
    }

    public function batchWebhooks( $class_input = null )
    {
        $this->batch_webhooks = new Batch_Webhooks($this->apikey, $class_input);
        return $this->batch_webhooks;
    }

    public function campaignFolders( $class_input = null )
    {
        $this->campaign_folders = new Campaign_Folders($this->apikey, $class_input);
        return $this->campaign_folders;
    }

    public function campaigns( $class_input = null )
    {
        $this->campaigns = new Campaigns($this->apikey, $class_input);
        return $this->campaigns;
    } 

    public function conversations( $class_input = null )
    {
        $this->conversations = new Conversations($this->apikey, $class_input);
        return $this->conversations;
    }

    public function ecommStores( $class_input = null )
    {
        $this->ecomm_stores = new Ecommerce_Stores($this->apikey, $class_input);
        return $this->ecomm_stores;
    }

    public function fileManagerFiles(  $class_input = null )
    {
        $this->file_manager_files = new File_Manager_Files(
            $this->apikey,
            $class_input
        );
        return $this->file_manager_files;
    }

    public function fileManagerFolders( $class_input = null )
    {
        $this->file_manager_folders = new File_Manager_Folders(
            $this->apikey,
            $class_input
        );
        return $this->file_manager_folders;
    }

    public function lists( $class_input = null )
    {
        $this->lists = new Lists($this->apikey, $class_input);
        return $this->lists;
    }

    public function reports( $class_input = null )
    {
        $this->reports = new Reports($this->apikey, $class_input);
        return $this->reports;
    }

    public function searchCampaigns( $class_input = null )
    {
        $this->search_campaigns = new Search_Campaigns($this->apikey, $class_input);
        return $this->search_campaigns;
    }

    public function searchMembers( $class_input = null )
    {
        $this->search_members = new Search_Members($this->apikey, $class_input);
        return $this->search_members;
    }

    public function templateFolders( $class_input = null )
    {
        $this->template_folders = new Template_Folders($this->apikey, $class_input);
        return $this->template_folders;
    }

    public function templates( $class_input = null )
    {
        $this->templates = new Templates($this->apikey, $class_input);
        return $this->templates;
    }

    // CURL VERBS
    // GET ----------------------------------------------------------------------------------------------------------------------------------------

    public function curlGet($url)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->auth);
        curl_setopt($ch, CURLOPT_USERAGENT, MC_Utils::USER_AGENT);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, self::HEADERS);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, self::VERIFY_SSL);
        $this->response = curl_exec($ch);
        $this->http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        return self::finalizeRequest($this->response);
    }

    // POST ----------------------------------------------------------------------------------------------------------------------------------------

    public function curlPost($url, $payload)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->auth);
        curl_setopt($ch, CURLOPT_USERAGENT, MC_Utils::USER_AGENT);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, self::VERIFY_SSL);
        curl_setopt($ch, CURLOPT_HEADER, self::HEADERS);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        $this->response = curl_exec($ch);
        $this->http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        return self::finalizeRequest($this->response);
    }

    // PATCH ----------------------------------------------------------------------------------------------------------------------------------------

    public function curlPatch($url, $payload)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->auth);
        curl_setopt($ch, CURLOPT_USERAGENT, MC_Utils::USER_AGENT);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, self::VERIFY_SSL);
        curl_setopt($ch, CURLOPT_HEADER, self::HEADERS);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PATCH");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        $this->response = curl_exec($ch);
        $this->http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        return self::finalizeRequest($this->response);
    }

    // DELETE ----------------------------------------------------------------------------------------------------------------------------------------

    public function curlDelete($url)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->auth);
        curl_setopt($ch, CURLOPT_USERAGENT, MC_Utils::USER_AGENT);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, self::VERIFY_SSL);
        curl_setopt($ch, CURLOPT_HEADER, self::HEADERS);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        $this->response = curl_exec($ch);
        $this->http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        return self::finalizeRequest($this->response);
    }

    // PUT ----------------------------------------------------------------------------------------------------------------------------------------

    public function curlPut($url, $payload)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->auth);
        curl_setopt($ch, CURLOPT_USERAGENT, MC_Utils::USER_AGENT);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, self::VERIFY_SSL);
        curl_setopt($ch, CURLOPT_HEADER, self::HEADERS);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        $this->response = curl_exec($ch);
        $this->http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        return self::finalizeRequest($this->response);
    }

    // END CURL VERBS
    // BEGIN ENDPOINT VERB FUNCTIONS

    // GET ------------------------------------------------------------------------------------------------------------------------------------------

    public function GET($query_params = null)
    {
        $query_string = '';

        if (is_array($query_params)) {
            $query_string = $this->constructQueryParams($query_params);
        }

        $url = $this->url . $query_string;
        $response = $this->curlGet($url);

        return $response;
    }

    // POST ----------------------------------------------------------------------------------------------------------------------------------------

    public function POST($params = array()) {
        if (!empty($this->req_post_prarams)) {
            try {
                MC_Utils::checkRequiredFields(
                    $params,
                    $this->req_post_prarams
                );
            } catch (Library_Exception $e) {
                die("Mailchimp-API-3.0-PHP Says: ".$e->message);
            }
        }
        return  $this->curlPost($this->url, json_encode($params));
    }

    // PATCH ----------------------------------------------------------------------------------------------------------------------------------------

    public function PATCH($params = array())
    {
        if (!empty($this->req_patch_params)) {
            try {
                MC_Utils::checkRequiredFields(
                    $params,
                    $this->req_patch_params
                );
            } catch (Library_Exception $e) {
                die("Mailchimp-API-3.0-PHP Says: ".$e->message);
            }
        }
        return  $this->curlPatch($this->url, json_encode($params));
    }

    // PUT ----------------------------------------------------------------------------------------------------------------------------------------

    public function PUT($params = array())
    {
        if (!empty($this->req_put_params)) {
            try {
                MC_Utils::checkRequiredFields(
                    $params,
                    $this->req_put_params
                );
            } catch (Library_Exception $e) {
                die("Mailchimp-API-3.0-PHP Says: ".$e->message);
            }
        }
        return  $this->curlPut($this->url, json_encode($params));
    }

    // DELETE ----------------------------------------------------------------------------------------------------------------------------------------

    public function DELETE()
    {
        return $this->curlDelete($this->url);
    }

    // END ENDPOINT VERB FUNCTIONS

    // BEGIN OAUTH FUNCTIONS

    public static function getAuthUrl(
        $client_id,
        $redirect_uri
    ){
        $encoded_uri = urldecode($redirect_uri);

        $authUrl = "https://login.mailchimp.com/oauth2/authorize";
        $authUrl .= "?client_id=".$client_id;
        $authUrl .= "&redirect_uri=".$encoded_uri;
        $authUrl .= "&response_type=code";

        return $authUrl;
    }

    public static function oauthExchange(
        $code,
        $client_id,
        $client_sec,
        $redirect_uri
    ) {

        $encoded_uri = urldecode($redirect_uri);

        $oauth_string = "grant_type=authorization_code";
        $oauth_string .= "&client_id=".$client_id;
        $oauth_string .= "&client_secret=".$client_sec;
        $oauth_string .= "&redirect_uri=".$encoded_uri;
        $oauth_string .= "&code=".$code;

        try {
            return MC_Utils::oauthRun($oauth_string);
        } catch (Library_Exception $e) {

            if (self::DEBUGGER == true) {
                die(
                    "Mailchimp-API-3.0-PHP Oauth Exchange Says: "
                    . $e->message
                    . "Instead recieved: \n"
                    . $e->output
                );
            }

            die("Mailchimp-API-3.0-PHP Oauth Exchange Says: " . $e->message);

        }

    }

    // END OAUTH FUNCTIONS

    // BEGIN LIBRARY FUNCTIONS

    public function finalizeRequest($response)
    {
        if (self::DEBUGGER == true) {
            return MC_Utils::debug(
                $this->url, 
                $this->http_code,
                $this->apikey,
                $response
            );
        } else {
            return MC_Utils::validateResponse($response);
        }
    }

    public function constructQueryParams($query_input)
    {
        $query_string = '?';
        foreach ($query_input as $parameter => $value) {
            $encoded_value = urlencode($value);
            $query_string .= $parameter . '=' . $encoded_value . '&';
        }
        $query_string = trim($query_string, '&');
        return $query_string;
    }

}
