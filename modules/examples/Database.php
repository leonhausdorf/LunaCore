<?php

/*
 * Analytics Module by Leon Hausdorf
 * Version: 0.2.1
 * Following modules are required:
 *
 *  no requirements
 */


class Database {

    private $DATABASE_HOST = '127.0.0.1';
    private $DATABSE_NAME = 'lunacore';
    private $DATABASE_USER = 'root';
    private $DATABASE_PASSWORD = '';

    private function initiateConnection() {
        return new PDO('mysql:host=' . $this->DATABASE_HOST . ';dbname=' . $this->DATABSE_NAME, $this->DATABASE_USER, $this->DATABASE_PASSWORD);
    }

    public function getConnection() {
        return $this->initiateConnection();
    }

    public function executeQuery($query) {
        return $this->getConnection()->query($query);
    }

    public function fetchQuery($query) {
        return $this->getConnection()->query($query)->fetchAll();
    }

    public function executeUpdate($query, $arguments) {
        $data = $this->getConnection()->prepare($query);
        $data->execute($arguments);
        return $data->fetch();
    }

}