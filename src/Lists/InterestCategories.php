<?php

namespace MailchimpAPI\Lists;

use MailchimpAPI\Lists;
use MailchimpAPI\Lists\InterestCategories\Interest;

/**
 * Class InterestCategories
 * @package MailchimpAPI\Lists
 */
class InterestCategories extends Lists
{

    /**
     * @var
     */
    protected $grandchild_resource;


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
    private $interests;

    const URL_COMPONENT = '/interest-categories/';

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
            $this->request->appendToEndpoint(self::URL_COMPONENT . $class_input);
        } else {
            $this->request->appendToEndpoint(self::URL_COMPONENT);
        }
        $this->grandchild_resource = $class_input;
    }

    //SUBCLASS FUNCTIONS ------------------------------------------------------------

    /**
     * @param null $class_input
     * @return Interest
     * @throws \MailchimpAPI\MailchimpException
     */
    public function interests($class_input = null)
    {
        $this->interests = new Interest(
            $this->apikey,
            $this->subclass_resource,
            $this->grandchild_resource,
            $class_input
        );
        return $this->interests;
    }
}
