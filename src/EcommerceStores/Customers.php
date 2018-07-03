<?php

namespace MailchimpAPI\EcommerceStores;

use MailchimpAPI\EcommerceStores;

/**
 * Class Customers
 * @package MailchimpAPI\EcommerceStores
 */
class Customers extends EcommerceStores
{

    /**
     * @var
     */
    protected $class_input;

    /**
     * @var array
     */
    public $req_post_params = [
        'id',
        'email_address',
        'opt_in_status'
    ];
    /**
     * @var array
     */
    public $req_put_params = [
        'id',
        'email_address',
        'opt_in_status'
    ];

    const URL_COMPONENT = '/customers/';

    /**
     * Customers constructor.
     * @param $apikey
     * @param $parent_resource
     * @param $class_input
     * @throws \MailchimpAPI\MailchimpException
     */
    public function __construct($apikey, $parent_resource, $class_input)
    {
        parent::__construct($apikey, $parent_resource);
        if ($class_input) {
            $this->request->appendToEndpoint(self::URL_COMPONENT . $class_input);
        } else {
            $this->request->appendToEndpoint(self::URL_COMPONENT);
        }
        $this->class_input = $class_input;
    }
}
