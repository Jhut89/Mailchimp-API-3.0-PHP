<?php

namespace MailchimpAPI;

use MailchimpAPI\Templates\DefaultContent;

/**
 * Class Templates
 * @package MailchimpAPI
 */
class Templates extends Mailchimp
{

    /**
     * @var string
     */
    protected $subclass_resource;

    /**
     * @var array
     */
    public $req_post_params = [
        'name',
        'html'
    ];
    /**
     * @var array
     */
    public $req_patch_params = [
        'name',
        'html'
    ];

    /**
     * @var DefaultContent
     */
    private $default_content;

    const URL_COMPONENT = '/templates/';

    /**
     * Templates constructor.
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
     * @return DefaultContent
     * @throws MailchimpException
     */
    public function defaultContent($class_input = null)
    {
        $this->default_content = new DefaultContent(
            $this->apikey,
            $this->subclass_resource,
            $class_input
        );
        return $this->default_content;
    }
}
