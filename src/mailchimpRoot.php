<?php

require 'inclusionReference.php';

class mailchimp
{

    public $auth;
    public $url;
    public $exp_apikey;
    public $apikey;
    public $response;

    // Instantiations for child classes
    public $account;
    public $apps;
    public $automations;
    public $batches;
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
        $this->exp_apikey = explode('-', $apikey);
        $this->auth = array('Authorization: apikey ' . $this->exp_apikey[0] . '-' . $this->exp_apikey[1]);
        $this->url = "Https://" . $this->exp_apikey[1] . ".api.mailchimp.com/3.0";
        $this->apikey = $apikey;
    }

    // ROOT OBJECT FUNCTIONS

    function account()
    {
        $this->account = new mailchimp_account($this->apikey);
        return $this->account;
    }

    function apps( $class_input = null )
    {
        $this->apps = new authorized_apps($this->apikey, $class_input);
        return $this->apps;
    }

    function automations( $class_input = null )
    {
        $this->automations = new automations($this->apikey, $class_input);
        return $this->automations;
    }

    function batches( $class_input = null )
    {
        $this->batches = new batch_operations($this->apikey, $class_input);
        return $this->batches;
    }

    function campaign_folders( $class_input = null )
    {
        $this->campaign_folders = new campaign_folders($this->apikey, $class_input);
        return $this->campaign_folders;
    }

    function campaigns( $class_input = null )
    {
        $this->campaigns = new campaigns($this->apikey, $class_input);
        return $this->campaigns;
    } 

    function conversations( $class_input = null )
    {
        $this->conversations = new conversations($this->apikey, $class_input);
        return $this->conversations;
    }

    function ecomm_stores( $class_input = null )
    {
        $this->ecomm_stores = new ecommerce_stores($this->apikey, $class_input);
        return $this->ecomm_stores;
    }

    function file_manager_files(  $class_input = null )
    {
        $this->file_manager_files = new file_manager_files($this->apikey, $class_input);
        return $this->file_manager_files;
    }

    function file_manager_folders( $class_input = null )
    {
        $this->file_manager_folders = new file_manager_folders($this->apikey, $class_input);
        return $this->file_manager_folders;
    }

    function lists( $class_input = null )
    {
        $this->lists = new lists($this->apikey, $class_input);
        return $this->lists;
    }

    function reports( $class_input = null )
    {
        $this->reports = new reports($this->apikey, $class_input);
        return $this->reports;
    }

    function search_campaigns( $class_input = null )
    {
        $this->search_campaigns = new search_campaigns($this->apikey, $class_input);
        return $this->search_campaigns;
    }

    function search_members( $class_input = null )
    {
        $this->search_members = new search_members($this->apikey, $class_input);
        return $this->search_members;
    }

    function template_folders( $class_input = null )
    {
        $this->template_folders = new template_folders($this->apikey, $class_input);
        return $this->template_folders;
    }

    function templates( $class_input = null )
    {
        $this->templates = new templates($this->apikey, $class_input);
        return $this->templates;
    }

    // VERBS
    // GET ----------------------------------------------------------------------------------------------------------------------------------------

    public function curl_get($url)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->auth);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $this->response = curl_exec($ch);
        curl_close($ch);

        return json_decode($this->response, false);
    }

    // POST ----------------------------------------------------------------------------------------------------------------------------------------

    public function curl_post($url, $payload)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->auth);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        $this->response = curl_exec($ch);
        curl_close($ch);

        return json_decode($this->response, false);
    }

    // PATCH ----------------------------------------------------------------------------------------------------------------------------------------

    public function curl_patch($url, $payload)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->auth);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PATCH");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        $this->response = curl_exec($ch);
        curl_close($ch);

        return json_decode($this->response, false);
    }

    // DELETE ----------------------------------------------------------------------------------------------------------------------------------------

    public function curl_delete($url)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->auth);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        $this->response = curl_exec($ch);
        curl_close($ch);

        return json_decode($this->response, false);
    }

    // PUT ----------------------------------------------------------------------------------------------------------------------------------------

    public function curl_put($url, $payload)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->auth);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        $this->response = curl_exec($ch);
        curl_close($ch);

        return json_decode($this->response, false);
    }

    // END VERBS -----------------------------------------------------------------------------------------------------------------------------------

    public function construct_query_params($query_input)
    {
        $query_string = '?';
        foreach ($query_input as $parameter => $value) {
            $encoded_value = urlencode($value);
            $query_string .= $parameter . '=' . $value . '&';
        }
        $query_string = trim($query_string, '&');
        return $query_string;
    }

}