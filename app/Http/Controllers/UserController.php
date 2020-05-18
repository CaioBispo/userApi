<?php


namespace App\Http\Controllers;


use App\Business\UserBusiness;
use Illuminate\Http\Request;


class UserController
{

    private $userBusiness;

    public function __construct(UserBusiness $userBusiness){
        $this->userBusiness = $userBusiness;
    }

    public function getAll(){
        $response = $this->userBusiness->getAll();

        return $response;
    }

    public function get($id){
        $response = $this->userBusiness->get($id);

        return $response;
    }

    public function update(int $id, Request $request){

        $response = $this->userBusiness->update($request, $id);

        return $response;
    }

    public function insert(Request $request){

        $response = $this->userBusiness->insert($request);

        return $response;
    }

    public function destroy(int $id){
        $response = $this->userBusiness->destroy($id);

        return $response;

    }
}
