<?php
declare(strict_types=1);

namespace App\Dto;

class CreateBidAddressDto
{
    public string $street;
    public string $houseNumber;

    /**
     * @param string $street
     * @param string $houseNumber
     */
    public function __construct(string $street, string $houseNumber)
    {
        $this->street = $street;
        $this->houseNumber = $houseNumber;
    }
}
