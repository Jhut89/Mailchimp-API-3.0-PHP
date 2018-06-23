<?php

namespace MailchimpAPI;

use MailchimpAPI\Lists\AbuseReports;
use MailchimpAPI\Reports\CampaignAbuse;
use MailchimpAPI\Reports\CampaignAdvice;
use MailchimpAPI\Reports\ClickReports;
use MailchimpAPI\Reports\DomainPerformance;
use MailchimpAPI\Reports\EepurlReports;
use MailchimpAPI\Reports\EmailActivity;
use MailchimpAPI\Reports\SentTo;
use MailchimpAPI\Reports\SubReports;
use MailchimpAPI\Reports\TopLocations;
use MailchimpAPI\Reports\Unsubscribes;

/**
 * Class Reports
 * @package MailchimpAPI
 */
class Reports extends Mailchimp
{

    /**
     * @var string
     */
    public $subclass_resource;

    //SUBCLASS INSTANTIATIONS
    /**
     * @var Unsubscribes
     */
    public $unsubscribes;
    /**
     * @var SubReports
     */
    public $sub_reports;
    /**
     * @var SentTo
     */
    public $sent_to;
    /**
     * @var TopLocations
     */
    public $locations;
    /**
     * @var EmailActivity
     */
    public $email_activity;
    /**
     * @var EepurlReports
     */
    public $eepurl;
    /**
     * @var DomainPerformance
     */
    public $domain_performance;
    /**
     * @var CampaignAdvice
     */
    public $advice;
    /**
     * @var AbuseReports
     */
    public $abuse;
    /**
     * @var ClickReports
     */
    public $click_reports;


    /**
     * Reports constructor.
     * @param $apikey
     * @param $class_input
     * @throws Library_Exception
     */
    public function __construct($apikey, $class_input)
    {
        parent::__construct($apikey);
        if ($class_input) {
            $this->request->appendToEndpoint('/reports/' . $class_input);
        } else {
            $this->request->appendToEndpoint('/reports/');
        }
        $this->subclass_resource = $class_input;
    }

    //SUBCLASS FUNCTIONS ------------------------------------------------------------

    /**
     * @param null $class_input
     * @return Unsubscribes
     * @throws Library_Exception
     */
    public function unsubscribes($class_input = null)
    {
        $this->unsubscribes = new Unsubscribes(
            $this->apikey,
            $this->subclass_resource,
            $class_input
        );
        return $this->unsubscribes;
    }

    /**
     * @param null $class_input
     * @return SubReports
     * @throws Library_Exception
     */
    public function subReports($class_input = null)
    {
        $this->sub_reports = new SubReports(
            $this->apikey,
            $this->subclass_resource,
            $class_input
        );
        return $this->sub_reports;
    }

    /**
     * @param null $class_input
     * @return SentTo
     * @throws Library_Exception
     */
    public function sentTo($class_input = null)
    {
        $this->sent_to = new SentTo(
            $this->apikey,
            $this->subclass_resource,
            $class_input
        );
        return $this->sent_to;
    }

    /**
     * @param null $class_input
     * @return TopLocations
     * @throws Library_Exception
     */
    public function locations($class_input = null)
    {
        $this->locations = new TopLocations(
            $this->apikey,
            $this->subclass_resource,
            $class_input
        );
        return $this->locations;
    }

    /**
     * @param null $class_input
     * @return EmailActivity
     * @throws Library_Exception
     */
    public function emailActivity($class_input = null)
    {
        $this->email_activity = new EmailActivity(
            $this->apikey,
            $this->subclass_resource,
            $class_input
        );
        return $this->email_activity;
    }

    /**
     * @param null $class_input
     * @return EepurlReports
     * @throws Library_Exception
     */
    public function eepurl($class_input = null)
    {
        $this->eepurl = new EepurlReports(
            $this->apikey,
            $this->subclass_resource,
            $class_input
        );
        return $this->eepurl;
    }

    /**
     * @param null $class_input
     * @return DomainPerformance
     * @throws Library_Exception
     */
    public function domainPerformance($class_input = null)
    {
        $this->domain_performance = new DomainPerformance(
            $this->apikey,
            $this->subclass_resource,
            $class_input
        );
        return $this->domain_performance;
    }

    /**
     * @param null $class_input
     * @return CampaignAdvice
     * @throws Library_Exception
     */
    public function advice($class_input = null)
    {
        $this->advice = new CampaignAdvice(
            $this->apikey,
            $this->subclass_resource,
            $class_input
        );
        return $this->advice;
    }

    /**
     * @param null $class_input
     * @return CampaignAbuse
     * @throws Library_Exception
     */
    public function abuse($class_input = null)
    {
        $this->abuse = new CampaignAbuse(
            $this->apikey,
            $this->subclass_resource,
            $class_input
        );
        return $this->abuse;
    }

    /**
     * @param null $class_input
     * @return ClickReports
     * @throws Library_Exception
     */
    public function clickReports($class_input = null)
    {
        $this->click_reports = new ClickReports(
            $this->apikey,
            $this->subclass_resource,
            $class_input
        );
        return $this->click_reports;
    }
}
