<?php
/**
 * Created by PhpStorm.
 * User: Harrison
 * Date: 03/12/2017
 * Time: 19:22
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class CartMovieDetails extends Model{

    protected $guarded = [];

    private $movieId;
    private $movieQuantity;
    private $price;

    /**
     * @return array
     */
    public function getMovieId()
    {
        return $this->movieId;
    }

    /**
     * @param array $movieId
     */
    public function setMovieId($movieId)
    {
        $this->movieId = $movieId;
    }

    /**
     * @return mixed
     */
    public function getMovieQuantity()
    {
        return $this->movieQuantity;
    }

    /**
     * @param mixed $movieQuantity
     */
    public function setMovieQuantity($movieQuantity)
    {
        $this->movieQuantity = $movieQuantity;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }



    public function movies ()
    {
        return $this->belongsTo(Movie::class);
    }

    public function getAttributesArray()
    {
        return [
            'movie_id' => $this->movieId,
            'movie_quantity' => $this->movieQuantity,
            'price' => $this->price
        ];
    }

}