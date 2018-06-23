<?php

namespace MailchimpAPI\EcommerceStores;

use MailchimpAPI\EcommerceStores;
use MailchimpAPI\EcommerceStores\Carts\Lines;

/**
 * Class Carts
 * @package MailchimpAPI\EcommerceStores
 */
class Carts extends EcommerceStores
{

    /**
     * @var
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
     * Carts constructor.
     * @param $apikey
     * @param $parent_resource
     * @param $class_input
     * @throws \MailchimpAPI\Library_Exception
     */
    public function __construct($apikey, $parent_resource, $class_input)
    {
        parent::__construct($apikey, $parent_resource);
        if ($class_input) {
            $this->request->appendToEndpoint('/carts/' . $class_input);
        } else {
            $this->request->appendToEndpoint('/carts/');
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
