<?php

namespace App\Http\Controllers;

use App\AlphaVantage\Repository\RepositoryInterface;
use Illuminate\Http\JsonResponse;

final readonly class GetReportsController
{
    public function __construct(private RepositoryInterface $repository)
    {
    }

    public function __invoke(): JsonResponse
    {
        return response()->json($this->repository->fetchReports());
    }
}
