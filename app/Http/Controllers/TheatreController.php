<?php

namespace App\Http\Controllers;

use App\Services\TheatreService;
use Illuminate\Http\Request;

class TheatreController extends Controller
{
    private $service;

    public function __construct(TheatreService $service)
    {
        $this->service = $service;
    }

    public function create(Request $request)
    {
        return $this->service->create($request);
    }

    public function getAll()
    {
        return $this->service->getAll();
    }

    public function getDistinctLocations()
    {
        return $this->service->getDistinctLocations();
    }
}
