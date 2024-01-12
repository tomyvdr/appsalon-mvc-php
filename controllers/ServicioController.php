<?php
    namespace Controllers;

    use Model\Servicio;
    use MVC\Router;

    class ServicioController {
        public static function index( Router $router) {
            isSession();
            isAdmin();

            $servicios = Servicio::all();

            $router->render('servicios/index', [
                'nombre' => $_SESSION['nombre'],
                'servicios' => $servicios
            ]);
        }

        public static function create( Router $router) {
            isSession();
            isAdmin();
            $servicio = new Servicio;
            $alertas = [];

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $servicio->sincronizar($_POST);

                $alertas = $servicio->validar();

                if (empty($alertas)) {
                    $servicio->guardar();
                    header('Location: /servicios');
                }
            }

            $router->render('servicios/create', [
                'nombre' => $_SESSION['nombre'],
                'servicio' => $servicio,
                'alertas' => $alertas
            ]);
        }

        public static function update( Router $router) {
            isSession();
            isAdmin();
            if(!is_numeric($_GET['id'])) return;
            $servicio = Servicio::find($_GET['id']);
            $alertas = [];

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $servicio->sincronizar($_POST);

                $alertas = $servicio->validar();

                if (empty($alertas)) {
                    $servicio->guardar();
                    header('Location: /servicios');
                }
            }

         

            $router->render('servicios/update', [
                'nombre' => $_SESSION['nombre'],
                'servicio' => $servicio,
                'alertas' => $alertas
            ]);
        }

        public static function delete() {
            isAdmin();
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $id = $_POST['id'];
                $servicio = Servicio::find($id);
                $servicio->eliminar();
                header('Location: /servicios');
            }
        }
    }