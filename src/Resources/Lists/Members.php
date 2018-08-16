<?php

namespace MailchimpAPI\Resources\Lists;


use MailchimpAPI\Requests\MailchimpRequest;
use MailchimpAPI\Resources\Lists\Members\Notes;
use MailchimpAPI\Resources\Lists\Members\Goals;
use MailchimpAPI\Resources\ApiResource;
use MailchimpAPI\Settings\MailchimpSettings;

class Members extends ApiResource
{
    /**
     * the url component for this endpoint
     */
    const URL_COMPONENT = '/members/';

    public function __construct(MailchimpRequest $request, MailchimpSettings $settings, $member)
    {
        parent::__construct($request, $settings);
        if ($member && strpos($member, "@")) {
            $member = md5(strtolower($member));
        }
        $request->appendToEndpoint(self::URL_COMPONENT . $member);
    }

    //SUBCLASS FUNCTIONS ------------------------------------------------------------

    public function notes($note_id = null)
    {
        return new Notes(
            $this->getRequest(),
            $this->getSettings(),
            $note_id
        );
    }
    
    public function goals()
    {
        return new Goals(
            $this->getRequest(),
            $this->getSettings()
        );
    }
    
    public function activity()
    {
        return new Members\Activity(
            $this->getRequest(),
            $this->getSettings()
        );
    }
}
