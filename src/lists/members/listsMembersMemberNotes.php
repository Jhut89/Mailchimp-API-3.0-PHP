<?php

class Lists_Members_Member_Notes extends Lists_Members
{

    //REQUIRED FIELDS DEFINITIONS
    public $req_post_prarams = [
        'note'
    ];
    public $req_patch_prarams = [
        'note'
    ];

    function __construct(
        $apikey,
        $parent_resource,
        $grandparent_resource,
        $class_input
    ) {
        parent::__construct($apikey, $parent_resource, $grandparent_resource);
        if (isset($class_input)) {
            $this->url .= '/notes/' . $class_input;
        } else {
            $this->url .= '/notes/';
        }

    }
}