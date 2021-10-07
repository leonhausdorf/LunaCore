<?php

class Setup {

    /**
     * get settings.json contents
     *
     * @return mixed
     */
    public function getSettings() {
        return json_decode(file_get_contents("settings.json"), true);
    }

    /**
     * checks if setup is completed
     *
     * @return bool
     */
    public function isSetup() {
        $settings = $this->getSettings();
        return !empty($settings['setup']['auth_username']) && !empty($settings['setup']['auth_password']);
    }

    /**
     * set admin credentials to settings.json
     *
     * @param $username
     * @param $password
     */
    public function setAdminCredentials($username, $password) {
        $settings = $this->getSettings();
        $settings['setup']['auth_username'] = $username;
        $settings['setup']['auth_password'] = password_hash($password, PASSWORD_DEFAULT);
        file_put_contents('settings.json', json_encode($settings));
    }

    /**
     * login user
     *
     * @param $username
     * @param $password
     */
    public function logIn($username, $password) {
        $activity = new Activity();
        $settings = $this->getSettings();
        if($username == $settings['setup']['auth_username'])
            if(password_verify($password, $settings['setup']['auth_password'])) {
                $_SESSION['logged'] = 1;
                $activity->insertActivity($_POST['username'] . ' logged in', Activity::TYPE_LOGIN, 'login', Activity::COLOR_INFO);
                header('Location: /setup/overview/');
                die();
            }
        header('Location: /setup/login/');
    }

    /**
     * logout from setup panel
     */
    public function logout() {
        session_destroy();
        session_start();
        header('Location: /setup/login/');
    }

    /**
     * checks if the user is logged in
     *
     * @return bool
     */
    public function isLoggedIn() {
        return isset($_SESSION['logged']) && $_SESSION['logged'] == 1;
    }

}