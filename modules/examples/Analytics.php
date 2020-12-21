<?php

/*
 * Analytics Module by Leon Hausdorf
 * Version: 0.3.4
 * Following modules are required:
 *
 *  - Database (0.2.1 and higher)
 */


class Analytics {

    /**
     * will initialize Analytics and inserts analytics data
     */
    public function initializeAnalytics() {
        $referrer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'no referrer';
        $this->insertAnalytics($_SERVER['REMOTE_ADDR'], $this->cleanUpURL($_SERVER['REQUEST_URI']), $_SERVER['HTTP_USER_AGENT'], $referrer);
    }

    /**
     * must be executed first to check missing table or database connection
     */
    private function checkDatabaseRequirement() {
        $db = new Database();
        $db->executeQuery('CREATE TABLE IF NOT EXISTS analytics (id INT NOT NULL AUTO_INCREMENT, ip VARCHAR(255) NULL DEFAULT NULL, url VARCHAR(255) NULL DEFAULT NULL, client VARCHAR(255) NOT NULL, referrer TEXT NULL DEFAULT NULL, datetime TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP, PRIMARY KEY (id)) ENGINE = InnoDB;');
    }

    /**
     * insert all collected data to database
     * @param string $ip
     * @param string $url
     * @param string $client
     * @param string $referrer
     */
    private function insertAnalytics($ip, $url, $client, $referrer) {
        $db = new Database();
        $this->checkDatabaseRequirement();
        if($this->isValid($ip)) {
            $db->executeUpdate('INSERT INTO analytics (ip, url, client, referrer) VALUES (:ip, :url, :client, :referrer)', ['ip' => $ip, 'url' => $url, 'client' => $client, 'referrer' => $referrer]);
        }
    }

    /**
     * @param string $url - url from site that viewed
     * @return false|string
     */
    private function cleanUpURL($url) {
        $splitrurl = explode('/', $url);
        $realroute = "";
        foreach ($splitrurl as $value => $key) {
            if(mb_substr($key, 0, 1) === ":" AND substr($key, -1) === ":"){
                if(isset($spliturl[$value])) {
                    $_GET[trim($key, ':')] = $spliturl[$value];
                    $spliturl[$value] = $key;
                }
            }
            $realroute .= $key."/";
        }
        return substr($realroute, 0, -1);
    }

    /**
     * true if time between inserts is bigger then 2 seconds
     * @param string $ip - ip for check
     * @return bool
     */
    private function isValid($ip) {
        $db = new Database();
        $result = $db->executeUpdate('SELECT * FROM analytics WHERE ip = :ip ORDER BY datetime DESC LIMIT 1', ['ip' => $ip]);
        return time() - strtotime($result['datetime']) > 3;
    }

    /*
     * Following functions are for admin purposes / read out analytics
     */

    /**
     * Fetch all Database entrys from analytics
     * @return array
     */
    public function getFullTimeAnalytics() {
        $db = new Database();
        return $db->fetchQuery('SELECT * FROM analytics');
    }

    /**
     * @param int $id - Id from specific row (unique)
     * @return array
     */
    public function getAnalyticsByID($id) {
        $db = new Database();
        return $db->executeUpdate('SELECT * FROM analytics WHERE id = :id', ['id' => $id]);
    }

    /**
     * @param $ip - IP from specific row
     * @return array
     */
    public function getAnalyticsByIP($ip) {
        $db = new Database();
        return $db->executeUpdate('SELECT * FROM analytics WHERE ip = :ip', ['ip' => $ip]);
    }

    /**
     * @param $url - URL from specific row
     * @return array
     */
    public function getAnalyticsByURL($url) {
        $db = new Database();
        return $db->executeUpdate('SELECT * FROM analytics WHERE url = :url', ['url' => $url]);
    }

}