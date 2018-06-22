<?php

namespace Mailchimp_API\Utilities;

/**
 * TODO should make over wire request
 */

class MailchimpConnection implements HttpRequest
{

    /**
     * Custom user agent for this library
     */
    const USER_AGENT = 'jhut89/Mailchimp-API-3.0-PHP (https://github.com/Jhut89/Mailchimp-API-3.0-PHP)';
    const TOKEN_REQUEST_URL = 'https://login.mailchimp.com/oauth2/token';
    const OAUTH_METADATA_URL ='https://login.mailchimp.com/oauth2/metadata/';

    /**
     * @var MailchimpRequest
     */
    private $current_request;

    /**
     * @var MailChimpSettings
     */
    private $current_settings;

    /**
     * @var MailchimpResponse
     */
    private $mc_response;

    /**
     * @var resource
     */
    private $handle;

    /**
     * @var array
     */
    private $current_options = [];


    /**
     * MailchimpConnection constructor.
     * @param MailchimpRequest $request
     * @param MailchimpSettings|null $settings
     */
    public function __construct(MailchimpRequest &$request, MailchimpSettings &$settings = null)
    {
        $this->current_request = $request;

        $settings ?
            $this->current_settings = $settings :
            $this->current_settings = new MailchimpSettings();

        $this->handle = curl_init($this->current_request->getUrl());
        $this->prepareHandle();
        $this->setHandlerOptionsForMethod();
    }

    /**
     *
     */
    private function prepareHandle()
    {
        // set headers to be sent
        $this->setOption(CURLOPT_HTTPHEADER, $this
            ->current_request
            ->getHeaders()
        );

        // set custom user-agent
        $this->setOption(CURLOPT_USERAGENT, self::USER_AGENT);

        // make response returnable
        $this->setOption(CURLOPT_RETURNTRANSFER, true);

        // get headers in return
        $this->setOption(CURLOPT_HEADER, true);

        // set verify ssl
        $this->setOption(CURLOPT_SSL_VERIFYPEER, $this
            ->current_settings
            ->shouldVerifySsl()
        );

        $this->setOption(CURLOPT_HEADERFUNCTION, [&$this->mc_response, "handleResponseHeader"]);
    }

    /**
     * @return void
     */
    private function setHandlerOptionsForMethod()
    {
        $method = $this->current_request->getMethod();

        switch ($method) {
            case MailchimpRequest::POST:
                $this->setOption(CURLOPT_POST, true);
                $this->setOption(CURLOPT_POSTFIELDS, $this
                    ->current_request
                    ->getPayload()
                );
                break;
            case MailchimpRequest::PUT:
            case MailchimpRequest::PATCH:
                $this->setOption(CURLOPT_CUSTOMREQUEST, $method);
                $this->setOption(CURLOPT_POSTFIELDS, $this
                    ->current_request
                    ->getPayload()
                );
                break;
            case MailchimpRequest::DELETE:
                $this->setOption(CURLOPT_CUSTOMREQUEST, $method);
                break;
        }
    }

    /**
     * @return MailchimpResponse
     */
    public function execute()
    {
        $this->mc_response = new MailchimpResponse($this);
        $this->mc_response->parseRaw($this->executeCurl());
        return $this->mc_response;
    }

    /**
     * @return array
     */
    public function getCurrentOptions()
    {
        return $this->current_options;
    }

    /**
     * @param array $options
     */
    public function setCurrentOptions($options)
    {
        $this->current_options = [];
        foreach ($options as $option_name => $option_value) {
            $this->setOption($option_name, $option_value);
        }
    }

    /**
     * @param $name
     * @param $value
     * @return mixed|void
     */
    public function setOption($name, $value) {
        curl_setopt($this->handle, $name, $value);
        $this->current_options[$name] = $value;
    }

    /**
     * @return mixed
     */
    public function executeCurl() {
        return curl_exec($this->handle);
    }

    /**
     * @param $name
     * @return mixed
     */
    public function getInfo($name) {
        return curl_getinfo($this->handle, $name);
    }

    /**
     * @return mixed|void
     */
    public function close() {
        curl_close($this->handle);
    }
}