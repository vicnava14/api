<?php

// Incluir los archivos necesarios
require_once 'config.php'; // Configuración de la base de datos y otras variables
require_once 'functions.php'; // Funciones útiles para la API

// Obtener la solicitud entrante y dividirla en partes
$request = explode('/', trim($_SERVER['PATH_INFO'], '/'));

// Obtener el tipo de solicitud (ventas, clientes, inventario, etc.)
$type = array_shift($request);

// Enrutamiento de solicitudes
switch ($type) {
    case 'sales':
        // Manejar las solicitudes relacionadas con ventas
        require_once 'sales.php';
        break;
    case 'customer':
        // Manejar las solicitudes relacionadas con clientes
        require_once 'customer.php';
        break;
    case 'store':
        // Manejar las solicitudes relacionadas con inventario
        require_once 'store.php';
        break;
    default:
        // Respuesta para solicitudes desconocidas
        http_response_code(404);
        echo json_encode(['error' => 'Solicitud no válida']);
}

?>