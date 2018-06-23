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
     * @var FileManagerFiles
     */
    public $file_manager_files;
    /**
     * @var FileManagerFolders
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
     * @var SearchCampaigns
     */
    public $search_campaigns;
    /**
     * @var SearchMembers
     */
    public $search_members;
    /**
     * @var TemplateFolders
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
     * @throws MailchimpException
     */
    public function __construct($apikey)
    {
        $this->apikey = $apikey;
        $this->request = new MailchimpRequest($this->apikey);
        $this->settings = new MailchimpSettings();
    }

    /**
     * @return Account
     * @throws MailchimpException
     */
    public function account()
    {
        $this->account = new Account($this->apikey);
        return $this->account;
    }

    /**
     * @param null $class_input
     * @return AuthorizedApps
     * @throws MailchimpException
     */
    public function apps($class_input = null)
    {
        $this->apps = new AuthorizedApps($this->apikey, $class_input);
        return $this->apps;
    }

    /**
     * @param null $class_input
     * @return Automations
     * @throws MailchimpException
     */
    public function automations($class_input = null)
    {
        $this->automations = new Automations($this->apikey, $class_input);
        return $this->automations;
    }

    /**
     * @param null $class_input
     * @return BatchOperations
     * @throws MailchimpException
     */
    public function batches($class_input = null)
    {
        $this->batches = new BatchOperations($this->apikey, $class_input);
        return $this->batches;
    }

    /**
     * @param null $class_input
     * @return BatchWebhooks
     * @throws MailchimpException
     */
    public function batchWebhooks($class_input = null)
    {
        $this->batch_webhooks = new BatchWebhooks($this->apikey, $class_input);
        return $this->batch_webhooks;
    }

    /**
     * @param null $class_input
     * @return CampaignFolders
     * @throws MailchimpException
     */
    public function campaignFolders($class_input = null)
    {
        $this->campaign_folders = new CampaignFolders($this->apikey, $class_input);
        return $this->campaign_folders;
    }

    /**
     * @param null $class_input
     * @return Campaigns
     * @throws MailchimpException
     */
    public function campaigns($class_input = null)
    {
        $this->campaigns = new Campaigns($this->apikey, $class_input);
        return $this->campaigns;
    }

    /**
     * @param null $class_input
     * @return Conversations
     * @throws MailchimpException
     */
    public function conversations($class_input = null)
    {
        $this->conversations = new Conversations($this->apikey, $class_input);
        return $this->conversations;
    }

    /**
     * @param null $class_input
     * @return EcommerceStores
     * @throws MailchimpException
     */
    public function ecommStores($class_input = null)
    {
        $this->ecomm_stores = new EcommerceStores($this->apikey, $class_input);
        return $this->ecomm_stores;
    }

    /**
     * @param null $class_input
     * @return FileManagerFiles
     * @throws MailchimpException
     */
    public function fileManagerFiles($class_input = null)
    {
        $this->file_manager_files = new FileManagerFiles(
            $this->apikey,
            $class_input
        );
        return $this->file_manager_files;
    }

    /**
     * @param null $class_input
     * @return FileManagerFolders
     * @throws MailchimpException
     */
    public function fileManagerFolders($class_input = null)
    {
        $this->file_manager_folders = new FileManagerFolders(
            $this->apikey,
            $class_input
        );
        return $this->file_manager_folders;
    }

    /**
     * @param null $class_input
     * @return Lists
     * @throws MailchimpException
     */
    public function lists($class_input = null)
    {
        $this->lists = new Lists($this->apikey, $class_input);
        return $this->lists;
    }

    /**
     * @param null $class_input
     * @return Reports
     * @throws MailchimpException
     */
    public function reports($class_input = null)
    {
        $this->reports = new Reports($this->apikey, $class_input);
        return $this->reports;
    }

    /**
     * @param null $class_input
     * @return SearchCampaigns
     * @throws MailchimpException
     */
    public function searchCampaigns($class_input = null)
    {
        $this->search_campaigns = new SearchCampaigns($this->apikey, $class_input);
        return $this->search_campaigns;
    }

    /**
     * @param null $class_input
     * @return SearchMembers
     * @throws MailchimpException
     */
    public function searchMembers($class_input = null)
    {
        $this->search_members = new SearchMembers($this->apikey, $class_input);
        return $this->search_members;
    }

    /**
     * @param null $class_input
     * @return TemplateFolders
     * @throws MailchimpException
     */
    public function templateFolders($class_input = null)
    {
        $this->template_folders = new TemplateFolders($this->apikey, $class_input);
        return $this->template_folders;
    }

    /**
     * @param null $class_input
     * @return Templates
     * @throws MailchimpException
     */
    public function templates($class_input = null)
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
     * @throws MailchimpException
     */
    public function get($query_params = [])
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
     * @throws MailchimpException
     */
    public function post($params = [])
    {
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
     * @throws MailchimpException
     */
    public function patch($params = [])
    {
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
     * @throws MailchimpException
     */
    public function put($params = [])
    {
        $this->request->setMethod(MailchimpRequest::PUT);
        $this->request->setPayload($params);

        $connection = new MailchimpConnection($this->request, $this->settings);
        $response = $connection->execute();
        $this->resetRequest();

        return $response;
    }

    /**
     * @return MailchimpResponse
     * @throws MailchimpException
     */
    public function delete()
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
    ) {
        $encoded_uri = urlencode($redirect_uri);

        $authUrl = "https://login.mailchimp.com/oauth2/authorize";
        $authUrl .= "?client_id=" . $client_id;
        $authUrl .= "&redirect_uri=" . $encoded_uri;
        $authUrl .= "&response_type=code";

        return $authUrl;
    }

    /**
     * @param $code
     * @param $client_id
     * @param $client_sec
     * @param $redirect_uri
     * @return string
     * @throws MailchimpException
     */
    public static function oauthExchange(
        $code,
        $client_id,
        $client_sec,
        $redirect_uri
    ) {
        $encoded_uri = urldecode($redirect_uri);

        $oauth_string = "grant_type=authorization_code";
        $oauth_string .= "&client_id=" . $client_id;
        $oauth_string .= "&client_secret=" . $client_sec;
        $oauth_string .= "&redirect_uri=" . $encoded_uri;
        $oauth_string .= "&code=" . $code;

        $access_token = self::requestAccessToken($oauth_string);
        $apiKey = self::requestKeyFromToken($access_token);

        return $apiKey;
    }

    /**
     * @param $endpoint
     * @param array $params
     * @return MailchimpResponse
     * @throws MailchimpException
     */
    protected function postToActionEndpoint($endpoint, $params = [])
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
     * @throws MailchimpException
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
     * @throws MailchimpException
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
            throw new MailchimpException(
                'MailChimp did not return an access token'
            );
        }

        return $access_token;
    }

    /**
     * @param $access_token
     * @return string
     * @throws MailchimpException
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
