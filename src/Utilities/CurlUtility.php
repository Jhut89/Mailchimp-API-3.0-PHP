<?php

namespace Mailchimp_API\Utilities;

use Mailchimp_API\Utilities;

class CurlUtility
{
    /**
     * @param MailchimpRequest $request
     * @param MailChimpSettings $settings
     *
     * @return void
     */
    public static function makeRequest(MailchimpRequest $request, MailChimpSettings $settings)
    {
        $payload = false;

        // set curl url
        $ch = curl_init($request->getUrl());

        // set header to be sent
        curl_setopt($ch, CURLOPT_HTTPHEADER, $request->getHeaders());

        // set custom user-agent
        curl_setopt($ch, CURLOPT_USERAGENT, Utilities::USER_AGENT);

        // make response returnable
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // set should return headers
        curl_setopt($ch, CURLOPT_HEADER, $settings->isReturnHeaders());

        // set verify ssl
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, $settings->isVerifySsl());

        // if post set method and set payload to true
        if ($request->getMethod() === MailchimpRequest::POST) {
            curl_setopt($ch, CURLOPT_POST, true);
            $payload = true;
        }

        // if method is PUT or PATCH set custom request method
        // and set payload to true
        if (in_array($request->getMethod(), [MailchimpRequest::PUT, MailchimpRequest::PATCH])) {
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $request->getMethod());
            $payload = true;
        }

        // if method is DELETE set custom request method
        if ($request->getMethod() === MailchimpRequest::DELETE) {
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $request->getMethod());
        }

        // if payload import serialized request payload to curl body
        if ($payload) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, $request->getPayload());
        }

        // exec the request and set MailchimpRequest response to return value
        $request->setResponse(curl_exec($ch));

        // set MailChimpRequest response code
        $request->setHttpCode(curl_getinfo($ch, CURLINFO_HTTP_CODE));
    }
}