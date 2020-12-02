<?php
declare(strict_types=1);

namespace App\Repositories\Interfaces;

use App\Models\User;

interface BidStatsRepository
{
    public function getCountOpenBidsForUser(User $user): int;
}
