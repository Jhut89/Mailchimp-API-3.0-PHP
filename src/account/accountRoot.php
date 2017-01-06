<?php

class Mailchimp_Account extends Mailchimp
{

    public function GET()
    {
        $url = $this->url . "/";
        $response = $this->curlGet($url);
        return $response;
    }
    
}
