<?php


namespace App\Http\Controllers;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Traits\ApiResponser; 
use App\Services\TransactionService;

Class TransactionController extends Controller {  

use ApiResponser;

public $TransactionService;
// public $secret;

public function __construct(TransactionService $transactionService){
$this->TransactionService =$transactionService;
// $this->secret =config('services.transaction.secret');
$this->middleware('auth:api', ['except' => ['login', 'refresh', 'logout']]);
}


public function index()
{

    return $this->successResponse($this->TransactionService->Transactions());
}

public function TransactionWithID($id){
    {
    return $this->successResponse($this->TransactionService->TransactionID($id));
    }
}

public function AddTransaction(Request $request )
    {
    return $this->successResponse($this->TransactionService->addTransaction($request->all()));
    }



public function UpdateTransaction(Request $request,$id){
    return $this->successResponse($this->TransactionService->UpdateTransaction($request->all(),$id));
}



public function DeleteTransaction($id)
{
    return $this->successResponse($this->TransactionService->DeleteTransaction($id));
}

// Transaction Features

public function Claim($ItemID)
{
    return $this->successResponse($this->TransactionService->Claim($ItemID));
}
public function ShowBuyerDetails($SellerID)
{
    return $this->successResponse($this->TransactionService->ShowBuyerDetails($SellerID));
}


// Invoices Controller

public function Invoices()
{
    return $this->successResponse($this->TransactionService->Invoices());
}

public function InvoicesID($id)
{
    return $this->successResponse($this->TransactionService->InvoicesID($id));
}
public function AddInvoice(Request $request)
{
    return $this->successResponse($this->TransactionService->AddInvoice($request->all()));
}
public function DeleteInvoice($id)
{
    return $this->successResponse($this->TransactionService->DeleteInvoice($id));
}





}