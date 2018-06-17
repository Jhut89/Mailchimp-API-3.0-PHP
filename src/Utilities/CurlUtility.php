<?php

namespace Mailchimp_API\Utilities;


trait CurlUtility
{
    public static function makeRequest(MailChimpSettings $settings, MailchimpRequest $request)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ;
    }


    public function curlGet($url)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->auth);
        curl_setopt($ch, CURLOPT_USERAGENT, Utilities::USER_AGENT);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, self::HEADERS);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, self::VERIFY_SSL);
        $this->response = curl_exec($ch);
        $this->http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        return self::finalizeRequest($this->response);
    }

    public function curlPost($url, $payload)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->auth);
        curl_setopt($ch, CURLOPT_USERAGENT, Utilities::USER_AGENT);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, self::VERIFY_SSL);
        curl_setopt($ch, CURLOPT_HEADER, self::HEADERS);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        $this->response = curl_exec($ch);
        $this->http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        return self::finalizeRequest($this->response);
    }

    public function curlPatch($url, $payload)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->auth);
        curl_setopt($ch, CURLOPT_USERAGENT, Utilities::USER_AGENT);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, self::VERIFY_SSL);
        curl_setopt($ch, CURLOPT_HEADER, self::HEADERS);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PATCH");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        $this->response = curl_exec($ch);
        $this->http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        return self::finalizeRequest($this->response);
    }

    public function curlDelete($url)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->auth);
        curl_setopt($ch, CURLOPT_USERAGENT, Utilities::USER_AGENT);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, self::VERIFY_SSL);
        curl_setopt($ch, CURLOPT_HEADER, self::HEADERS);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        $this->response = curl_exec($ch);
        $this->http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        return self::finalizeRequest($this->response);
    }

    public function curlPut($url, $payload)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->auth);
        curl_setopt($ch, CURLOPT_USERAGENT, Utilities::USER_AGENT);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, self::VERIFY_SSL);
        curl_setopt($ch, CURLOPT_HEADER, self::HEADERS);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        $this->response = curl_exec($ch);
        $this->http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        return self::finalizeRequest($this->response);
    }

}