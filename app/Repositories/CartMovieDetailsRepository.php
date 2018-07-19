<?php
/**
 * Created by PhpStorm.
 * User: Harrison
 * Date: 03/12/2017
 * Time: 20:01
 */

namespace App\Repositories;


use App\Models\CartMovieDetails;

class CartMovieDetailsRepository extends AbstractRepository{

    protected $model;

    public function __construct(CartMovieDetails $details)
    {
        $this->model = $details;
    }
}