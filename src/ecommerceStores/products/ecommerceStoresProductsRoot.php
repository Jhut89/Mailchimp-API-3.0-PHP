<?php

class Ecommerce_Stores_Products extends Ecommerce_Stores
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
        $this->variants = new Ecommerce_Stores_Products_Variants(
            $this->apikey,
            $this->subclass_resource,
            $this->grandchild_resource,
            $class_input
        );
        return $this->variants;
    }

    public function images( $class_input = null )
    {
        $this->images = new Ecommerce_Stores_Product_Images(
            $this->apikey,
            $this->subclass_resource,
            $this->grandchild_resource,
            $class_input
        );
        return $this->images;
    }

}