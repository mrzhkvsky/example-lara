<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\CreateBidRequest;
use App\Services\BidService;
use Illuminate\Http\JsonResponse;

class BidController extends Controller
{
    public function create(CreateBidRequest $request, BidService $bidService): JsonResponse
    {
        $bidService->create($request->toDto());

        return new JsonResponse([], JsonResponse::HTTP_CREATED);
    }
}
