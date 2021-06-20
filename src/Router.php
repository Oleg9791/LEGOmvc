<?php

namespace App;

class Router
{
    public function run()
    {
        $type = $_GET['type'] ?? "Main";
        $action = "action" . ($_GET['action'] ?? "index");
        $controllerName = "App\\Controller\\$type";
        if (class_exists($controllerName)) {
            $controller = new $controllerName();
            if (method_exists($controller, $action)) {
                $controller->{$action}();
            } else {
                echo "403 NOT FOUND METHOD";

            }

        } else {
            echo "404 NOT FOUND CLASS";
        }
    }

}