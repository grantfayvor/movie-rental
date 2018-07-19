<?php
/**
 * Created by PhpStorm.
 * User: Harrison
 * Date: 7/17/2018
 * Time: 3:28 PM
 */

namespace App\Services;

use App\Repositories\ReviewRepository;
use Illuminate\Http\Request;


class ReviewService
{

    private $repository;

    public function __construct(ReviewRepository $repository)
    {
        $this->repository = $repository;
    }

    public function create(Request $request)
    {
        $review = [
            'user_id' => $request->user()->id,
            'movie_id' => $request->movieId,
            'message' => $request->message
        ];
        return $this->repository->save($review);
    }
}