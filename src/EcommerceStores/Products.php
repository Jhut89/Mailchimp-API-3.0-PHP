<?php

namespace MailchimpAPI\EcommerceStores;

use MailchimpAPI\EcommerceStores;
use MailchimpAPI\EcommerceStores\Products\Variants;
use MailchimpAPI\EcommerceStores\Products\Images;

/**
 * Class Products
 * @package MailchimpAPI\EcommerceStores
 */
class Products extends EcommerceStores
{
    /**
     * @var array
     */
    public $req_post_params = [
        'id',
        'title',
        'variants'
    ];

    /**
     * @var Variants
     */
    private $variants;
    /**
     * @var Images
     */
    private $images;
    /**
     * @var string
     */
    protected $parent_resource;

    /**
     * @var string
     */
    protected $grandchild_resource;

    const URL_COMPONENT = '/products/';

    /**
     * Products constructor.
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
        $this->apikey = $apikey;
        $this->parent_resource = $parent_resource;
    }

    //SUBCLASS FUNCTIONS ------------------------------------------------------------

    /**
     * @param null $class_input
     * @return Variants
     * @throws \MailchimpAPI\MailchimpException
     */
    public function variants($class_input = null)
    {
        $this->variants = new Variants(
            $this->apikey,
            $this->subclass_resource,
            $this->grandchild_resource,
            $class_input
        );
        return $this->variants;
    }


    /**
     * @param null $class_input
     * @return Images
     * @throws \MailchimpAPI\MailchimpException
     */
    public function images($class_input = null)
    {
        $this->images = new Images(
            $this->apikey,
            $this->subclass_resource,
            $this->grandchild_resource,
            $class_input
        );
        return $this->images;
    }
}
