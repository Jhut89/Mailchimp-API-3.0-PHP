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
    protected $grandchild_resource;

    /**
     * @var string
     */
    private $click_members;

    /**
     * the url component for this endpoint
     */
    const URL_COMPONENT = '/click-details/';

    /**
     * ClickReports constructor.
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
     * @return Members
     * @throws \MailchimpAPI\MailchimpException
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
