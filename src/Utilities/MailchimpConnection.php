<?php

namespace MailchimpAPI\Utilities;

/**
 * TODO should make over wire request
 */

use MailchimpAPI\MailchimpException;

/**
 * Class MailchimpConnection
 * @package MailchimpAPI\Utilities
 */
class MailchimpConnection implements HttpRequest
{

    /**
     * Custom user agent for this library
     */
    const USER_AGENT = 'jhut89/Mailchimp-API-3.0-PHP (https://github.com/Jhut89/Mailchimp-API-3.0-PHP)';

    /**
     * the url used to request an access token from mailchimp
     */
    const TOKEN_REQUEST_URL = 'https://login.mailchimp.com/oauth2/token';

    /**
     * the url used to request metadata about an access token
     */
    const OAUTH_METADATA_URL = 'https://login.mailchimp.com/oauth2/metadata/';

    /**
     * @var MailchimpRequest
     */
    private $current_request;

    /**
     * @var MailChimpSettings
     */
    private $current_settings;

    /**
     * raw response from mailchimp api
     * @var string
     */
    private $response;

    /**
     * response body
     * @var string
     */
    private $response_body;

    /**
     * an integer representation of the http response code
     * @var int
     */
    private $http_code;

    /**
     * the parsed response headers from the request
     * @var array
     */
    private $headers = [];

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

        $this->handle = curl_init();

        $this->prepareHandle();
        $this->setHandlerOptionsForMethod();
    }

    /**
     * Prepares this connections handle for execution
     */
    private function prepareHandle()
    {
        // set the URL for this request
        $this->setOption(CURLOPT_URL, $this->current_request->getUrl());

        // set headers to be sent
        $this->setOption(CURLOPT_HTTPHEADER, $this->current_request->getHeaders());

        // set custom user-agent
        $this->setOption(CURLOPT_USERAGENT, self::USER_AGENT);

        // make response returnable
        $this->setOption(CURLOPT_RETURNTRANSFER, true);

        // get headers in return
        $this->setOption(CURLOPT_HEADER, true);

        // set verify ssl
        $this->setOption(CURLOPT_SSL_VERIFYPEER, $this->current_settings->shouldVerifySsl());

        // set the callback to run against each of the response headers
        $this->setOption(CURLOPT_HEADERFUNCTION, [&$this, "parseResponseHeader"]);
    }

    /**
     * Prepares the handler for a request based on the requests method
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
                    ->getPayload());
                break;
            case MailchimpRequest::PUT:
            case MailchimpRequest::PATCH:
                $this->setOption(CURLOPT_CUSTOMREQUEST, $method);
                $this->setOption(CURLOPT_POSTFIELDS, $this
                    ->current_request
                    ->getPayload());
                break;
            case MailchimpRequest::DELETE:
                $this->setOption(CURLOPT_CUSTOMREQUEST, $method);
                break;
        }
    }

    /**
     * @throws MailchimpException
     * @return MailchimpResponse
     */
    public function execute()
    {
        $this->response = $this->executeCurl();
        if (!$this->response) {
            throw new MailchimpException("The curl request failed");
        }

        $this->http_code = $this->getInfo(CURLINFO_HTTP_CODE);
        $head_len  = $this->getInfo(CURLINFO_HEADER_SIZE);
        $this->response_body = substr(
            $this->response,
            $head_len,
            strlen($this->response)
        );

        return new MailchimpResponse(
            $this->headers,
            $this->response_body,
            $this->http_code
        );
    }

    /**
     * Gets the currently set curl option by key
     * @param $key
     * @return mixed
     */
    public function getCurrentOption($key)
    {
        return $this->current_options[$key];
    }

    /**
     * Bulk set curl options
     * Update current settings
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
     * Sets a curl option on the handler
     * Updates the current settings array with ne setting
     * @param $name
     * @param $value
     * @return mixed|void
     */
    public function setOption($name, $value)
    {
        curl_setopt($this->handle, $name, $value);
        $this->current_options[$name] = $value;
    }

    /**
     * @return mixed
     */
    public function executeCurl()
    {
        return curl_exec($this->handle);
    }

    /**
     * @param $name
     * @return mixed
     */
    public function getInfo($name)
    {
        return curl_getinfo($this->handle, $name);
    }

    /**
     * @return mixed|void
     */
    public function close()
    {
        curl_close($this->handle);
    }

    /**
     * Called statically during prepareHandle();
     *
     * @param $handle
     * @param $header
     * @return int
     */
    private function parseResponseHeader($handle, $header)
    {
        $header_length = strlen($header);
        $header_array = explode(':', $header, 2);
        if (count($header_array) == 2) {
            $this->pushToHeaders($header_array);
        }

        var_dump($header);
        return $header_length;
    }

    /**
     * @param array $header
     */
    private function pushToHeaders($header)
    {
        $this->headers[$header[0]] = trim($header[1]);
    }
}
