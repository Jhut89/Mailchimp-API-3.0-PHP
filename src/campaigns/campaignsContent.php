<?php

class Campaigns_Content extends Campaigns
{

    function __construct($apikey, $parent_input)
    {
        parent::__construct($apikey, $parent_input);
        $this->url .= '/content/';
    }

    public function GET_campaign_content()
    {
        $url = $this->url;
        $response = $this->curlGet($url);

        return $response;
    }

    //content_type can be any of ['plain_text', 'html', 'url', 'template', 'archive', 'variate_contents']
    public function PUT($content_type, $content)
    {
        $payload = array($content_type => $content);
        $url = $this->url;
        $response = $this->curlPut($url, $payload);

        return $response;
    }

}