<?php
declare(strict_types=1);

namespace App\Services;

use App\Dto\CreateBidDto;
use App\Events\BidCreatedEvent;
use App\Factories\BidAddressFactory;
use App\Factories\BidFactory;
use App\Repositories\Interfaces\BidRepository;
use Illuminate\Support\Facades\DB;

class BidService
{
    private BidRepository $bidRepository;
    private BidFactory $bidFactory;
    private BidAddressFactory $bidAddressFactory;

    /**
     * @param \App\Repositories\Interfaces\BidRepository $bidRepository
     * @param \App\Factories\BidFactory $bidFactory
     * @param \App\Factories\BidAddressFactory $bidAddressFactory
     */
    public function __construct(BidRepository $bidRepository, BidFactory $bidFactory, BidAddressFactory $bidAddressFactory)
    {
        $this->bidRepository = $bidRepository;
        $this->bidFactory = $bidFactory;
        $this->bidAddressFactory = $bidAddressFactory;
    }

    public function create(CreateBidDto $dto): void
    {
        DB::beginTransaction();

        try {
            $bidAddress = $this->bidAddressFactory->create($dto->address);
            $bidAddress->saveOrFail();

            $bid = $this->bidFactory->create($dto, $bidAddress);
            $bid->saveOrFail();

            DB::commit();
        } catch (\Throwable $e) {
            DB::rollBack();

            throw $e;
        }

        event(new BidCreatedEvent($bid));
    }
}
