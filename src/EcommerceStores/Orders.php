<?php

namespace MailchimpAPI\EcommerceStores;

use MailchimpAPI\EcommerceStores;
use MailchimpAPI\EcommerceStores\Orders\Lines;

/**
 * Class Orders
 * @package MailchimpAPI\EcommerceStores
 */
class Orders extends EcommerceStores
{

    /**
     * @var string
     */
    protected $grandchild_resource;

    /**
     * @var array
     */
    public $req_post_params = [
        'id',
        'customer',
        'currency_code',
        'order_total',
        'lines'
    ];

    /**
     * @var Lines
     */
    private $lines;

    const URL_COMPONENT = '/orders/';

    /**
     * Orders constructor.
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
        $this->grandchild_resource = $class_input;
    }

    //SUBCLASS FUNCTIONS ------------------------------------------------------------

    /**
     * @param null $class_input
     * @return Lines
     * @throws \MailchimpAPI\MailchimpException
     */
    public function lines($class_input = null)
    {
        $this->lines = new Lines(
            $this->apikey,
            $this->subclass_resource,
            $this->grandchild_resource,
            $class_input
        );
        return $this->lines;
    }
}
