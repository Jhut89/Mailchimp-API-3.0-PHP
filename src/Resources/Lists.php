<?php

namespace MailchimpAPI\Resources;

use MailchimpAPI\Requests\MailchimpRequest;
use MailchimpAPI\Resources\Lists\AbuseReports;
use MailchimpAPI\Resources\Lists\Clients;
use MailchimpAPI\Resources\Lists\GrowthHistory;
use MailchimpAPI\Resources\Lists\InterestCategories;
use MailchimpAPI\Resources\Lists\MergeFields;
use MailchimpAPI\Resources\Lists\Segments;
use MailchimpAPI\Resources\Lists\SignupForms;
use MailchimpAPI\Resources\Lists\Webhooks;
use MailchimpAPI\Settings\MailchimpSettings;

class Lists extends ApiResource
{
    /**
     * @var null The id for a list instance
     */
    private $list_id;

    /**
     * The url component for this endpoint
     */
    const URL_COMPONENT = '/lists/';

    public function __construct(MailchimpRequest $request, MailchimpSettings $settings, $list_id = null)
    {
        parent::__construct($request, $settings);
        $request->appendToEndpoint(self::URL_COMPONENT . $list_id);
        $this->list_id = $list_id;
    }

    /**
     * @param array $members
     * @param bool $update_existing
     * @return \MailchimpAPI\Responses\MailchimpResponse
     * @throws \MailchimpAPI\MailchimpException
     */
    public function batchSubscribe($members = [], $update_existing = false)
    {

        $this->throwIfNot("id", $this->subclass_resource);
        $params = [
            'members' => $members,
            'update_existing' => $update_existing
        ];

        return $this->postToActionEndpoint('', $params);
    }

    //SUBCLASS FUNCTIONS ------------------------------------------------------------

    public function webhooks($webhook_id = null)
    {
        return new Webhooks(
            $this->getRequest(),
            $this->getSettings(),
            $webhook_id
        );
    }

    public function signupForms($form_id = null)
    {
        return new SignupForms(
            $this->getRequest(),
            $this->getSettings(),
            $form_id
        );
    }

    public function mergeFields($merge_field_id = null)
    {
        return new MergeFields(
            $this->getRequest(),
            $this->getSettings(),
            $merge_field_id
        );
    }

    public function growthHistory($month = null)
    {
        return new GrowthHistory(
            $this->getRequest(),
            $this->getSettings(),
            $month
        );
    }


    public function clients()
    {
        return new Clients(
            $this->getRequest(),
            $this->getSettings()
        );
    }

    public function activity()
    {
        return new Lists\Activity(
            $this->getRequest(),
            $this->getSettings()
        );
    }

    public function abuseReports($report_id = null)
    {
        return new AbuseReports(
            $this->getRequest(),
            $this->getSettings(),
            $report_id
        );
    }

    public function segments($segment_id = null)
    {
        return new Segments(
            $this->getRequest(),
            $this->getSettings(),
            $segment_id
        );
    }

    public function members($member = null)
    {
        return new Lists\Members(
            $this->getRequest(),
            $this->getSettings(),
            $member
        );
    }

    public function interestCategories($interest_category_id = null)
    {
        return new InterestCategories(
            $this->getRequest(),
            $this->getSettings(),
            $interest_category_id
        );
    }
}
