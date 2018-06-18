<?php

namespace Mailchimp_API;

use Mailchimp_API\Lists\Abuse_Reports;
use Mailchimp_API\Lists\Activity;
use Mailchimp_API\Lists\Clients;
use Mailchimp_API\Lists\Growth_History;
use Mailchimp_API\Lists\Interest_Categories;
use Mailchimp_API\Lists\Members;
use Mailchimp_API\Lists\Merge_Fields;
use Mailchimp_API\Lists\Segments;
use Mailchimp_API\Lists\Signup_Forms;
use Mailchimp_API\Lists\Webhooks;

class Lists extends Mailchimp
{

    public $subclass_resource;

    //REQUIRED FIELDS DEFINITIONS
    public $req_post_params = [
        'name',
        'contact',
        'permission_reminder',
        'campaign_defaults',
        'email_type_option'
    ];
    public $req_patch_params = [
        'name',
        'contact',
        'permission_reminder',
        'campaign_defaults',
        'email_type_option'
    ];

    //SUBCLASS INSTANTIATIONS
    public $webhooks;
    public $signup_forms;
    public $merge_fields;
    public $growth_history;
    public $clients;
    public $activity;
    public $abuse;
    public $segments;
    public $members;
    public $interest_categories;


    function __construct($apikey, $class_input)
    {
        parent::__construct($apikey);

        if ($class_input) {
            $this->url .= '/lists/' . $class_input;
        } else {
            $this->url .= '/lists/';
        }
        $this->subclass_resource = $class_input;

    }

    public function BATCH_SUB($members = array(), $update_existing)
    {

        $params = array(
            'members' => $members,
            'update_existing' => $update_existing
        );
        $payload = json_encode($params);

        $url = $this->url;

        $response = $this->curlPost($url, $payload);

        return $response;

    }

    //SUBCLASS FUNCTIONS ------------------------------------------------------------

    public function webhooks( $class_input = null )
    {
        $this->webhooks = new Webhooks(
            $this->apikey,
            $this->subclass_resource,
            $class_input
        );
        return $this->webhooks;
    }

    public function signupForms( $class_input = null )
    {
        $this->signup_forms = new Signup_Forms(
            $this->apikey,
            $this->subclass_resource,
            $class_input
        );
        return $this->signup_forms;
    }

    public function mergeFields( $class_input = null )
    {
        $this->merge_fields = new Merge_Fields(
            $this->apikey,
            $this->subclass_resource,
            $class_input
        );
        return $this->merge_fields;
    }

    public function growthHistory( $class_input = null )
    {
        $this->growth_history = new Growth_History(
            $this->apikey,
            $this->subclass_resource,
            $class_input
        );
        return $this->growth_history;
    }

    public function clients( $class_input = null )
    {
        $this->clients = new Clients(
            $this->apikey,
            $this->subclass_resource,
            $class_input
        );
        return $this->clients;
    }

    public function activity( $class_input = null )
    {
        $this->activity = new Activity(
            $this->apikey,
            $this->subclass_resource,
            $class_input
        );
        return $this->activity;
    }

    public function abuseReports( $class_input = null )
    {
        $this->abuse = new Abuse_Reports(
            $this->apikey,
            $this->subclass_resource,
            $class_input
        );
        return $this->abuse;
    }

    public function segments( $class_input = null )
    {
        $this->segments =  new Segments(
            $this->apikey,
            $this->subclass_resource,
            $class_input
        );
        return $this->segments;
    }

    public function members( $class_input = null )
    {
        $this->members = new Members(
            $this->apikey,
            $this->subclass_resource,
            $class_input
        );
        return $this->members;
    }

    public function interestCategories( $class_input = null )
    {
        $this->interest_categories = new Interest_Categories(
            $this->apikey,
            $this->subclass_resource,
            $class_input
        );
        return $this->interest_categories;
    }

}