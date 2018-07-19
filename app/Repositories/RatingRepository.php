<?php
/**
 * Created by PhpStorm.
 * User: Harrison
 * Date: 7/17/2018
 * Time: 3:26 PM
 */

namespace App\Repositories;

use App\Models\Rating;


class RatingRepository extends AbstractRepository{

    protected $model;

    public function __construct(Rating $rating)
    {
        $this->model = $rating;
    }
}