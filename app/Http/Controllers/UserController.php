<?php


namespace App\Http\Controllers;


use App\Business\UserBusiness;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Laravel\Lumen\Http\ResponseFactory;

/**
 * @OA\Info(
 *   title="Example API",
 *   version="1.0",
 *   @OA\Contact(
 *     email="support@example.com",
 *     name="Support Team"
 *   )
 * )
 */
class UserController
{

    private $userBusiness;

    public function __construct(UserBusiness $userBusiness){
        $this->userBusiness = $userBusiness;
    }

    /**
     * @OA\Get(
     *     path="/user",
     *     operationId="/user",
     *     tags={"User - List"},
     *     @OA\Response(
     *         response="200",
     *         description="Retrieves the existent users"
     *     ),
     *     @OA\Response(
     *         response="500",
     *         description="Something went wrong when trying to User list."
     *     ),
     * )
     * @return JsonResponse
     */
    public function getAll(){
        return $this->userBusiness->getAll();
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
