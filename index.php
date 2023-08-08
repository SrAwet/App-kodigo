<?php
// MI PRIMER ENDPOINT

// HEADER
header('Content-Type: application/json');

$endpoint = $_SERVER['REQUEST_URI'];

// VAMOS A CREAR LA KODIGO-API

//PROBAR BASE DE DATOS


switch ($endpoint) {
    // GET
    case '/api/v1/bootcamps':
        http_response_code(200);
        require_once('./handlers/bootcamps.handler.php');
        $bootcamps = getAllBootcamps();
        echo json_encode($bootcamps);
        break;
    // POST
    case '/api/v1/bootcamps/create':
        http_response_code(201);
        require_once('./handlers/bootcamps.handler.php');
        $data = json_decode(file_get_contents('php://input'), true);
        $result = addBootcamp($data);
        echo json_encode($result);
    break;

    //PUT
    case '/api/v1/bootcamps/update':
        http_response_code(200);
        echo json_encode([
            'message' => 'Update bootcamps'
        ]);
        break;

    //DELETE
    case '/api/v1/bootcamps/delete':
        http_response_code(200);
        echo json_encode([
            'message' => 'Delete bootcamps'
        ]);
        break;
        
        default:
        http_response_code(404);
        echo json_encode([
            'message' => 'Endpoint not found'
        ]);
        break;
    }
?>