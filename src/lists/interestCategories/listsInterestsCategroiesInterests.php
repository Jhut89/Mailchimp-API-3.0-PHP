<?php

class Lists_Interests_Categories_Interest extends Lists_Interest_Categories
{

    //REQUIRED FIELDS DEFINITIONS
    public $req_post_prarams = [
        'name'
    ];
    public $req_patch_prarams = [
        'name'
    ];

    function __construct(
        $apikey,
        $parent_resource,
        $grandparent_resource,
        $class_input
    ) {
        parent::__construct($apikey, $parent_resource, $grandparent_resource);
        if (isset($class_input)) {
            $this->url .= '/interests/' . $class_input;
        } else {
            $this->url .= '/interests/';
        }

    }
}