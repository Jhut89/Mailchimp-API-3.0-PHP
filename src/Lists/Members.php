<?php

namespace MailchimpAPI\Lists;

use MailchimpAPI\Lists;
use MailchimpAPI\Lists\Members\Notes;
use MailchimpAPI\Lists\Members\Goals;
use MailchimpAPI\Lists\Members\Activity;

/**
 * Class Members
 * @package MailchimpAPI\Lists
 */
class Members extends Lists
{

    /**
     * @var string
     */
    public $grandchild_resource;

    /**
     * @var array
     */
    public $req_post_params = [
        'email_address',
        'status'
    ];
    /**
     * @var array
     */
    public $req_put_params = [
        'email_address',
        'status_if_new'
    ];

    /**
     * @var Notes
     */
    public $notes;
    /**
     * @var Goals
     */
    public $goals;
    /**
     * @var Activity
     */
    public $member_activity;

    /**
     * Members constructor.
     * @param $apikey
     * @param $parent_resource
     * @param $class_input
     * @throws \MailchimpAPI\Library_Exception
     */
    public function __construct($apikey, $parent_resource, $class_input)
    {
        parent::__construct($apikey, $parent_resource);
        if ($class_input) {
            $this->request->appendToEndpoint('/members/' . $class_input);
        } else {
            $this->request->appendToEndpoint('/members/');
        }
        $this->grandchild_resource = $class_input;
    }

    //SUBCLASS FUNCTIONS ------------------------------------------------------------

    /**
     * @param null $class_input
     * @return Notes
     * @throws \MailchimpAPI\Library_Exception
     */
    public function notes($class_input = null)
    {
        $this->notes = new Notes(
            $this->apikey,
            $this->subclass_resource,
            $this->grandchild_resource,
            $class_input
        );
        return $this->notes;
    }

    /**
     * @param null $class_input
     * @return Goals
     * @throws \MailchimpAPI\Library_Exception
     */
    public function goals($class_input = null)
    {
        $this->goals = new Goals(
            $this->apikey,
            $this->subclass_resource,
            $this->grandchild_resource,
            $class_input
        );
        return $this->goals;
    }

    /**
     * @param null $class_input
     * @return \MailchimpAPI\Lists\Activity|Activity
     * @throws \MailchimpAPI\Library_Exception
     */
    public function activity($class_input = null)
    {
        $this->member_activity = new Activity(
            $this->apikey,
            $this->subclass_resource,
            $this->grandchild_resource,
            $class_input
        );
        return $this->member_activity;
    }
}
