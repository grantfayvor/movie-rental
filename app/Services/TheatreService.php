<?php
/**
 * Created by PhpStorm.
 * User: Harrison
 * Date: 7/18/2018
 * Time: 3:11 PM
 */

namespace App\Services;


use App\Repositories\TheatreRepository;
use Illuminate\Http\Request;

class TheatreService {

    private $repository;

    public function __construct(TheatreRepository $repository)
    {
        $this->repository = $repository;
    }

    public function create(Request $request)
    {
        $theatre = [
            'name' => $request->name
        ];
        return $this->repository->save($theatre);
    }

    public function getAll()
    {
        return $this->repository->findAllUnPaged();
    }

    public function getDistinctLocations()
    {
        return $this->repository->getDistinctLocations();
    }
}