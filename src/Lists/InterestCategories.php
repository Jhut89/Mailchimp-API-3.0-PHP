<?php

namespace MailchimpAPI\Lists;

use MailchimpAPI\Lists;
use MailchimpAPI\Lists\InterestsCategories\Interests;

/**
 * Class InterestCategories
 * @package MailchimpAPI\Lists
 */
class InterestCategories extends Lists
{

    /**
     * @var
     */
    public $grandchild_resource;


    /**
     * @var array
     */
    public $req_post_params = [
        'title',
        'type'
    ];
    /**
     * @var array
     */
    public $req_patch_params = [
        'title',
        'type'
    ];

    //SUBCLASS INSTANTIATIONS
    /**
     * @var
     */
    public $interests;

    /**
     * InterestCategories constructor.
     * @param $apikey
     * @param $parent_resource
     * @param $class_input
     * @throws \MailchimpAPI\MailchimpException
     */
    public function __construct($apikey, $parent_resource, $class_input)
    {
        parent::__construct($apikey, $parent_resource);
        if ($class_input) {
            $this->request->appendToEndpoint('/interest-categories/' . $class_input);
        } else {
            $this->request->appendToEndpoint('/interest-categories/');
        }
        $this->grandchild_resource = $class_input;
    }

    //SUBCLASS FUNCTIONS ------------------------------------------------------------

    /**
     * @param null $class_input
     * @return Interests
     * @throws \MailchimpAPI\MailchimpException
     */
    public function interests($class_input = null)
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
