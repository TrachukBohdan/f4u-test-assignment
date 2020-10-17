<?php

namespace Forex4you\Domain\Model;

/**
 * Class ShippingAddress
 * @package Forex4you\Domain
 */
class ShippingAddress
{
    /**
     * @var string
     */
    private $country;

    /**
     * @var string
     */
    private $city;

    /**
     * @var string
     */
    private $zipcode;

    /**
     * @var string
     */
    private $street;

    private function __construct(){}

    /**
     * @param string $country
     * @param string $city
     * @param string $zipcode
     * @param string $street
     * @return ShippingAddress
     */
    public static function createFromAddress(
        string $country,
        string $city,
        string $zipcode,
        string $street
    ): ShippingAddress {

        $shippingAddress = new ShippingAddress();

        $shippingAddress->country = $country;
        $shippingAddress->city = $city;
        $shippingAddress->zipcode = $zipcode;
        $shippingAddress->street = $street;

        return $shippingAddress;
    }

    /**
     * @param ShippingAddress $shippingAddress
     * @return bool
     */
    public function isEqual(ShippingAddress $shippingAddress): bool
    {
        return (
            $this->country === $shippingAddress->getCountry()
            && $this->city === $shippingAddress->getCity()
            && $this->zipcode === $shippingAddress->getZipcode()
            && $this->street === $shippingAddress->getStreet()
        );
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @return string
     */
    public function getZipcode(): string
    {
        return $this->zipcode;
    }

    /**
     * @return string
     */
    public function getStreet(): string
    {
        return $this->street;
    }

}