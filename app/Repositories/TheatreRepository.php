<?php
/**
 * Created by PhpStorm.
 * User: Harrison
 * Date: 7/18/2018
 * Time: 3:09 PM
 */

namespace App\Repositories;


use App\Models\Theatre;

class TheatreRepository extends AbstractRepository{

    protected $model;

    public function __construct(Theatre $theatre)
    {
        $this->model = $theatre;
    }

    public function getDistinctLocations()
    {
        return $this->model->distinct()->get(['location']);
    }
}