<?php

/*
 * LunaCore
 * © 2021 | Leon Hausdorf
 * Version 1.4.0 STABLE
 */

class Engine {

    /*
     * IMPORTANT NOTICE
     *
     * DO ONLY EDIT THIS FILE WHEN YOU DEFINENTLY KNOW WHAT YOU DOING
     * THIS FILE IS THE MAIN FUNCTIONALITY OF LUNACORE
     * YOU CAN DESTROY LUNACORE WHEN YOU GIVE WRONG VALUES
     *
     * When you want to add new Routes go to modules->core->Routes.php
     * For managing all modules go to modules->LunaCore.php
     */

    public $core = null;
    public $routes = [];
    public $path = "";
    private $rpath = "";
    private $settings;

    /**
     * Engine startup method
     * must be executed first
     */
    public function startup() {
        require_once('app/modules/LunaCore.php');

        $this->core = new LunaCore();
        $this->core->loadEssentials();
        // TODO: Automated update check for LunaCore
        $this->settings = json_decode(file_get_contents('app/storage/settings.json'), true);

        $route = new Routes();
        $route->defineCustomRoutes();
        $this->routes = $route->getRoutes();
    }

    /**
     * WARNING: CHANGING THIS FUNCTION MIGHT DESTROY THE FUNCTIONALITY OF LUNACORE
     * WARNING: ONLY EDIT THIS FUNCTION WHEN YOU DEFINENTLY KNOW WHAT YOU DOING
     *
     * search for route in system
     * @param string $uri
     */
    public function search($uri) {
        $url = $uri;
        if(substr($uri, -1) == "/")
            $url = mb_substr($uri, 0, -1);

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


        if(empty($this->rpath)){

            /*
             * Define Route of 404 page when the url that should loaded cannot be found
             */

            // $this->rpath = $this->routes['/404/'];
        }

        $this->path = "views/".$this->rpath;
    }

    /**
     * load site from search result
     */
    public function loadSearchResult() {
        $this->core->loadModules();

        if(!@file_get_contents($this->path)) {

            /*
             * Define Route of 404 page when the loaded page has no content
             */

            require_once("views/404.php");
        } else {
            require_once($this->path);
        }
    }

}