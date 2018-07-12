<?php

namespace MailchimpAPI;

use MailchimpAPI\Lists\AbuseReports;
use MailchimpAPI\Reports\CampaignAbuse;
use MailchimpAPI\Reports\CampaignAdvice;
use MailchimpAPI\Reports\ClickReports;
use MailchimpAPI\Reports\DomainPerformance;
use MailchimpAPI\Reports\EepurlReports;
use MailchimpAPI\Reports\EmailActivity;
use MailchimpAPI\Reports\GoogleAnalytics;
use MailchimpAPI\Reports\OpenDetails;
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
    protected $subclass_resource;

    /**
     * @var Unsubscribes
     */
    private $unsubscribes;
    /**
     * @var SubReports
     */
    private $sub_reports;
    /**
     * @var SentTo
     */
    private $sent_to;
    /**
     * @var TopLocations
     */
    private $locations;
    /**
     * @var EmailActivity
     */
    private $email_activity;
    /**
     * @var GoogleAnalytics
     */
    private $google_analytics;
    /**
     * @var OpenDetails
     */
    private $open_details;
    /**
     * @var EepurlReports
     */
    private $eepurl;
    /**
     * @var DomainPerformance
     */
    private $domain_performance;
    /**
     * @var CampaignAdvice
     */
    private $advice;
    /**
     * @var AbuseReports
     */
    private $abuse;
    /**
     * @var ClickReports
     */
    private $click_reports;

    /**
     * the url component for this endpoint
     */
    const URL_COMPONENT = '/reports/';

    /**
     * Reports constructor.
     * @param $apikey
     * @param $class_input
     * @throws MailchimpException
     */
    public function __construct($apikey, $class_input)
    {
        parent::__construct($apikey);
        if ($class_input) {
            $this->request->appendToEndpoint(self::URL_COMPONENT . $class_input);
        } else {
            $this->request->appendToEndpoint(self::URL_COMPONENT);
        }
        $this->subclass_resource = $class_input;
    }

    //SUBCLASS FUNCTIONS ------------------------------------------------------------

    /**
     * @param null $class_input
     * @return Unsubscribes
     * @throws MailchimpException
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
     * @throws MailchimpException
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
     * @throws MailchimpException
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
     * @throws MailchimpException
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
     * @throws MailchimpException
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
     * @throws MailchimpException
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
     * @throws MailchimpException
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
     * @throws MailchimpException
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
     * @throws MailchimpException
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
     * @throws MailchimpException
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

    /**
     * @return OpenDetails
     * @throws MailchimpException
     */
    public function openDetails()
    {
        $this->open_details = new OpenDetails(
            $this->apikey,
            $this->subclass_resource
        );
        return $this->open_details;
    }

    /**
     * @param null $class_input
     * @return GoogleAnalytics
     * @throws MailchimpException
     */
    public function googleAnalytics($class_input = null)
    {
        $this->google_analytics = new GoogleAnalytics(
            $this->apikey,
            $this->subclass_resource,
            $class_input
        );
        return $this->google_analytics;
    }
}
