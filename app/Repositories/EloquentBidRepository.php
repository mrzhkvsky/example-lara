<?php
declare(strict_types=1);

namespace App\Repositories;

use App\Models\Bid;
use App\Models\User;
use App\Repositories\Interfaces\BidRepository;
use Illuminate\Database\Eloquent\Collection;

class EloquentBidRepository implements BidRepository
{
    public function getBidById(int $id): Bid
    {
        return Bid::whereId($id)->with('address')->firstOrFail();
    }
}
