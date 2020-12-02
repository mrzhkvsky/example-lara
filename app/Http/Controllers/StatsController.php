<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Repositories\Interfaces\BidStatsRepository;
use App\Repositories\Interfaces\UserRepository;
use Symfony\Component\HttpFoundation\JsonResponse;

class StatsController extends Controller
{
    public function getBidsStats(UserRepository $userRepository, BidStatsRepository $bidStatsRepository, int $id): JsonResponse
    {
        $user = $userRepository->getUserById($id);

        return new JsonResponse(['count' => $bidStatsRepository->getCountOpenBidsForUser($user)]);
    }
}
