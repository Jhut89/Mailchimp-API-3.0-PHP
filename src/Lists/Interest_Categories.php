<?php

namespace Mailchimp_API\Lists;

use Mailchimp_API\Lists;
use Mailchimp_API\Lists\Interests_Categories\Interests;

class Interest_Categories extends Lists {

    public $grandchild_resource;

    //REQUIRED FIELDS DEFINITIONS
    public $req_post_params = [
        'title',
        'type'
    ];
    public $req_patch_params = [
        'title',
        'type'
    ];

    //SUBCLASS INSTANTIATIONS
    public $interests;

    function __construct($apikey, $parent_resource, $class_input)
    {
        parent::__construct($apikey, $parent_resource);
        if ($class_input) {
            $this->url .= '/interest-categories/' . $class_input;
        } else {
            $this->url .= '/interest-categories/';
        }

        $this->grandchild_resource = $class_input;

    }

    //SUBCLASS FUNCTIONS ------------------------------------------------------------

    public function interests( $class_input = null )
    {
        $this->interests = new Interests(
            $this->apikey,
            $this->subclass_resource,
            $this->grandchild_resource,
            $class_input
        );
        return $this->interests;
    }
}