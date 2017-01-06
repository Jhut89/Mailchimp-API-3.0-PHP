<?php

require 'inclusionReference.php';

class Mailchimp
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
        $this->file_manager_files = new file_manager_files($this->apikey, $class_input);
        return $this->file_manager_files;
    }

    public function fileManagerFolders( $class_input = null )
    {
        $this->file_manager_folders = new file_manager_folders($this->apikey, $class_input);
        return $this->file_manager_folders;
    }

    public function lists( $class_input = null )
    {
        $this->lists = new lists($this->apikey, $class_input);
        return $this->lists;
    }

    public function reports( $class_input = null )
    {
        $this->reports = new reports($this->apikey, $class_input);
        return $this->reports;
    }

    public function searchCampaigns( $class_input = null )
    {
        $this->search_campaigns = new search_campaigns($this->apikey, $class_input);
        return $this->search_campaigns;
    }

    public function searchMembers( $class_input = null )
    {
        $this->search_members = new search_members($this->apikey, $class_input);
        return $this->search_members;
    }

    public function templateFolders( $class_input = null )
    {
        $this->template_folders = new template_folders($this->apikey, $class_input);
        return $this->template_folders;
    }

    public function templates( $class_input = null )
    {
        $this->templates = new templates($this->apikey, $class_input);
        return $this->templates;
    }

    // VERBS
    // GET ----------------------------------------------------------------------------------------------------------------------------------------

    public function curlGet($url)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->auth);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $this->response = curl_exec($ch);
        curl_close($ch);

        return json_decode($this->response, false);
    }

    // POST ----------------------------------------------------------------------------------------------------------------------------------------

    public function curlPost($url, $payload)
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

    public function curlPatch($url, $payload)
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

    public function curlDelete($url)
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

    public function curlPut($url, $payload)
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
