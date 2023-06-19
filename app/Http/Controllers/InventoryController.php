<?php


namespace App\Http\Controllers;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Traits\ApiResponser; 
use App\Services\InventoryService;

Class InventoryController extends Controller {  

use ApiResponser;

public $InventoryService;
// public $secret;

public function __construct(InventoryService $inventoryService){
  $this->InventoryService =$inventoryService;
  // $this->secret =config('services.inventory.secret');
  $this->middleware('auth:api', ['except' => ['login', 'refresh', 'logout']]);

}


public function index()
{
    return $this->successResponse($this->InventoryService->index());
}

public function ItemID($ItemID){
    
  return $this->successResponse($this->InventoryService->ItemID($ItemID));
  
}

public function AddItem(Request $request ){
  return $this->successResponse($this->InventoryService->AddItem($request->all()));
}


public function DeleteItem($ItemID){
    return $this->successResponse($this->InventoryService->DeleteItem($ItemID));
}


//  Bids Controller


public function Bids()
{
    return $this->successResponse($this->InventoryService->Bids());
}
public function BidsID($BidID)
{
    return $this->successResponse($this->InventoryService->BidsID($BidID));
}
public function DeleteBids($BidID)
{
    return $this->successResponse($this->InventoryService->DeleteBids($BidID));
}

//  Inventory Features

  // Item Features

  public function Filter(Request $request)
  { 
      $keyword = $request->input('s');
      return $this->successResponse($this->InventoryService->Filter($keyword));
  }
  public function HigherBid()
  {
      return $this->successResponse($this->InventoryService->HigherBid());
  }

  // Bid Features

  public function UpdateBidAmount(Request $request, $id)
  {
      $bidAmount = $request->input('BidAmount');
      $response = $this->InventoryService->updateBidAmount($id, $bidAmount);
      return $this->successResponse($response);
  }

  public function addBidAmount(Request $request){
    return $this->successResponse($this->InventoryService->addBidAmount($request->all()));
  }
  public function BidInfo($BidID){
    return $this->successResponse($this->InventoryService->BidInfo($BidID));
  }

}