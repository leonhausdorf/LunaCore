<?php

class Routes {

    private $routes = [];

    /**
     * Get all Routes from routes.json
     */
    public function defineCustomRoutes() {
        $fileroutes = json_decode(file_get_contents("routes.json"), true);

        foreach ($fileroutes as $key => $row) {
            $this->setRoute($key, $row);
        }

    }

    /**
     * returns whole routes array
     *
     * @return array
     */
    public function getRoutes() {
        return $this->routes;
    }

    /**
     * get routes.json without cutting the / at the end
     *
     * @return mixed
     */
    public function getRawRoutes() {
        return json_decode(file_get_contents("routes.json"), true);
    }

    /**
     * Set a number for every route to identify them
     *
     * @return array
     */
    public function getNumberedRoutes() {
        $routeData = [];
        $rowCount = 0;
        foreach ($this->getRawRoutes() as $key => $row) {
            $routeData[++$rowCount] = [
                'route' => $key,
                'file' => $row
            ];
        }
        return $routeData;
    }

    /**
     * count how many routes are set up
     *
     * @return int
     */
    public function countRoutes() {
        $rowCount = 0;
        foreach ($this->getRawRoutes() as $key => $row) {
            $rowCount++;
        }
        return $rowCount;
    }

    /**
     * edit specific route from routes.json
     *
     * @param $number
     * @param $route
     * @param $path
     */
    public function editRoute($number, $route, $path) {
        $numberedRoutes = $this->getNumberedRoutes();
        $numberedRoutes[$number] = [
            'route' => $route,
            'file' => $path
        ];
        $routeData = [];
        foreach($numberedRoutes as $row) {
            $tmproute = $row['route'];
            $routeData[$tmproute] = $row['file'];
        }
        file_put_contents('routes.json', json_encode($routeData));
    }

    /**
     * add route to routes.json
     *
     * @param $route
     * @param $path
     */
    public function addRoute($route, $path) {
        $fileroutes = json_decode(file_get_contents("routes.json"), true);
        $fileroutes[$route] = $path;
        file_put_contents('routes.json', json_encode($fileroutes));
    }

    /**
     * delete Route from routes.json
     *
     * @param $number
     */
    public function deleteRoute($number) {
        $numberedRoutes = $this->getNumberedRoutes();
        unset($numberedRoutes[$number]);
        $routeData = [];
        foreach($numberedRoutes as $row) {
            $tmproute = $row['route'];
            $routeData[$tmproute] = $row['file'];
        }
        file_put_contents('routes.json', json_encode($routeData));
    }

    /**
     * Adds new route to route array
     *
     * @param string $route
     * @param string $path
     */
    public function setRoute($route, $path) {
        if(str_ends_with($route, "/"))
            $route = mb_substr($route, 0, -1);
        $this->routes[$route] = $path;
    }

    /**
     * get route by route string
     *
     * @param string $route
     * @return array
     */
    public function getRoute($route) {
        return $this->routes[$route];
    }

}