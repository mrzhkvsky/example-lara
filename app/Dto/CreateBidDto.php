<?php
declare(strict_types=1);

namespace App\Dto;

class CreateBidDto
{
    public string $title;
    public string $description;
    public CreateBidAddressDto $address;

    /**
     * @param string $title
     * @param string $description
     * @param \App\Dto\CreateBidAddressDto $address
     */
    public function __construct(string $title, string $description, CreateBidAddressDto $address)
    {
        $this->title = $title;
        $this->description = $description;
        $this->address = $address;
    }


}
