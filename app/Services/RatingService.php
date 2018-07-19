<?php
/**
 * Created by PhpStorm.
 * User: Harrison
 * Date: 7/17/2018
 * Time: 3:28 PM
 */

namespace App\Services;

use App\Repositories\RatingRepository;
use Illuminate\Http\Request;


class RatingService
{

    private $repository;

    public function __construct(RatingRepository $repository)
    {
        $this->repository = $repository;
    }

    public function create(Request $request)
    {
        $rating = [
            'user_id' => $request->user()->id,
            'movie_id' => $request->movieId,
            'rating' => $request->rating
        ];
//        if($this->repository->findOneByParam('user_id', $request->user()->id) != null) {
//            return response()->json('you have already rated this movie. ~\-_-/~');
//        }
        return $this->repository->save($rating);
    }
}