<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;
use Illuminate\Http\Request;
class InventoryService{

use ConsumesExternalService;

  public $baseUri;
  public $secret;

  public function __construct(){
        $this->baseUri =config('services.inventory.base_uri');
        $this->secret =config('services.inventory.secret');
  }

  public function index(){
    return $this->performRequest('GET', '/items');
  }

  public function ItemID($ItemID) 
  { 
    return $this->performRequest('GET', "/items/{$ItemID}");
  }

  public function AddItem($data){
     return $this->performRequest('POST', '/items',$data);
  }

    public function DeleteItem($ItemID){
        return $this->performRequest('DELETE', "/items/{$ItemID}");
  }

  // Bids Service

  public function Bids(){
    return $this->performRequest('GET', '/bids');
  }
  public function BidsID($BidID){
    return $this->performRequest('GET', "/bids/{$BidID}");
  }
  public function DeleteBids($BidID){
    return $this->performRequest('DELETE', "/bids/{$BidID}");
  }

  // Inventory Features

    // Item Features

  public function Filter($keyword){
      return $this->performRequest('GET', "/item/search?s={$keyword}");
  } 
  public function HigherBid(){
      return $this->performRequest('GET', '/show/high');
  } 

    // Bid Features

  public function UpdateBidAmount($id, $bidAmount){
      return $this->performRequest('PUT', "/bid/update/{$id}", ['BidAmount' => $bidAmount]);
  } 
  public function addBidAmount($data){
      return $this->performRequest('POST', '/add/bid', $data);
  } 
  public function BidInfo($BidID){
      return $this->performRequest('GET', "/bid/info/{$BidID}");
  } 





  
}