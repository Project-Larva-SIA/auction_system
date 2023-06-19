<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class UserService{

use ConsumesExternalService;

    public $baseUri;
    public $secret;

    public function __construct()
{
    $this->baseUri =config('services.user.base_uri');
    $this->secret =config('services.user.secret');
}

public function obtainUsers()
    {

        return $this->performRequest('GET', '/users');
    }

    public function createUser($data)
{
        return $this->performRequest('POST', '/users',$data);
}

    public function obtainUser($id) 
{
        return $this->performRequest('GET', "/user/{$id}");
}

    public function editUser($data, $id){
        return $this->performRequest('PUT',"/users/{$id}", $data);
}

    public function deleteUser($userID){
        return $this->performRequest('DELETE', "/users/{$userID}");
}

// User Features

public function searchName($keyword)
{
    return $this->performRequest('GET', "/users/search?q={$keyword}");
}   

}