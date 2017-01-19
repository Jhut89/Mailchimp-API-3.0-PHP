<?php

class Lists_Members extends Lists
{

    public $grandchild_resource;

    //REQUIRED FIELDS DEFINITIONS
    public $req_post_prarams = [
        'email_address',
        'status'
    ];
    public $req_put_prarams = [
        'email_address',
        'status_if_new'
    ];

    //SUBCLASS INSTANTIATION
    public $notes;
    public $goals;
    public $member_activity;

    function __construct($apikey, $parent_resource, $class_input)
    {
        parent::__construct($apikey, $parent_resource);
        if (isset($class_input)) {
            $this->url .= '/members/' . $class_input;
        } else {
            $this->url .= '/members/';
        }
        $this->grandchild_resource = $class_input;

    }

    //SUBCLASS FUNCTIONS ------------------------------------------------------------

    public function notes( $class_input = null )
    {
        $this->notes = new Lists_Members_Member_Notes(
            $this->apikey,
            $this->subclass_resource,
            $this->grandchild_resource,
            $class_input
        );
        return $this->notes;
    }

    public function goals( $class_input = null )
    {
        $this->goals = new Lists_Members_Member_Goals(
            $this->apikey,
            $this->subclass_resource,
            $this->grandchild_resource,
            $class_input
        );
        return $this->goals;
    }

    public function activity( $class_input = null )
    {
        $this->member_activity = new Lists_Members_Member_Activity(
            $this->apikey,
            $this->subclass_resource,
            $this->grandchild_resource,
            $class_input
        );
        return $this->member_activity;
    }

}