<?php

/*
 * LunaCore URL Engine
 * Developed by Leon Hausdorf
 * Version 1.2beta
 */

class Engine {

    public $core = null;
    public $routes = [];
    public $path = "";
    private $rpath = "";

    /**
     * Engine startup method
     * must be executed first
     */
    public function startup() {
        require_once('modules/LunaCore.php');

        $this->core = new LunaCore();
        $this->core->loadEssentials();
        // $this->core->checkForUpdates();

        $route = new Routes();

        /*
         * Here you can define youre routes
         */

        $route->setRoute('/', 'index.php');
        $route->setRoute('/404/', '404.php');

        $route->setRoute('/test/', 'test.php');
        $route->setRoute('/test/:test:/', 'test.php');

        /*
         * End define Routes
         */

        $this->routes = $route->getRoutes();
    }

    /**
     * search for route in system
     * @param string $uri
     */
    public function search($uri) {
        $url = $uri;

        foreach($this->routes as $route => $durl) {
            $splitted = explode('/', $url);
            $rurl = "";
            if($url === $route) {
                $this->rpath = $this->routes[$route];
                break;
            } else {
                $sprurl = explode('/', $route);
                $rr = "";
                foreach ($sprurl as $value => $key) {
                    if(mb_substr($key, 0, 1) === ":" AND substr($key, -1) === ":"){
                        if(isset($splitted[$value])) {
                            $_GET[trim($key, ':')] = $splitted[$value];
                            $splitted[$value] = $key;
                        }
                    }
                    $rr .= $key."/";
                }
            }
            foreach ($splitted as $value=> $key){
                $rurl .= $key."/";
            }
            $rurl = substr($rurl, 0,-1);

            if($route === $rurl){
                $this->rpath = $this->routes[$rurl];
            }

        }

        // change route for 404 page view
        if(empty($this->rpath)){
            $this->rpath = $this->routes['/404/'];
        }

        $this->path = "views/".$this->rpath;
    }

    /**
     * load site from search result
     */
    public function loadSearchResult() {
        $this->core->loadModules();

        if(!@file_get_contents($this->path)) {
            require_once("views/404.php");
        } else {
            require_once($this->path);
        }
    }

}