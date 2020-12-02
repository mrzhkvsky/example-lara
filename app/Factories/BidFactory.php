<?php
declare(strict_types=1);

namespace App\Factories;

use App\Dto\CreateBidDto;
use App\Models\Bid;
use App\Models\BidAddress;

class BidFactory
{
    public function create(CreateBidDto $dto, BidAddress $bidAddress): Bid
    {
        $bid = new Bid();
        $bid->default(
            $dto->title,
            $dto->description,
            $bidAddress
        );

        return $bid;
    }
}
