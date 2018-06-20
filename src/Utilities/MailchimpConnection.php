<?php

namespace Mailchimp_API\Utilities;

use Mailchimp_API\Utilities;

/**
 * TODO should make over wire request
 */

class MailchimpConnection implements HttpRequest
{
    /**
     * @var MailchimpRequest
     */
    private $mc_request;

    /**
     * @var MailChimpSettings
     */
    private $mc_settings;

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
     * @param MailChimpSettings $settings
     */
    public function __construct(MailchimpRequest $request, MailChimpSettings $settings)
    {
        $this->mc_request = $request;
        $this->mc_settings = $settings;
        $this->handle = curl_init($request->getUrl());
    }

    public function prepareHandle()
    {
        // set headers to be sent
        $this->setOption(CURLOPT_HTTPHEADER, $this
            ->mc_request
            ->getHeaders()
        );

        // set custom user-agent
        $this->setOption(CURLOPT_USERAGENT, Utilities::USER_AGENT);

        // make response returnable
        $this->setOption(CURLOPT_RETURNTRANSFER, true);

        // get headers in return
        $this->setOption(CURLOPT_HEADER, true);

        // set verify ssl
        $this->setOption(CURLOPT_SSL_VERIFYPEER, $this
            ->mc_settings
            ->shouldVerifySsl()
        );

        // TODO handle headers with CURLOPT_HEADERFUNCTION

        $this->setHandlerOptionsForMethod();

    }

    /**
     * @return void
     */
    private function setHandlerOptionsForMethod()
    {
        $method = $this->mc_request->getMethod();

        switch ($method) {
            case MailchimpRequest::POST:
                $this->setOption(CURLOPT_POST, true);
                $this->setOption(CURLOPT_POSTFIELDS, $this
                    ->mc_request
                    ->getPayload()
                );
                break;
            case MailchimpRequest::PUT:
            case MailchimpRequest::PATCH:
                $this->setOption(CURLOPT_CUSTOMREQUEST, $method);
                $this->setOption(CURLOPT_POSTFIELDS, $this
                    ->mc_request
                    ->getPayload()
                );
                break;
            case MailchimpRequest::DELETE:
                $this->setOption(CURLOPT_CUSTOMREQUEST, $method);
                break;
        }
    }

    private function handleResponseHeader($handle, $header)
    {
        $header_length = strlen($header);
        $header_array = explode(':', $header, 2);
        if (count($header_array) == 2) {
            $this->mc_response->pushToHeaders($header_array);
        }

        return $header_length;
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
    public function execute() {
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