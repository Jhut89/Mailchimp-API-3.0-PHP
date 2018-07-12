<?php

namespace MailchimpAPI;

use MailchimpAPI\EcommerceStores\Carts;
use MailchimpAPI\EcommerceStores\Customers;
use MailchimpAPI\EcommerceStores\Orders;
use MailchimpAPI\EcommerceStores\Products;
use MailchimpAPI\EcommerceStores\PromoRules;

/**
 * Class EcommerceStores
 * @package MailchimpAPI
 */
class EcommerceStores extends Mailchimp
{

    /**
     * @var
     */
    protected $subclass_resource;

    /**
     * @var array
     */
    public $req_post_params = [
        'id',
        'list_id',
        'name',
        'currency_code'
    ];

    /**
     * @var Customers
     */
    private $customers;
    /**
     * @var Products
     */
    private $products;
    /**
     * @var Orders
     */
    private $orders;
    /**
     * @var Carts
     */
    private $carts;
    /**
     * @var PromoRules
     */
    private $promor_rules;

    /**
     * the url component for this endpoint
     */
    const URL_COMPONENT = '/ecommerce/stores/';

    /**
     * EcommerceStores constructor.
     * @param $apikey
     * @param $class_input
     * @throws MailchimpException
     */
    public function __construct($apikey, $class_input)
    {
        parent::__construct($apikey);

        if ($class_input) {
            $this->request->appendToEndpoint(self::URL_COMPONENT . $class_input);
        } else {
            $this->request->appendToEndpoint(self::URL_COMPONENT);
        }
        
        $this->subclass_resource = $class_input;
    }

    //SUBCLASS FUNCTIONS ------------------------------------------------------------

    /**
     * @param null $class_input
     * @return Customers
     * @throws MailchimpException
     */
    public function customers($class_input = null)
    {
        $this->customers = new Customers(
            $this->apikey,
            $this->subclass_resource,
            $class_input
        );
        return $this->customers;
    }

    /**
     * @param null $class_input
     * @return Products
     * @throws MailchimpException
     */
    public function products($class_input = null)
    {
        $this->products = new Products(
            $this->apikey,
            $this->subclass_resource,
            $class_input
        );
        return $this->products;
    }

    /**
     * @param null $class_input
     * @return Orders
     * @throws MailchimpException
     */
    public function orders($class_input = null)
    {
        $this->orders = new Orders(
            $this->apikey,
            $this->subclass_resource,
            $class_input
        );
        return $this->orders;
    }

    /**
     * @param null $class_input
     * @return Carts
     * @throws MailchimpException
     */
    public function carts($class_input = null)
    {
        $this->carts = new Carts(
            $this->apikey,
            $this->subclass_resource,
            $class_input
        );
        return $this->carts;
    }

    /**
     * @param null $class_input
     * @return PromoRules
     * @throws MailchimpException
     */
    public function promoRules($class_input = null)
    {

        $this->promor_rules = new PromoRules(
            $this->apikey,
            $this->subclass_resource,
            $class_input
        );
        return $this->promor_rules;
    }
}
