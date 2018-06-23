<?php

namespace MailchimpAPI\Reports;

use MailchimpAPI\Reports;
use MailchimpAPI\Reports\Click_Reports\Members;

class Click_Reports extends Reports
{

    public $grandchild_resource;

    //SUBCLASS INSANTIATIONS

    public $click_members;

    function __construct($apikey, $parent_resource, $class_input)
    {
        parent::__construct($apikey, $parent_resource);
        if ($class_input) {
            $this->url .= '/click-details/' . $class_input;
        } else {
            $this->url .= '/click-details/';
        }
        $this->grandchild_resource = $class_input;
    }

    //SUBCLASS FUNCTIONS ------------------------------------------------------------


    public function members( $class_input = null )
    {
        $this->click_members = new Members(
            $this->apikey,
            $this->subclass_resource,
            $this->grandchild_resource,
            $class_input
        );
        return $this->click_members;
    }

}