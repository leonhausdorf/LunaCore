<?php

class Routes {

    private $routes = [];

    /**
     * returns whole routes array
     * @return array
     */
    public function getRoutes() {
        return $this->routes;
    }

    /**
     * Adds new route to route array
     * @param string $route
     * @param string $path
     */
    public function setRoute($route, $path) {
        $this->routes[$route] = $path;
    }

    /**
     * get route by route string
     * @param string $route
     * @return array
     */
    public function getRoute($route) {
        return $this->routes[$route];
    }

}