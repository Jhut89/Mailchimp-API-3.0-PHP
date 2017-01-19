<?php

class Lists_Merge_Fields extends Lists
{

    //REQUIRED FIELDS DEFINITIONS
    public $req_post_prarams = [
        'name',
        'type'
    ];
    public $req_patch_prarams = [
        'name'
    ];

    function __construct($apikey, $parent_resource, $class_input)
    {
        parent::__construct($apikey, $parent_resource);
        if (isset($class_input)) {
            $this->url .= '/merge-fields/' . $class_input;
        } else {
            $this->url .= '/merge-fields/';
        }

    }
}