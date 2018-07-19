<?php

namespace App\Http\Controllers;

use App\Services\CartService;
use App\Services\MovieService;
use Illuminate\Http\Request;

class MovieController extends Controller
{

    private $movieService;
    private $cartService;

    public function __construct(MovieService $movieService, CartService $cartService)
    {
        $this->movieService = $movieService;
        $this->cartService = $cartService;
    }

    public function saveMovie(Request $request)
    {
        $rules = [
            'name' => 'required',
            'brand' => 'required',
            'sellingPrice' => 'required',
            'categoryId' => 'required',
            'image' => 'required',
            'details' => 'required'
        ];
        $this->validate($request, $rules);
        $image = $request->file('image');
        $imageExtension = $image->getClientOriginalExtension();
        if($imageExtension === 'jpg' || $imageExtension === 'png'){
            if($this->movieService->save($request)){
                return redirect('/admin/view-movies');
            } else {
                return back()->withInput();
            }
        } else {
            return back()->withInput()->withErrors(['imageError' => 'please upload an image with either a jpg or png format']);
        }
    }

    public function updateMovie(Request $request)
    {
        $rules = [
            'id' => 'required',
            'name' => 'required',
            'brand' => 'required',
            'sellingPrice' => 'required',
            'categoryId' => 'required',
            'image' => 'required',
            'details' => 'required'
        ];
        $this->validate($request, $rules);
        $image = $request->file('image');
        $imageExtension = $image->getClientOriginalExtension();
        $id = $request->id;
        if($imageExtension === 'jpg' || $imageExtension === 'png') {
            if ($this->movieService->update($request, $id)) {
                return redirect('/admin/view-movies');
            } else {
                return back()->withInput();
            }
        } else {
            return back()->withInput()->withErrors(['imageError' => 'please upload an image with either a jpg or png format']);
        }
    }

    public function findAllMovies()
    {
        return $this->movieService->findAllMovies();
    }

    public function findMoviesByStatus($status)
    {
        return $this->movieService->findMoviesByStatus($status);
    }

    public function findMoviesByCategory(Request $request)
    {
        return $this->movieService->findMovieByCategory($request->q);
    }

    public function countMovies()
    {
        return $this->movieService->countMovies();
    }

    public function search($param)
    {
        $movieList = $this->movieService->searchByParam($param);
        // if (!$movieList) {
            return response()->json($movieList);
        // } else {
        //     return response()->json(["message" => "sorry nothing was found for your search"]);
        // }
    }

    public function getByTheatreLocation($location)
    {
        return response()->json($this->movieService->findByTheatreLocation($location));
    }

    public function deleteMovie($id)
    {
        return response()->json(['message' => $this->movieService->delete($id)]);
    }
}
