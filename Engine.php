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

    public ?LunaCore $core = null;
    public array $routes = [];
    public string $path = "";
    private string $rpath = "";

    /**
     * Engine startup method
     * must be executed first
     */
    public function startup(): void{
        require_once('app/modules/LunaCore.php');

        $this->core = new LunaCore();
        $this->core->loadEssentials();
        $this->core->checkForUpdates();

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
    public function search(string $uri) {
        $url = mb_strtolower($uri);
        if(str_ends_with($uri, "/"))
            $url = mb_substr($uri, 0, -1);

        foreach($this->routes as $route => $durl) {
            $route = mb_strtolower($route);
            $splitted = explode('/', $url);
            $rurl = "";
            if($url === $route) {
                $this->rpath = $this->routes[$route];
                break;
            } else {
                $sprurl = explode('/', $route);
                $rr = "";
                foreach ($sprurl as $value => $key) {
                    if(mb_substr($key, 0, 1) === ":" && str_ends_with($key, ":")){
                        if(isset($splitted[$value])) {
                            $_GET[trim($key, ':')] = $splitted[$value];
                            $splitted[$value] = $key;
                        }
                    }
                    $rr .= $key."/";
                }
            }
            foreach ($splitted as $value => $key){
                $rurl .= $key."/";
            }
            $rurl = substr($rurl, 0,-1);

            if($route === $rurl){
                $this->rpath = $this->routes[$rurl];
            }
        }


        if(empty($this->rpath)){
            $this->rpath = $this->routes['/404/'];
        }

        $this->path = "views/".$this->rpath;
    }

    /**
     * load site from search result
     */
    public function loadSearchResult(): void{
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