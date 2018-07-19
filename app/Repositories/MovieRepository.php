<?php
namespace App\Repositories;

use App\Models\Movie;

class MovieRepository extends AbstractRepository
{

    protected $model;

    public function __construct(Movie $movie)
    {
        $this->model = $movie;
    }

    public function search($param, $n = 5)
    {
        return $this->model->with(['reviews', 'ratings', 'theatres'])
            ->where('name', 'like', '%' . $param . '%')
            ->orWhere('brand', 'like', '%' . $param . '%')
            ->orWhere('details', 'like', '%' . $param . '%')
            ->simplePaginate($n);
    }

    public function findAllUnPaged()
    {
        return $this->model->all();
    }

    public function findAll(int $n = 5)
    {
        return $this->model->with(['reviews', 'ratings', 'theatres'])->simplePaginate($n);
    }

    public function findById($id)
    {
        return $this->model->with(['reviews', 'ratings', 'theatres'])->find($id);
    }

    public function update($id, array $fields)
    {
        return $this->model->where('id', $id)->update($fields);
    }

    public function delete($id)
    {
        return $this->model->find($id)->delete();
    }

    public function save(array $object)
    {
        return $this->model->create($object);
    }

    public function findByParam($param, $value, $url = null, int $n = 5)
    {
        $result = $this->model->with(['reviews', 'ratings', 'theatres'])->where($param, $value)->simplePaginate($n);
        if($url != null) $result->withPath($url);
        return $result;
    }

    public function findByTheatreLocation($location)
    {
        $result = [];
        $movies = $this->model->with(['reviews', 'ratings', 'theatres'])->get();//->simplePaginate($n);
        foreach($movies as $movie) {
            foreach($movie->theatres as $theatre) {
                if(preg_match('/'. $location .'/', $theatre->location)) {
                    array_push($result, $movie);
                }
            }
        }
//        $movies->data = $result;
        return ['data' => $result];
    }

    public function findOneByParam($param, $value)
    {
        return $this->model->with(['reviews', 'ratings', 'theatres'])->where($param, $value)->first();
    }

}