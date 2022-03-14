<?php

/*
 * This file was created by Leon Hausdorf
 * Original Filename: Updater.php
 * Project: htdocs
 * Date: 13.03.22
 */

class Updater {

    /**
     * create Backup of all files that should be updated
     *
     * @return void
     */
    public function createBackup() {
        $zip = new ZipArchive();
        $filename = "backup-" . $this->getCurrentVersion() . ".zip";

        if($zip->open($filename, ZipArchive::CREATE) !== true)
            $this->sendResponse(['task' => 'create zip file', 'success' => false]);

        $updateFiles = Spyc::YAMLLoad($this->getUpdateFile());
        $updateFiles = $updateFiles['files'];
        $updateFolder = $_SESSION['root'];

        if(array_key_exists('add', $updateFiles)) {
            $addFiles = $updateFiles['add'];
            for($i = 0, $c = count($addFiles); $i < $c; $i++) {
                if(file_exists($updateFolder . $addFiles[$i]['local'])) {
                    if($zip->addFile($updateFolder . $addFiles[$i]['local'], $addFiles[$i]['local']) === false) {
                        $this->sendResponse(['task' => 'add file into zip', 'success' => false]);
                    }
                }
            }

            $deleteFiles = $updateFiles['delete'];
            for($i = 0, $c = count($deleteFiles); $i < $c; $i++) {
                if(file_exists($updateFolder . $deleteFiles[$i])) {
                    $zip->addFile($updateFolder . $deleteFiles[$i]);
                }
            }
        }

        chmod($updateFolder . '/' . $filename, 0777);
    }

    public function installFiles() {
        $updateFiles = Spyc::YAMLLoad($this->getUpdateFile());
        $updateFiles = $updateFiles['files'];
        $updateFolder = $_SESSION['root'];
        $versionUrl = 'https://api.lunacore.eu/update/patch/';

        if(array_key_exists('add', $updateFiles)) {
            $addFiles = $updateFiles['add'];
            for($i = 0, $c = count($addFiles); $i < $c; $i++) {
                $content = @file_get_contents($versionUrl . $addFiles[$i]['remote']);
                $pathInfo = pathinfo($updateFolder . $addFiles[$i]['local']);

                if(!file_exists($pathInfo['dirname'])) {
                    if (!mkdir($concurrentDirectory = $pathInfo['dirname'], 0775, true) && !is_dir($concurrentDirectory)) {
                        throw new \RuntimeException(sprintf('Directory "%s" was not created', $concurrentDirectory));
                    }
                }

                file_put_contents($updateFolder . $addFiles[$i]['local'], $content);
                chmod($updateFolder . $addFiles[$i]['local'], 0777);
            }
        }

        if(array_key_exists('delete', $updateFiles)) {
            for ($i = 0, $c = count($updateFiles['delete']); $i < $c; $i++) {
                if (file_exists($updateFolder . $updateFiles['delete'][$i])) {
                    if (is_dir($updateFolder . $updateFiles['delete'][$i])) {
                        rmdir($updateFolder . $updateFiles['delete'][$i]);
                    } else {
                        unlink($updateFolder . $updateFiles['delete'][$i]);
                    }
                }
            }
        }

    }

    public function updateVersion() {
        $updateVersion = Spyc::YAMLLoad($this->getUpdateFile())['version'];
        file_put_contents('app/storage/version.txt', $updateVersion);
    }

    public function versionIsCurrent() {
        $spyc = Spyc::YAMLLoad($this->getUpdateFile());
        $currentVersion = $this->getCurrentVersion();
        $updateVersion = $spyc['version'];
        $currentVersionNumbers = explode(".", $currentVersion);
        $updateVersionNumbers = explode(".", $updateVersion);
        $current = true;

        foreach ($updateVersionNumbers as $key => $value) {
            if(!array_key_exists($key,$currentVersionNumbers)) {
                $current = false;
            } else if($value > $currentVersionNumbers[$key]) {
                $current = false;
            }
        }

        return ['current' => $current, 'currentVersion' => $currentVersion, 'updateVersion' => $updateVersion];
    }

    public function isNewVersionAvailable() {
        return !$this->versionIsCurrent()['current'];
    }

    public function wantsForceUpdate() {
        $spyc = Spyc::YAMLLoad($this->getUpdateFile());

        return $spyc['force'];
    }

