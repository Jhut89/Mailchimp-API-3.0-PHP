<?php

namespace MailchimpAPI;

/**
 * Class CampaignFolders
 * @package MailchimpAPI
 */
class CampaignFolders extends Mailchimp
{


    /**
     * @var array
     */
    public $req_post_params = [
        'name'
    ];
    /**
     * @var array
     */
    public $req_patch_params = [
        'name'
    ];

    /**
     * The url component for this endpoint
     */
    const URL_COMPONENT = '/campaign-folders/';

    /**
     * CampaignFolders constructor.
     * @param $apikey
     * @param $class_input
     * @throws MailchimpException
     */
    public function __construct($apikey, $class_input)
    {
        parent::__construct($apikey);
        if ($class_input) {
            $this->request->appendToEndpoint(self::URL_COMPONENT . $class_input);
        } else {
            $this->request->appendToEndpoint(self::URL_COMPONENT);
        }
    }
}
