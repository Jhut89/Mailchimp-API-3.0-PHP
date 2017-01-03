<?php

class reports extends mailchimp {

    public $subclass_resource;

    #SUBCLASs INSTANTIATIONS
    public $unsubscribes;
    public $sub_reports;
    public $sent_to;
    public $locations;
    public $email_activity;
    public $eepurl;
    public $domain_performance;
    public $advice;
    public $abuse;
    public $click_reports;


    function __construct($apikey, $class_input)
  {
      parent::__construct($apikey);

      if (isset($class_input))
      {
          $this->url .= '/reports/' . $class_input;;
      } else
      {
          $this->url .= '/reports/';
      }
      
      $this->subclass_resource = $class_input;
  }

	public function GET( $query_params = null )
    {
        $query_string = '';

        if (is_array($query_params)) 
        {
            $query_string = $this->construct_query_params($query_params);
        }

        $url = $this->url . $query_string;
        $response = $this->curl_get($url);

        return $response;
    }

    //SUBCLASS FUNCTIONS ------------------------------------------------------------

    public function unsubscribes( $class_input = null )
    {
        $this->unsubscibres = new reports_unsubscribes($this->apikey, $this->subclass_resource, $class_input);
        return $this->unsubscibres;
    }

    public function sub_reports( $class_input = null )
    {
        $this->sub_reports = new reports_sub_reports($this->apikey, $this->subclass_resource, $class_input);
        return $this->sub_reports;
    }

    public function sent_to( $class_input = null )
    {
        $this->sent_to = new reports_sent_to($this->apikey, $this->subclass_resource, $class_input);
        return $this->sent_to;
    }

    public function locations( $class_input = null )
    {
        $this->locations = new reports_top_locations($this->apikey, $this->subclass_resource, $class_input);
        return $this->locations;
    }

    public function email_activity( $class_input = null )
    {
        $this->email_activity = new reports_email_activity($this->apikey, $this->subclass_resource, $class_input);
        return $this->email_activity;
    }

    public function eepurl( $class_input = null )
    {
      $this->eepurl = new reports_eepurl_reoprts($this->apikey, $this->subclass_resource, $class_input);
      return $this->eepurl;
    }

    public function domain_performance( $class_input = null )
    {
      $this->domain_performance = new reports_domain_performance($this->apikey, $this->subclass_resource, $class_input);
      return $this->domain_performance;
    }

    public function advice( $class_input = null )
    {
      $this->advice = new reports_campaign_advice($this->apikey, $this->subclass_resource, $class_input);
      return $this->advice;
    }

    public function abuse( $class_input = null )
    {
      $this->abuse = new reports_campaign_abuse($this->apikey, $this->subclass_resource, $class_input);
      return $this->abuse;
    }

    public function click_reports( $class_input = null )
    {
      $this->click_reports = new reports_click_reports($this->apikey, $this->subclass_resource, $class_input);
      return $this->click_reports;
    }

}