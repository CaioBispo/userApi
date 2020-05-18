<?php

namespace App\Business;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserBusiness
{

    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getAll()
    {
        $users = $this->user->all();

        if (count($users) > 0){
            return response()->json($users, Response::HTTP_OK);
        }

        return response()->json("Nenhum registro", Response::HTTP_OK);
    }

    public function get($id)
    {
        $user = $this->user->find($id);

        if ($user){
            return response()->json($user, Response::HTTP_OK);
        }

        return response()->json("Nenhum registro encontrado", Response::HTTP_NOT_FOUND);
    }

    public function insert(Request $request)
    {
        $user = $this->user->create($request->all());

        if($user){
            return response()->json($user, Response::HTTP_OK);
        }

        return response()->json("Ops, algo deu errado", Response::HTTP_NOT_FOUND);
    }

    public function update(Request $request, $id)
    {
        $user = $this->user->find($id)
            ->update($request->all());

        if($user){
            return response()->json($user, Response::HTTP_OK);
        }

        return response()->json("Ops, algo deu errado", Response::HTTP_BAD_REQUEST);
    }

    public function destroy($id)
    {
        $user = $this->user->find($id)->delete();

        if($user){
            return response()->json("Usuário deletado", Response::HTTP_OK);
        }

        return response()->json("Ops, algo deu errado", Response::HTTP_BAD_REQUEST);
    }
}
