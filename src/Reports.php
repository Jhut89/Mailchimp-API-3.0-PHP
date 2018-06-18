<?php

namespace Mailchimp_API;

use Mailchimp_API\Reports\Campaign_Abuse;
use Mailchimp_API\Reports\Campaign_Advice;
use Mailchimp_API\Reports\Click_Reports;
use Mailchimp_API\Reports\Domain_Performance;
use Mailchimp_API\Reports\Eepurl_Reports;
use Mailchimp_API\Reports\Email_Activity;
use Mailchimp_API\Reports\Sent_To;
use Mailchimp_API\Reports\Sub_Reports;
use Mailchimp_API\Reports\Top_Locations;
use Mailchimp_API\Reports\Unsubscribes;

class Reports extends Mailchimp
{

    public $subclass_resource;

    //SUBCLASS INSTANTIATIONS
    public $unsubscribes;
    public $sub_reports;
    public $sent_to;
    public $locations;
    public $email_activity;
    public $eepurl;
    public $domain_performance;
    public $advice;
    public $abuse;
    public $click_reports;


    function __construct($apikey, $class_input)
    {
        parent::__construct($apikey);
        if ($class_input) {
            $this->url .= '/reports/' . $class_input;
        } else {
            $this->url .= '/reports/';
        }
      
        $this->subclass_resource = $class_input;
    }

    //SUBCLASS FUNCTIONS ------------------------------------------------------------

    public function unsubscribes( $class_input = null )
    {
        $this->unsubscribes = new Unsubscribes(
            $this->apikey,
            $this->subclass_resource,
            $class_input
        );
        return $this->unsubscribes;
    }

    public function subReports( $class_input = null )
    {
        $this->sub_reports = new Sub_Reports(
            $this->apikey,
            $this->subclass_resource,
            $class_input
        );
        return $this->sub_reports;
    }

    public function sentTo( $class_input = null )
    {
        $this->sent_to = new Sent_To(
            $this->apikey,
            $this->subclass_resource,
            $class_input
        );
        return $this->sent_to;
    }

    public function locations( $class_input = null )
    {
        $this->locations = new Top_Locations(
            $this->apikey,
            $this->subclass_resource,
            $class_input
        );
        return $this->locations;
    }

    public function emailActivity( $class_input = null )
    {
        $this->email_activity = new Email_Activity(
            $this->apikey,
            $this->subclass_resource,
            $class_input
        );
        return $this->email_activity;
    }

    public function eepurl( $class_input = null )
    {
        $this->eepurl = new Eepurl_Reports(
            $this->apikey,
            $this->subclass_resource,
            $class_input
        );
        return $this->eepurl;
    }

    public function domainPerformance( $class_input = null )
    {
        $this->domain_performance = new Domain_Performance(
            $this->apikey,
            $this->subclass_resource,
            $class_input
        );
        return $this->domain_performance;
    }

    public function advice( $class_input = null )
    {
        $this->advice = new Campaign_Advice(
            $this->apikey,
            $this->subclass_resource,
            $class_input
        );
        return $this->advice;
    }

    public function abuse( $class_input = null )
    {
        $this->abuse = new Campaign_Abuse(
            $this->apikey,
            $this->subclass_resource,
            $class_input
        );
        return $this->abuse;
    }

    public function clickReports( $class_input = null )
    {
        $this->click_reports = new Click_Reports(
            $this->apikey,
            $this->subclass_resource,
            $class_input
        );
        return $this->click_reports;
    }

}