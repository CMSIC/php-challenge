<?php

require __DIR__ . "/../../library/json-response.php";
require __DIR__ . "/../../library/request.php";
require __DIR__ . "/../../models/films.php";
require __DIR__ . "/../../jwt-verify.php";

try {
    // Verify the JWT
    $decoded = jwt_verify(getBearerToken());

    // If the JWT is invalid, an exception will be thrown by jwt_verify()
    // and the rest of the code won't be executed

    $json = Request::getJsonBody();
    FilmModel::create($json);
    Response::json(201, [], ["success" => true]);
} catch (PDOException $exception) {
    Response::json(500, [], ["success" => false, "error" => $exception->getMessage()]);
} catch (\Exception $e) { // Catch JWT verification errors
    http_response_code(401);
    echo json_encode(['error' => 'Invalid token']);
}