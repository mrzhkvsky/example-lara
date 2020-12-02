<?php
declare(strict_types=1);

namespace App\Repositories;

use App\Enum\BidStatusEnum;
use App\Models\User;
use App\Repositories\Interfaces\BidStatsRepository;
use Illuminate\Support\Facades\DB;

class EloquentBidStatsRepository implements BidStatsRepository
{

    public function getCountOpenBidsForUser(User $user): int
    {
        return Db::table('bids', 'b')
            ->leftJoin('user_id_bid_id as uibi', 'b.id', '=', 'uibi.bid_id')
            ->leftJoin('users as u', 'uibi.bid_id', '=', 'u.id')
            ->where('status', '=', BidStatusEnum::OPEN()->getKey())
            ->count();
    }
}
