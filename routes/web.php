<?php

/**
 * @SWG\Swagger(schemes={"http"}, basePath="/v1", @SWG\Info(version="1.0.0", title="Api Exemplo API"))
 */

/**
 * @SWG\Get(path="/api/user", summary="Lista todos os User", produces={"application/json"}, @SWG\Response(response="default", description="successful operation"),
 * @SWG\Parameter(description="Pesquisa", in="query", name="like", required=false, type="string"))
 */
$router->group(['prefix' => "/api/user"], function() use ($router){
    $router->get("/", "UserController@getAll");
    $router->get("/{id}", "UserController@get");
    $router->post("/", "UserController@insert");
    $router->put("/{id}", "UserController@update");
    $router->delete("/{id}", "UserController@destroy");

});

