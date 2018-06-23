<?php

namespace MailchimpAPI;

use MailchimpAPI\Utilities\MailchimpConnection;
use MailchimpAPI\Utilities\MailchimpRequest;
use MailchimpAPI\Utilities\MailchimpResponse;
use MailchimpAPI\Utilities\MailchimpSettings;

/**
 * Class Mailchimp
 *
 * @package Mailchimp_API
 */
class Mailchimp
{

    /**
     * @var MailchimpRequest $request
     */
    public $request;

    /**
     * @var MailchimpSettings $settings
     */
    public $settings;

    /**
     * @var MailchimpResponse $response
     */
    public $response;

    /**
     * @var string
     */
    public $apikey;

    /**
     * @var Account
     */
    public $account;
    /**
     * @var AuthorizedApps
     */
    public $apps;
    /**
     * @var Automations
     */
    public $automations;
    /**
     * @var BatchOperations
     */
    public $batches;
    /**
     * @var BatchWebhooks
     */
    public $batch_webhooks;
    /**
     * @var CampaignFolders
     */
    public $campaign_folders;
    /**
     * @var Campaigns
     */
    public $campaigns;
    /**
     * @var Conversations
     */
    public $conversations;
    /**
     * @var EcommerceStores
     */
    public $ecomm_stores;
    /**
     * @var File_Manager_Files
     */
    public $file_manager_files;
    /**
     * @var File_Manager_Folders
     */
    public $file_manager_folders;
    /**
     * @var Lists
     */
    public $lists;
    /**
     * @var Reports
     */
    public $reports;
    /**
     * @var Search_Campaigns
     */
    public $search_campaigns;
    /**
     * @var Search_Members
     */
    public $search_members;
    /**
     * @var Template_Folders
     */
    public $template_folders;
    /**
     * @var Templates
     */
    public $templates;

    /**
     * Mailchimp constructor.
     *
     * @param $apikey
     *
     * @throws Library_Exception
     */
    public function __construct($apikey)
    {
        $this->apikey = $apikey;
        $this->request = new MailchimpRequest($this->apikey);
        $this->settings = new MailchimpSettings();
    }

    /**
     * @return Account
     * @throws Library_Exception
     */
    public function account()
    {
        $this->account = new Account($this->apikey);
        return $this->account;
    }

    /**
     * @param null $class_input
     * @return AuthorizedApps
     * @throws Library_Exception
     */
    public function apps($class_input = null )
    {
        $this->apps = new AuthorizedApps($this->apikey, $class_input);
        return $this->apps;
    }

    /**
     * @param null $class_input
     * @return Automations
     * @throws Library_Exception
     */
    public function automations($class_input = null )
    {
        $this->automations = new Automations($this->apikey, $class_input);
        return $this->automations;
    }

    /**
     * @param null $class_input
     * @return BatchOperations
     * @throws Library_Exception
     */
    public function batches($class_input = null )
    {
        $this->batches = new BatchOperations($this->apikey, $class_input);
        return $this->batches;
    }

    /**
     * @param null $class_input
     * @return BatchWebhooks
     * @throws Library_Exception
     */
    public function batchWebhooks($class_input = null )
    {
        $this->batch_webhooks = new BatchWebhooks($this->apikey, $class_input);
        return $this->batch_webhooks;
    }

    /**
     * @param null $class_input
     * @return CampaignFolders
     * @throws Library_Exception
     */
    public function campaignFolders($class_input = null )
    {
        $this->campaign_folders = new CampaignFolders($this->apikey, $class_input);
        return $this->campaign_folders;
    }

    /**
     * @param null $class_input
     * @return Campaigns
     * @throws Library_Exception
     */
    public function campaigns($class_input = null )
    {
        $this->campaigns = new Campaigns($this->apikey, $class_input);
        return $this->campaigns;
    }

    /**
     * @param null $class_input
     * @return Conversations
     * @throws Library_Exception
     */
    public function conversations($class_input = null )
    {
        $this->conversations = new Conversations($this->apikey, $class_input);
        return $this->conversations;
    }

    /**
     * @param null $class_input
     * @return EcommerceStores
     * @throws Library_Exception
     */
    public function ecommStores($class_input = null )
    {
        $this->ecomm_stores = new EcommerceStores($this->apikey, $class_input);
        return $this->ecomm_stores;
    }

    /**
     * @param null $class_input
     * @return File_Manager_Files
     * @throws Library_Exception
     */
    public function fileManagerFiles($class_input = null )
    {
        $this->file_manager_files = new File_Manager_Files(
            $this->apikey,
            $class_input
        );
        return $this->file_manager_files;
    }

    /**
     * @param null $class_input
     * @return File_Manager_Folders
     * @throws Library_Exception
     */
    public function fileManagerFolders($class_input = null )
    {
        $this->file_manager_folders = new File_Manager_Folders(
            $this->apikey,
            $class_input
        );
        return $this->file_manager_folders;
    }

    /**
     * @param null $class_input
     * @return Lists
     * @throws Library_Exception
     */
    public function lists($class_input = null )
    {
        $this->lists = new Lists($this->apikey, $class_input);
        return $this->lists;
    }

    /**
     * @param null $class_input
     * @return Reports
     * @throws Library_Exception
     */
    public function reports($class_input = null )
    {
        $this->reports = new Reports($this->apikey, $class_input);
        return $this->reports;
    }

