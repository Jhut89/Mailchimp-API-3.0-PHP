<?php

namespace MailchimpAPI\EcommerceStores\Products;

use MailchimpAPI\EcommerceStores\Products;

/**
 * Class Variants
 * @package MailchimpAPI\EcommerceStores\Products
 */
class Variants extends Products
{

    /**
     * @var
     */
    private $class_input;


    /**
     * @var array
     */
    public $req_post_params = [
        'id',
        'title'
    ];
    /**
     * @var array
     */
    public $req_put_params = [
        'id',
        'title'
    ];

    /**
     * Variants constructor.
     * @param $apikey
     * @param $parent_resource
     * @param $grandparent_resource
     * @param $class_input
     * @throws \MailchimpAPI\MailchimpException
     */
    public function __construct(
        $apikey,
        $parent_resource,
        $grandparent_resource,
        $class_input
    ) {

        parent::__construct($apikey, $parent_resource, $grandparent_resource);

        if ($class_input) {
            $this->request->appendToEndpoint('/variants/' . $class_input);
        } else {
            $this->request->appendToEndpoint('/variants/');
        }

        $this->class_input = $class_input;
    }
}
