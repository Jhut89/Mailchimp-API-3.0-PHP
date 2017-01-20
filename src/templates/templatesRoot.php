<?php

class Templates extends Mailchimp
{

    public $subclass_resource;

    //REQUIRED FIELDS DEFINITIONS
    public $req_post_prarams = [
        'name',
        'html'
    ];
    public $req_patch_prarams = [
        'name',
        'html'
    ];

    //SUBCLASS INSTANTIATIONS
    public $default_content;

    function __construct($apikey, $class_input)
    {
        parent::__construct($apikey);

        if (isset($class_input)) {
            $this->url .= '/templates/' . $class_input;
        } else {
            $this->url .= '/templates/';
        }
      
        $this->subclass_resource = $class_input;
    }

    //SUBCLASS FUNCTIONS ------------------------------------------------------------

    public function defaultContent( $class_input = null )
    {
        $this->default_content = new Templates_Default_Content(
            $this->apikey,
            $this->subclass_resource,
            $class_input
        );
        return $this->default_content;
    }

}