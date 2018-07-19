<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $guarded = [];

//    private $movieId;
//    private $movieQuantity;

    private $cartMovieDetails;
    private $totalPrice;
    private $customerId;

    public function __construct()
    {

    }

    /**
     * @return mixed
     */
    public function getCartMovieDetails()
    {
        return $this->cartMovieDetails;
    }

    /**
     * @param mixed $cartMovieDetails
     */
    public function setCartMovieDetails($cartMovieDetails)
    {
        $this->cartMovieDetails = $cartMovieDetails;
    }

    public function getTotalPrice()
    {
        return $this->totalPrice;
    }

    public function setTotalPrice($totalPrice)
    {
        $this->totalPrice = $totalPrice;
    }

    public function getCustomerId()
    {
        return $this->customerId;
    }

    public function setCustomerId($customerId)
    {
        $this->customerId = $customerId;
    }

    public function cartMovieDetails()
    {
        return $this->hasMany(CartMovieDetails::class);
    }

    public function getAttributesArray()
    {
        return [
            'cart_movie_details_ids' => $this->cartMovieDetails,
            'total_price' => $this->totalPrice,
            'customer_id' => $this->customerId
        ];
    }

}

?>