<?php

namespace MailchimpAPI;

/**
 * Class AuthorizedApps
 * @package MailchimpAPI
 */
class AuthorizedApps extends Mailchimp
{


    /**
     * @var array
     */
    public $req_post_params = [
        'client_id',
        'client_secret'
    ];


    /**
     * AuthorizedApps constructor.
     * @param $apikey
     * @param $class_input
     * @throws MailchimpException
     */
    public function __construct($apikey, $class_input)
    {
        parent::__construct($apikey);
        if ($class_input) {
            $this->request->appendToEndpoint('/authorized-apps/' . $class_input);
        } else {
            $this->request->appendToEndpoint('/authorized-apps/');
        }
    }
}
