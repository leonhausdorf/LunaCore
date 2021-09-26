<?php

class Routes {

    private $routes = [];

    public function defineCustomRoutes() {

        /*
         * Here you can define your own routes for your website
         *
         * Use following scheme:
         * $this->setRoute('URL ROUTE', 'FILE TO POINT TO');
         *
         * There are several default routes defined to show you
         * how LunaCore is handling the URLs
         *
         * Also you can define $_GET parameters by simply insert :PARAMETER:
         *
         * For example:
         * :test: can accessed by $_GET['test'] in the specific file
         */

        $this->setRoute('/', 'index.php');
        $this->setRoute('/404/', '404.php');

        $this->setRoute('/test/', 'test.php');
        $this->setRoute('/test/:test:/', 'test.php');

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