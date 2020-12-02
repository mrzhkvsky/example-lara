<?php

namespace App\Repositories\Interfaces;

use App\Models\Bid;

interface BidRepository
{
    /**
     * Get bid model by Id
     *
     * @param int $id
     *
     * @return \App\Models\Bid
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function getBidById(int $id): Bid;
}
