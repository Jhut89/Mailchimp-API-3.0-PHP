<?php

namespace MailchimpAPI\Lists;

use MailchimpAPI\Lists;

class GrowthHistory extends Lists
{
    public function __construct($apikey, $parent_resource, $class_input)
    {
        parent::__construct($apikey, $parent_resource);
        if ($class_input) {
            $this->request->appendToEndpoint('/growth-history/' . $class_input);
        } else {
            $this->request->appendToEndpoint('/growth-history/');
        }
    }
}
