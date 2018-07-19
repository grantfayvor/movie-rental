<?php
namespace App\Services;

use App\Models\Movie;
use App\Repositories\MovieRepository;
use Illuminate\Http\Request;
use Storage;

class MovieService
{

    private $repository;

    public function __construct(MovieRepository $movieRepository)
    {
        $this->repository = $movieRepository;
    }

    public function findAllMovies()
    {
        return $this->repository->findAll(50);
    }

    public function countMovies()
    {
        return $this->repository->findAllUnPaged()->count();
    }

    /*public function saveMovie($movie, $image)
    {
        Storage::disk('public')->putFileAs('', $movie->getImageLocation(), $image);
        return $this->repository->save($movie);
    }*/

    public function save(Request $request)
    {
        $name = $request->name;
        $brand = $request->brand;
        $categoryId = $request->categoryId;
        $details = $request->details;
        $sellingPrice = $request->sellingPrice;
        $image = $request->file('image');
        $status = $request->status;
        $showingAt = date('Y-m-d H:i:s', strtotime($request->showingAt));
        $imageLocation = 'images/movies/' .$name .'.jpg';
        $movie = new Movie();
        $movie->setName($name);
        $movie->setBrand($brand);
        $movie->setCategoryId($categoryId);
        $movie->setDetails($details);
        $movie->setSellingPrice($sellingPrice);
        $movie->setImageLocation($imageLocation);
        $movie->setImageLocation($imageLocation);
        $movie->setStatus($status);
        $movie->setShowingAt($showingAt);
        Storage::disk('movies')->putFileAs('/', $image, $movie->getImageLocation());
        $movie = $this->repository->save($movie->getAttributesArray());
        for($i = 0; $i < count($request->theatreIds); $i++) {
            $movie->theatres()->attach($request->theatreIds[$i]);
        }
        return $movie;
    }

    public function update(Request $request, $id)
    {
        $name = $request->name;
        $brand = $request->brand;
        $categoryId = $request->categoryId;
        $details = $request->details;
        $sellingPrice = $request->sellingPrice;
        $image = $request->file('image');
        $status = $request->status;
        $showingAt = date('Y-m-d H:i:s', strtotime($request->showingAt));
        $imageLocation = 'images/movies/' .$name .'.jpg';
        $movie = new Movie();
        $movie->setName($name);
        $movie->setBrand($brand);
        $movie->setCategoryId($categoryId);
        $movie->setDetails($details);
        $movie->setSellingPrice($sellingPrice);
        $movie->setImageLocation($imageLocation);
        $movie->setImageLocation($imageLocation);
        $movie->setStatus($status);
        $movie->setShowingAt($showingAt);
        Storage::disk('movies')->putFileAs('/', $image, $movie->getImageLocation());
        $movie = $this->repository->update($id, $movie->getAttributesArray());
        for($i = 0; $i < count($request->theatreIds); $i++) {
            $movie->theatres()->attach($request->theatreIds[$i]);
        }
        return $movie;
    }

    public function findMoviesByStatus($status)
    {
        return $this->repository->findByParam('status', $status);
    }

    public function findMovieByCategory($category)
    {
        return $this->repository->findByParam('category_id', $category, '/api/movies/find?q=' .$category, 30);
    }

    public function searchByParam($param)
    {
        return $this->repository->search($param, 30);
    }

    public function findByTheatreLocation($location)
    {
        return $this->repository->findByTheatreLocation($location);
    }

    public function delete($id)
    {
        return $this->repository->delete($id);
    }
}