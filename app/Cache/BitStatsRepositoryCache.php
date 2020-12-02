<?php
declare(strict_types=1);

namespace App\Cache;

use App\Models\User;
use App\Repositories\EloquentBidStatsRepository;
use App\Repositories\Interfaces\BidStatsRepository;
use Illuminate\Support\Facades\Cache;

class BitStatsRepositoryCache implements BidStatsRepository
{
    private EloquentBidStatsRepository $bidStatsRepository;

    public function __construct(EloquentBidStatsRepository $bidStatsRepository)
    {
        $this->bidStatsRepository = $bidStatsRepository;
    }

    public function getCountOpenBidsForUser(User $user): int
    {
        return Cache::remember('count_open_bids:user:' . $user->id, now()->addDay(), function () use ($user) {
            return $this->bidStatsRepository->getCountOpenBidsForUser($user);
        });
    }
}
