<?php

namespace MailchimpAPI\Reports;

use MailchimpAPI\Reports;
use MailchimpAPI\Reports\ClickReports\Members;

/**
 * Class ClickReports
 * @package MailchimpAPI\Reports
 */
class ClickReports extends Reports
{

    /**
     * @var string
     */
    public $grandchild_resource;

    /**
     * @var string
     */
    public $click_members;

    /**
     * ClickReports constructor.
     * @param $apikey
     * @param $parent_resource
     * @param $class_input
     * @throws \MailchimpAPI\Library_Exception
     */
    public function __construct($apikey, $parent_resource, $class_input)
    {
        parent::__construct($apikey, $parent_resource);
        if ($class_input) {
            $this->request->appendToEndpoint('/click-details/' . $class_input);
        } else {
            $this->request->appendToEndpoint('/click-details/');
        }
        $this->grandchild_resource = $class_input;
    }

    //SUBCLASS FUNCTIONS ------------------------------------------------------------


    /**
     * @param null $class_input
     * @return Members
     * @throws \MailchimpAPI\Library_Exception
     */
    public function members($class_input = null)
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
