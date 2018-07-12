<?php


namespace MailchimpAPI\EcommerceStores;

use MailchimpAPI\EcommerceStores;

class PromoRules extends EcommerceStores
{

    /**
     * @var string
     */
    protected $grandchild_resource;

    /**
     * @var EcommerceStores\PromoRules\PromoCodes
     */
    private $promo_codes;

    /**
     * the url component for this endpoint
     */
    const URL_COMPONENT = '/promo-rules/';

    /**
     * Orders constructor.
     * @param $apikey
     * @param $parent_resource
     * @param $class_input
     * @throws \MailchimpAPI\MailchimpException
     */
    public function __construct($apikey, $parent_resource, $class_input)
    {
        parent::__construct($apikey, $parent_resource);
        if ($class_input) {
            $this->request->appendToEndpoint(self::URL_COMPONENT . $class_input);
        } else {
            $this->request->appendToEndpoint(self::URL_COMPONENT);
        }
        $this->grandchild_resource = $class_input;
    }

    //SUBCLASS FUNCTIONS ------------------------------------------------------------

    /**
     * @param null $class_input
     * @return EcommerceStores\PromoRules\PromoCodes
     * @throws \MailchimpAPI\MailchimpException
     */
    public function promoCodes($class_input = null)
    {
        $this->promo_codes = new EcommerceStores\PromoRules\PromoCodes(
            $this->apikey,
            $this->subclass_resource,
            $this->grandchild_resource,
            $class_input
        );
        return $this->promo_codes;
    }
}