    public function checkForScripts() {
        $spyc = Spyc::YAMLLoad($this->getUpdateFile());
        $updateFolder = $_SESSION['root'];
        $exists = true;

        if(!array_key_exists('scripts', $spyc)) {
            $exists = false;
        }


        foreach ($spyc['scripts'] as $script) {
            if(!file_exists($updateFolder . $script)) {
                $exists = false;
                break;
            }
        }

        $this->sendResponse(['task' => 'check if scripts exists', 'exists' => $exists]);
    }

    public function checkRemoteFilesExists() {
        $updateFiles = Spyc::YAMLLoad($this->getUpdateFile());
        $updateFiles = $updateFiles['files'];

        if(array_key_exists('add', $updateFiles)) {
            $addFiles = $updateFiles['add'];
            for($i = 0, $c = count($addFiles); $i < $c; $i++) {
                $fileHeaders = @get_headers('https://api.lunacore.eu/update/patch/' . $addFiles[$i]['remote']);
                if(!$fileHeaders || $fileHeaders[0] == 'HTTP/1.1 404 Not Found') {
                    $this->sendResponse(['exists' => false]);
                    exit();
                }
            }
        }
        $this->sendResponse(['exists' => true]);
    }

    public function checkUpdateFileExists() {
        $versionUrl = 'https://api.lunacore.eu/update/info.json';
        $file = @file_get_contents($versionUrl);
        $exists = true;

        if($file === false) {
            $exists = false;
        }

        $this->sendResponse(['exists' => $exists, 'url' => $versionUrl]);
    }

    public function executeScripts() {
        $spyc = Spyc::YAMLLoad($this->getUpdateFile());
        $updateFolder = $_SESSION['root'];
        $exists = true;

        if(!array_key_exists('scripts', $spyc)) {
            $exists = false;
        } else {
            foreach ($spyc['scripts'] as $script) {
                if(file_exists($updateFolder . $script)) {
                    include_once($updateFolder . $script);
                }
            }
        }

        $this->sendResponse([]);
    }

    public function checkFilesAreWriteable() {
        $spyc = Spyc::YAMLLoad($this->getUpdateFile());
        $writeable = $this->checkUpdateFilesWritable($spyc);

        if($writeable) {
            $writeable = $this->checkDeleteFilesWriteable($spyc);
        }

        return $writeable;
    }

    private function checkUpdateFilesWritable($update) {
        $writeable = true;
        $updateFiles = $update['files']['add'];

        for($i = 0, $c = count($updateFiles); $i < $c; $i++) {
            $file = $updateFiles[$i]['local'];
            return $this->checkFileIsWriteable($file);
        }

        return $writeable;
    }

    private function checkDeleteFilesWriteable($delete) {
        $writeable = true;

        if(!array_key_exists('delete', $delete['files']))
            return true;

        $deleteFiles = $delete['files']['delete'];
        for($i = 0, $c = count($deleteFiles); $i < $c; $i++) {
            $file = $deleteFiles[$i];
            $writeable = $this->checkFileIsWriteable($file);
            if(!$writeable)
                break;
        }

        return $writeable;
    }

    private function checkFileIsWriteable($file) {
        $updateFolder = $_SESSION['root'];
        $pathInfo = pathinfo($updateFolder . $file);

        if(file_exists($updateFolder . $file) && !is_writable($updateFolder . '/' . $file)) {
            return false;
        }

        if(file_exists($pathInfo['dirname']) && !is_writable($pathInfo['dirname'])) {
            return false;
        }

        $pathParts = explode('/', $pathInfo['dirname']);
        if(count($pathParts) === 1) {
            $pathParts = explode("\\", $pathInfo['dirname']);
        }

        foreach($pathParts as $key=>$pathPart) {
            if($key == 0)
                $pathToCheck = $pathPart;
            else
                $pathToCheck = $updateFolder . $pathPart;

            if(file_exists($pathToCheck)) {
                if(!is_writable($pathToCheck)) {
                    return false;
                }
            }
        }
        return true;
    }

    /**
     * get current version from version.txt
     *
     * @return string
     */
    public function getCurrentVersion() {
        return explode(PHP_EOL, file_get_contents("app/storage/version.txt"))[0];
    }

    public function getRemoteVersion() {
        $content = file_get_contents("https://api.lunacore.eu/update/info.json");
        if($content === false) {
            return $this->getCurrentVersion();
        }
        return json_decode($content, true)['version'];
    }

    public function getUpdateFile() {
        $content = file_get_contents("https://api.lunacore.eu/update/changes.yaml");
        return $content;
    }

    /**
     * send a response
     *
     * @param $array
     * @return void
     */
    public function sendResponse($array) {
        header('Content-Type: application/json');
        echo(json_encode($array));
        die();
    }

}