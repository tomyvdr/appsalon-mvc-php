<?php 

    require_once __DIR__ . '/../includes/app.php';

    use Controllers\AdminController;
    use Controllers\APIController;
    use Controllers\CitaController;
    use Controllers\LoginController;
    use Controllers\ServicioController;
    use MVC\Router;
    $router = new Router();

    // Iniciar Sesión
    $router->get('/', [LoginController::class, 'login']);
    $router->post('/', [LoginController::class, 'login']);
    $router->get('/logout', [LoginController::class, 'logout']);

    //Recuperar Password
    $router->get('/forget', [LoginController::class, 'forget']);
    $router->post('/forget', [LoginController::class, 'forget']);
    $router->get('/recover', [LoginController::class, 'recover']);
    $router->post('/recover', [LoginController::class, 'recover']);

    //Crear Cuenta
    $router->get('/create-account', [LoginController::class, 'create']);
    $router->post('/create-account', [LoginController::class, 'create']);

    //Confirmar cuenta
    $router->get('/confirm-account', [LoginController::class, 'confirm']);
    $router->get('/mensaje', [LoginController::class, 'mensaje']);

    //Area Privada
    $router->get('/cita', [CitaController::class, 'index']);
    $router->get('/admin', [AdminController::class, 'index']);

    //API de Citas
    $router->get('/api/servicios', [APIController::class, 'index']);
    $router->post('/api/citas', [APIController::class, 'guardar']);
    $router->post('/api/delete', [APIController::class, 'delete']);

    // CRUD de Servicios
    $router->get('/servicios', [ServicioController::class, 'index']);
    $router->get('/servicios/create', [ServicioController::class, 'create']);
    $router->post('/servicios/create', [ServicioController::class, 'create']);
    $router->get('/servicios/update', [ServicioController::class, 'update']);
    $router->post('/servicios/update', [ServicioController::class, 'update']);
    $router->post('/servicios/delete', [ServicioController::class, 'delete']);

    // Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
    $router->comprobarRutas();