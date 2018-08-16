<?php

namespace MailchimpAPI\Resources;

use MailchimpAPI\Requests\MailchimpRequest;
use MailchimpAPI\Resources\Reports\CampaignAbuse;
use MailchimpAPI\Resources\Reports\CampaignAdvice;
use MailchimpAPI\Resources\Reports\ClickReports;
use MailchimpAPI\Resources\Reports\DomainPerformance;
use MailchimpAPI\Resources\Reports\EepurlReports;
use MailchimpAPI\Resources\Reports\EmailActivity;
use MailchimpAPI\Resources\Reports\GoogleAnalytics;
use MailchimpAPI\Resources\Reports\OpenDetails;
use MailchimpAPI\Resources\Reports\SentTo;
use MailchimpAPI\Resources\Reports\SubReports;
use MailchimpAPI\Resources\Reports\TopLocations;
use MailchimpAPI\Resources\Reports\Unsubscribes;
use MailchimpAPI\Settings\MailchimpSettings;

class Reports extends ApiResource
{
    /**
     * the url component for this endpoint
     */
    const URL_COMPONENT = '/reports/';

    public function __construct(MailchimpRequest $request, MailchimpSettings $settings, $campaign_id = null)
    {
        parent::__construct($request, $settings);
        $request->appendToEndpoint(self::URL_COMPONENT . $campaign_id);
    }

    //SUBCLASS FUNCTIONS ------------------------------------------------------------

    public function unsubscribes($member = null)
    {
        return new Unsubscribes(
            $this->getRequest(),
            $this->getSettings(),
            $member
        );
    }

    public function subReports()
    {
        return new SubReports(
            $this->getRequest(),
            $this->getSettings()
        );
    }

    public function sentTo($member = null)
    {
        return new SentTo(
            $this->getRequest(),
            $this->getSettings(),
            $member
        );
    }

    public function locations()
    {
        return new TopLocations(
            $this->getRequest(),
            $this->getSettings()
        );
    }

    public function emailActivity($member = null)
    {
        return new EmailActivity(
            $this->getRequest(),
            $this->getSettings(),
            $member
        );
    }

    public function eepurlReports()
    {
        return new EepurlReports(
            $this->getRequest(),
            $this->getSettings()
        );
    }

    public function domainPerformance()
    {
        return new DomainPerformance(
            $this->getRequest(),
            $this->getSettings()
        );
    }

    public function advice()
    {
        return new CampaignAdvice(
            $this->getRequest(),
            $this->getSettings()
        );
    }

    public function abuse($report_id = null)
    {
        return new CampaignAbuse(
            $this->getRequest(),
            $this->getSettings(),
            $report_id
        );
    }

    public function clickReports($link_id = null)
    {
        return new ClickReports(
            $this->getRequest(),
            $this->getSettings(),
            $link_id
        );
    }

    public function openReports()
    {
        return new OpenDetails(
            $this->getRequest(),
            $this->getSettings()
        );
    }
    
    public function googleAnalytics($profile_id = null)
    {
        return new GoogleAnalytics(
            $this->getRequest(),
            $this->getSettings(),
            $profile_id
        );
    }
}
