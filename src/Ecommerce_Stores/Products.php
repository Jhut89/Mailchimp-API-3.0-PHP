<?php

namespace Mailchimp_API\Ecommerce_Stores;

use Mailchimp_API\Ecommerce_Stores;
use Mailchimp_API\Ecommerce_Stores\Products\Variants;
use Mailchimp_API\Ecommerce_Stores\Products\Images;

class Products extends Ecommerce_Stores
{

    public $grandchild_resource;

    //REQUIRED FIELDS DEFINITIONS
    public $req_post_prarams = [
        'id',
        'title',
        'variants'
    ];

    //SUBCLASS INSTANTIATIONS
    public $variants;
    public $images;

    function __construct($apikey, $parent_resource, $class_input)
    {
        parent::__construct($apikey, $parent_resource);
        if (isset($class_input)) {
            $this->url .= '/products/' . $class_input;
        } else {
            $this->url .= '/products/';
        }

        $this->grandchild_resource = $class_input;
    }

    //SUBCLASS FUNCTIONS ------------------------------------------------------------

    public function variants( $class_input = null )
    {
        $this->variants = new Variants(
            $this->apikey,
            $this->subclass_resource,
            $this->grandchild_resource,
            $class_input
        );
        return $this->variants;
    }

    public function images( $class_input = null )
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