    /**
     * @param null $class_input
     * @return Search_Campaigns
     * @throws Library_Exception
     */
    public function searchCampaigns($class_input = null )
    {
        $this->search_campaigns = new Search_Campaigns($this->apikey, $class_input);
        return $this->search_campaigns;
    }

    /**
     * @param null $class_input
     * @return Search_Members
     * @throws Library_Exception
     */
    public function searchMembers($class_input = null )
    {
        $this->search_members = new Search_Members($this->apikey, $class_input);
        return $this->search_members;
    }

    /**
     * @param null $class_input
     * @return Template_Folders
     * @throws Library_Exception
     */
    public function templateFolders($class_input = null )
    {
        $this->template_folders = new Template_Folders($this->apikey, $class_input);
        return $this->template_folders;
    }

    /**
     * @param null $class_input
     * @return Templates
     * @throws Library_Exception
     */
    public function templates($class_input = null )
    {
        $this->templates = new Templates($this->apikey, $class_input);
        return $this->templates;
    }


    /*************************************
     * BEGIN ENDPOINT VERB FUNCTIONS
     *************************************/

    /**
     * @param array $query_params
     * @return MailchimpResponse
     * @throws Library_Exception
     */
    public function GET($query_params = [])
    {
        $this->request->setMethod(MailchimpRequest::GET);
        $this->request->setQueryString($query_params);

        $connection = new MailchimpConnection($this->request, $this->settings);
        $response = $connection->execute();
        $this->resetRequest();

        return $response;
    }


    /**
     * @param array $params
     * @return MailchimpResponse
     * @throws Library_Exception
     */
    public function POST($params = []) {
        // TODO re-implement how we check for required params
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

        $this->request->setMethod(MailchimpRequest::POST);
        $this->request->setPayload($params);

        $connection = new MailchimpConnection($this->request, $this->settings);
        $response = $connection->execute();
        $this->resetRequest();

        return $response;
    }

    /**
     * @param array $params
     * @return MailchimpResponse
     * @throws Library_Exception
     */
    public function PATCH($params = [])
    {
        // TODO re-implement how we check for required params
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

        $this->request->setMethod(MailchimpRequest::PATCH);
        $this->request->setPayload($params);

        $connection = new MailchimpConnection($this->request, $this->settings);
        $response = $connection->execute();
        $this->resetRequest();

        return $response;
    }

    /**
     * @param array $params
     * @return MailchimpResponse
     * @throws Library_Exception
     */
    public function PUT($params = [])
    {
        // TODO re-implement how we check for required params
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

        $this->request->setMethod(MailchimpRequest::PUT);
        $this->request->setPayload($params);

        $connection = new MailchimpConnection($this->request, $this->settings);
        $response = $connection->execute();
        $this->resetRequest();

        return $response;
    }

    /**
     * @return MailchimpResponse
     * @throws Library_Exception
     */
    public function DELETE()
    {
        $this->request->setMethod(MailchimpRequest::DELETE);

        $connection = new MailchimpConnection($this->request, $this->settings);
        $response = $connection->execute();
        $this->resetRequest();

        return $response;
    }

    /**
     * @param $client_id
     * @param $redirect_uri
     * @return string
     */
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

    /**
     *
     *
     * @param $code
     * @param $client_id
     * @param $client_sec
     * @param $redirect_uri
     *
     * @return string
     *
     * @throws Library_Exception
     */
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

        $access_token = self::requestAccessToken($oauth_string);
        $apiKey = self::requestKeyFromToken($access_token);

        return $apiKey;
    }

    /**
     * @param $endpoint
     * @param array $params
     * @return MailchimpResponse
     * @throws Library_Exception
     */
    protected function postToActionEndpoint($endpoint, $params =[])
    {
        $this->request->appendToEndpoint($endpoint);
        $this->request->setMethod(MailchimpRequest::POST);
        if (!empty($params)) {
            $this->request->setPayload($params);
        }

        $connection = new MailchimpConnection($this->request, $this->settings);
        $response = $connection->execute();
        $this->resetRequest();
        return $response;
    }

    /**
     * @throws Library_Exception
     */
    protected function resetRequest()
    {
        if (isset($this->request)) {
            unset($this->request);
        }

        $this->request = new MailchimpRequest($this->apikey);
    }

    /**
     * @param $oath_string
     * @return mixed
     * @throws Library_Exception
     */
    private static function requestAccessToken($oath_string)
    {
        $request = new MailchimpRequest();
        $request->setMethod("POST");
        $request->setPayload($oath_string);
        $request->setBaseUrl(MailchimpConnection::TOKEN_REQUEST_URL);

        $connection = new MailchimpConnection($request);
        $response = $connection->execute();

        $access_token = $response->deserialize()->access_token;

        if (!$access_token) {
            throw new Library_Exception(
                'MailChimp did not return an access token'
            );
        }

        return $access_token;
    }

    /**
     * @param $access_token
     * @return string
     * @throws Library_Exception
     */
    private static function requestKeyFromToken($access_token)
    {
        $request = new MailchimpRequest();
        $request->setMethod("GET");
        $request->setBaseUrl(MailchimpConnection::OAUTH_METADATA_URL);
        $request->addHeader('Authorization: OAuth ' . $access_token);

        $connection = new MailchimpConnection($request);
        $response = $connection->execute();

        $dc = $response->deserialize()->dc;

        return $access_token . '-' . $dc;
    }

}
