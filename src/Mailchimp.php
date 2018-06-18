<?php

namespace Mailchimp_API;

use Mailchimp_API\Utilities\MailchimpRequest;
use Mailchimp_API\Utilities\MailchimpSettings;

class Mailchimp
{

    /* @var MailchimpRequest $request */
    public $request;

    /* @var MailchimpSettings $settings */
    public $settings;

    // The provided MailChimp API key
    public $apikey;

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
        $this->apikey = $apikey;
        $this->request = new MailchimpRequest($this->apikey);
        $this->settings = new MailchimpSettings();
    }

    // ROOT OBJECT FUNCTIONS

    public function account()
    {
        $this->account = new Account($this->apikey);
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


    // BEGIN ENDPOINT VERB FUNCTIONS
    // TODO implement new request verbs

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
        if (!empty($this->req_post_params)) {
            try {
                Utilities::checkRequiredFields(
                    $params,
                    $this->req_post_params
                );
            } catch (Library_Exception $e) {
                die("Mailchimp-API-3.0-PHP Says: ".$e->getMessage());
            }
        }
        return  $this->curlPost($this->url, json_encode($params));
    }

    // PATCH ----------------------------------------------------------------------------------------------------------------------------------------

    public function PATCH($params = array())
    {
        if (!empty($this->req_patch_params)) {
            try {
                Utilities::checkRequiredFields(
                    $params,
                    $this->req_patch_params
                );
            } catch (Library_Exception $e) {
                die("Mailchimp-API-3.0-PHP Says: ".$e->getMessage());
            }
        }
        return  $this->curlPatch($this->url, json_encode($params));
    }

    // PUT ----------------------------------------------------------------------------------------------------------------------------------------

    public function PUT($params = array())
    {
        if (!empty($this->req_put_params)) {
            try {
                Utilities::checkRequiredFields(
                    $params,
                    $this->req_put_params
                );
            } catch (Library_Exception $e) {
                die("Mailchimp-API-3.0-PHP Says: ".$e->getMessage());
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
        $encoded_uri = urlencode($redirect_uri);

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
            return Utilities::oauthRun($oauth_string);
        } catch (Library_Exception $e) {

            if (self::DEBUGGER == true) {
                die(
                    "Mailchimp-API-3.0-PHP Oauth Exchange Says: "
                    . $e->getMessage()
                    . "Instead recieved: \n"
                    . $e->output
                );
            }

            die("Mailchimp-API-3.0-PHP Oauth Exchange Says: " . $e->getMessage());

        }

    }

    // END OAUTH FUNCTIONS

    // BEGIN LIBRARY FUNCTIONS
    // TODO move these to request class

    public function finalizeRequest($response)
    {
        if (self::DEBUGGER == true) {
            return Utilities::debug(
                $this->url, 
                $this->http_code,
                $this->apikey,
                $response
            );
        } else {
            return Utilities::validateResponse($response);
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

    protected function resetRequest()
    {
        if (isset($this->request)) {
            unset($this->request);
        }

        $this->request = new MailchimpRequest($this->apikey);
    }

}
