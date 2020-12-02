<?php
declare(strict_types=1);

namespace App\Factories;

use App\Dto\CreateBidAddressDto;
use App\Models\BidAddress;

class BidAddressFactory
{
    public function create(CreateBidAddressDto $dto): BidAddress
    {
        $bidAddress =  new BidAddress();
        $bidAddress->default(
            $dto->street,
            $dto->houseNumber
        );

        return $bidAddress;
    }
}
