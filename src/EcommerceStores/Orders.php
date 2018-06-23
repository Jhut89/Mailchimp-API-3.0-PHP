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
    public $grandchild_resource;

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
    public $lines;

    /**
     * Orders constructor.
     * @param $apikey
     * @param $parent_resource
     * @param $class_input
     * @throws \MailchimpAPI\Library_Exception
     */
    public function __construct($apikey, $parent_resource, $class_input)
    {
        parent::__construct($apikey, $parent_resource);
        if ($class_input) {
            $this->request->appendToEndpoint('/orders/' . $class_input);
        } else {
            $this->request->appendToEndpoint('/orders/');
        }
        $this->grandchild_resource = $class_input;
    }

    //SUBCLASS FUNCTIONS ------------------------------------------------------------

    /**
     * @param null $class_input
     * @return Lines
     * @throws \MailchimpAPI\Library_Exception
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
