<?php

class mailchimp_account extends mailchimp {

	public function GET()
    {
        $url = $this->url . "/";
        $response = $this->curl_get($url);
        return $response;
    }
    
}