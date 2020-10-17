<?php

namespace Forex4you\Application\DTO;

use Forex4you\Domain\Model\ShippingAddress;

class AddressDto
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

    /**
     * AddressDto constructor.
     * @param string $country
     * @param string $city
     * @param string $zipcode
     * @param string $street
     */
    public function __construct(string $country, string $city, string $zipcode, string $street)
    {
        $this->country = $country;
        $this->city = $city;
        $this->zipcode = $zipcode;
        $this->street = $street;
    }

    /**
     * @param ShippingAddress $shippingAddress
     * @return AddressDto
     */
    public static function createFromShippingAddress(ShippingAddress $shippingAddress)
    {
        return new self(
            $shippingAddress->getCountry(),
            $shippingAddress->getCity(),
            $shippingAddress->getZipcode(),
            $shippingAddress->getStreet()
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