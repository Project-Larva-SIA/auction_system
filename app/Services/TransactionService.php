<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class TransactionService{

use ConsumesExternalService;

    public $baseUri;
    public $secret;

    public function __construct()
{
        $this->baseUri =config('services.transaction.base_uri');
        $this->secret =config('services.transaction.secret');
}

public function Transactions()
  {
        return $this->performRequest('GET', '/transaction');
  }
      
  public function TransactionID($id) 
  {
              return $this->performRequest('GET', "/transaction/{$id}");
  }

    public function addTransaction($data)
{
        return $this->performRequest('POST', '/transaction',$data);
}

    public function UpdateTransaction($data, $id){
        return $this->performRequest('PUT',"/transaction/{$id}", $data);
}

    public function DeleteTransaction($userID){
        return $this->performRequest('DELETE', "/transaction/{$userID}");
}

// Transaction Features

public function Claim($ItemID) 
{
  return $this->performRequest('GET', "/claim/{$ItemID}");
}
public function ShowBuyerDetails($SellerID) 
{
  return $this->performRequest('GET', "/buyer/{$SellerID}");
}

//  Invoices

public function Invoices()
{
    return $this->performRequest('GET', '/invoice');
}
public function InvoicesID($id)
{
    return $this->performRequest('GET', "/invoice/{$id}");
}
public function AddInvoice($data)
{
    return $this->performRequest('POST', "/invoice", $data);
}
public function DeleteInvoice($id)
{
    return $this->performRequest('DELETE', "/invoice/{$id}");
}


}