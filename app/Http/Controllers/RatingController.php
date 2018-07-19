<?php

namespace App\Http\Controllers;

use App\Services\RatingService;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    private $service;

    public function __construct(RatingService $service)
    {
        $this->service = $service;
    }

    public function create(Request $request)
    {
        return $this->service->create($request);
    }
}
