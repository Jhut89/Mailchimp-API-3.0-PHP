<?php

namespace Mailchimp_API;

use Mailchimp_API\Automations\Emails\Emails;
use Mailchimp_API\Automations\Removed_Subscribers;

class Automations extends Mailchimp
{
    public $subclass_resource;

    //SUBCLASS INSTANTIATIONS
    public $removed_subs;
    public $emails;

    function __construct($apikey, $class_input = null)
    {
        parent::__construct($apikey);
        if (isset($class_input)) {
            $this->url .=  '/automations/' . $class_input;
        } else {
            $this->url .= '/automations/';
        }
        $this->subclass_resource = $class_input;
    }

    public function PAUSE_ALL()
    {
        $params = array();

        $payload = json_encode($params);
        $url = $this->url . '/actions/pause-all-emails/';

        $response = $this->curlPost($url, $payload);

        return $response;
    }

    public function START_ALL()
    {
        $params = array();

        $payload = json_encode($params);
        $url = $this->url . '/actions/start-all-emails/';

        $response = $this->curlPost($url, $payload);

        return $response;
    }

    //SUBCLASS FUNCTIONS ------------------------------------------------------------

    public function removedSubscribers()
    {
        $this->removed_subs = new Removed_Subscribers(
            $this->apikey,
            $this->subclass_resource
        );
        return $this->removed_subs;
    }

    public function emails( $class_input = null )
    {
        $this->emails = new Emails(
            $this->apikey,
            $this->subclass_resource,
            $class_input
        );
        return $this->emails;
    }

}