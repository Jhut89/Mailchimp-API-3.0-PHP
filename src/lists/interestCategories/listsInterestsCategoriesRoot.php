<?php

class Lists_Interest_Categories extends Lists {

    public $grandchild_resource;

    //REQUIRED FIELDS DEFINITIONS
    public $req_post_prarams = [
        'title',
        'type'
    ];
    public $req_patch_prarams = [
        'title',
        'type'
    ];

    //SUBCLASS INSTANTIATIONS
    public $interests;

    function __construct($apikey, $parent_resource, $class_input)
    {
        parent::__construct($apikey, $parent_resource);
        if (isset($class_input)) {
            $this->url .= '/interest-categories/' . $class_input;
        } else {
            $this->url .= '/interest-categories/';
        }

        $this->grandchild_resource = $class_input;

    }

    //SUBCLASS FUNCTIONS ------------------------------------------------------------

    public function interests( $class_input = null )
    {
        $this->interests = new Lists_Interests_Categories_Interest(
            $this->apikey,
            $this->subclass_resource,
            $this->grandchild_resource,
            $class_input
        );
        return $this->interests;
    }
}