<?php

/*
 * Database Module by Leon Hausdorf
 * Version: 1.3.1
 * Following modules are required:
 *
 *  no requirements
 */


class Database {

    /*
     * Insert your database credentials here for connecting to your MariaDB Database
     * The data will be secure unless you make this public or everyone can access the files
     */

    private string $DATABASE_HOST = '127.0.0.1';
    private string $DATABSE_NAME = 'lunacore';
    private string $DATABASE_USER = 'root';
    private string $DATABASE_PASSWORD = '';

    /**
     * initiate the database connections
     *
     * @return PDO
     */
    private function initiateConnection(): PDO{
        return new PDO('mysql:host=' . $this->DATABASE_HOST . ';dbname=' . $this->DATABSE_NAME, $this->DATABASE_USER, $this->DATABASE_PASSWORD);
    }

    /**
     * manually get the current pdo connection
     *
     * @return PDO
     */
    public function getConnection(): PDO{
        return $this->initiateConnection();
    }

    /**
     * execute a simple query statement
     * NOTES: returns false when query cannot be executed
     *
     * @param $query
     * @return PDO|boolean
     */
    public function executeQuery($query): PDO|bool{
        return $this->getConnection()->query($query);
    }

    /**
     * execute query and fetch all results
     * NOTES: returns false when query cannot be executed
     *
     * @param $query
     * @return array
     */
    public function fetchAllQuery($query): array{
        return $this->getConnection()->query($query)->fetchAll();
    }

    /**
     * executes query with parameters and fetch one result
     * NOTES: returns false when query cannot be executed
     *
     * @param $query
     * @param $arguments
     * @return mixed
     */
    public function executeUpdate($query, $arguments) {
        $data = $this->getConnection()->prepare($query);
        $data->execute($arguments);
        return $data->fetch();
    }

    /**
     * executes query with parameters and fetch all results
     * NOTS: returns false when query cannot be executed
     *
     * @param $query
     * @param $arguments
     * @return mixed
     */
    public function executeAllUpdate($query, $arguments) {
        $data = $this->getConnection()->prepare($query);
        $data->execute($arguments);
        return $data->fetchAll();
    }

}