<?php


namespace App\Http\Controllers;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Traits\ApiResponser; 
use App\Services\UserService;

Class UserController extends Controller {  

use ApiResponser;

public $UserService;
// public $secret;

public function __construct(UserService $userService){
$this->UserService =$userService;
// $this->secret =config('services.users.secret');
$this->middleware('auth:api', ['except' => ['login', 'refresh', 'logout']]);
}


public function index()
{

    return $this->successResponse($this->UserService->obtainUsers());
}


public function add(Request $request )
    {
    return $this->successResponse($this->UserService->createUser($request->all()));
    }


public function getID($id){
    {
    return $this->successResponse($this->UserService->obtainUser($id));
    }
}

public function update(Request $request,$id){
    return $this->successResponse($this->UserService->editUser($request->all(),$id));
}



public function delete($userID)
{
    return $this->successResponse($this->UserService->deleteUser($userID));
}

//  User Features 

public function searchName(Request $request)
{
    $keyword = $request->input('q');
    return $this->successResponse($this->UserService->searchName($keyword));
}

}