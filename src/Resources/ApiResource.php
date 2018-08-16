<?php


namespace MailchimpAPI\Resources;


use MailchimpAPI\MailchimpException;
use MailchimpAPI\Requests\MailchimpConnection;
use MailchimpAPI\Requests\MailchimpRequest;
use MailchimpAPI\Responses\MailchimpResponse;
use MailchimpAPI\Settings\MailchimpSettings;

/**
 * Class ApiResource
 * @package MailchimpAPI\Resources
 */
abstract class ApiResource
{
    /**
     * @var MailchimpRequest
     */
    private $request;

    /**
     * @var MailchimpSettings
     */
    private $settings;

    /**
     * ApiResource constructor.
     * @param MailchimpRequest $request
     * @param MailchimpSettings|null $settings
     */
    public function __construct(MailchimpRequest $request, MailchimpSettings $settings = null)
    {
        $this->setRequest($request);
        $this->setSettings($settings);
    }

    /**
     * @return MailchimpRequest
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * @param mixed $request
     */
    public function setRequest($request)
    {
        $this->request = $request;
    }

    /**
     * @return mixed
     */
    public function getSettings()
    {
        return $this->settings;
    }

    /**
     * @param mixed $settings
     */
    public function setSettings($settings)
    {
        $this->settings = $settings;
    }

    /*************************************
     * BEGIN METHOD FUNCTIONS
     *************************************/

    /**
     * @param array $query_params
     * @return MailchimpResponse
     * @throws MailchimpException
     */
    public function get($query_params = [])
    {
        $this->request->setMethod(MailchimpRequest::GET);
        $this->request->setQueryString($query_params);

        $connection = $this->getConnection($this->request, $this->settings);
        $response = $connection->execute();
        $this->resetRequest();

        return $response;
    }


    /**
     * @param array $params
     * @return MailchimpResponse
     * @throws MailchimpException
     */
    public function post($params = [])
    {
        $this->request->setMethod(MailchimpRequest::POST);
        $this->request->setPayload($params);

        $connection = $this->getConnection($this->request, $this->settings);
        $response = $connection->execute();
        $this->resetRequest();

        return $response;
    }

    /**
     * @param array $params
     * @return MailchimpResponse
     * @throws MailchimpException
     */
    public function patch($params = [])
    {
        $this->request->setMethod(MailchimpRequest::PATCH);
        $this->request->setPayload($params);

        $connection = $this->getConnection($this->request, $this->settings);
        $response = $connection->execute();
        $this->resetRequest();

        return $response;
    }

    /**
     * @param array $params
     * @return MailchimpResponse
     * @throws MailchimpException
     */
    public function put($params = [])
    {
        $this->request->setMethod(MailchimpRequest::PUT);
        $this->request->setPayload($params);

        $connection = $this->getConnection($this->request, $this->settings);
        $response = $connection->execute();
        $this->resetRequest();

        return $response;
    }

    /**
     * @return MailchimpResponse
     * @throws MailchimpException
     */
    public function delete()
    {
        $this->request->setMethod(MailchimpRequest::DELETE);

        $connection = $this->getConnection($this->request, $this->settings);
        $response = $connection->execute();
        $this->resetRequest();

        return $response;
    }

    /*************************************
     * BEGIN HELPER METHODS
     *************************************/

    /**
     * @param MailchimpRequest $request
     * @param MailchimpSettings $settings
     * @return MailchimpConnection
     */
    protected function getConnection(MailchimpRequest $request, MailchimpSettings $settings)
    {
        $connection = new MailchimpConnection($request, $settings);
        return $connection;
    }

    /**
     * Resets the request with the same API Key
     * @throws MailchimpException
     */
    private function resetRequest()
    {
        $this->request->reset();
    }

    /**
     * @param string $type the type of check
     * @param mixed $check the variable under test
     * @throws MailchimpException
     */
    protected function throwIfNot($type, $check)
    {
        if (!$check) {
            switch ($type) {
                case "id":
                    throw new MailchimpException("You must provide an ID to " . debug_backtrace()[1]['function']);
                default:
                    throw new MailchimpException(
                        "An Exception was triggered in a check in " . debug_backtrace()[1]['function']
                    );
            }
        }
    }

    /**
     * @param $endpoint
     * @param array $params
     * @return MailchimpResponse
     * @throws MailchimpException
     */
    protected function postToActionEndpoint($endpoint, $params = [])
    {
        $this->request->appendToEndpoint($endpoint);
        $this->request->setMethod(MailchimpRequest::POST);
        if (!empty($params)) {
            $this->request->setPayload($params);
        }

        $connection = $this->getConnection($this->request, $this->settings);
        $response = $connection->execute();
        $this->resetRequest();
        return $response;
    }
}
