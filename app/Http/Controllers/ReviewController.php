<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ReviewService;

class ReviewController extends Controller
{

    private $service;

    public function __construct(ReviewService $service)
    {
        $this->service = $service;
    }

    public function create(Request $request)
    {
        return $this->service->create($request);
    }
}
