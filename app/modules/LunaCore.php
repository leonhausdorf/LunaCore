<?php

class LunaCore {

    /**
     * load essential files
     */
    public function loadEssentials(): void{
        require_once('core/Routes.php');
        require_once('core/Setup.php');
        require_once('core/Activity.php');
        require_once('core/Updater.php');

        require_once('lib/Smarty/SmartyBC.class.php');
        require_once('lib/spyc/Spyc.php');
    }

    /**
     * load modules from modules folder.
     * Add new modules with require_once
     */
    public function loadModules(): void{

        /*
         * Here you can load all modules from the modules folder
         *
         * Usage: require_once('examples/Database.php');
         */

        require_once('examples/Database.php');
    }

    /**
     * Checks for LunaCore Updates
     *
     * NOTES: Function is not in use right now, because of the missing API endpoint in background
     */
    public function checkForUpdates(): void{
        $update = new Updater();

        echo("<script>console.log('[LunaCore] Checking for updates.');</script>");

        if($update->isNewVersionAvailable()) {
            echo("<script>console.log('[LunaCore] Update found: " . $update->getRemoteVersion() . "');</script>");
            echo("<script>console.log('[LunaCore] Check if automatic update is required.');</script>");
            if($update->wantsForceUpdate()) {
                if($update->checkFilesAreWriteable()) {
                    $update->installFiles();
                    $update->updateVersion();
                    echo("<script>console.log('[LunaCore] Updated LunaCore automatically.');</script>");
                } else {
                    error_log('[LunaCore] Cannot update. No write permissions.' . $update->getRemoteVersion());
                    echo("<script>console.error('[LunaCore] Cannot update. No write permissions.')</script>");
                }
            } else {
                echo("<script>console.log('[LunaCore] No automatic update required.');</script>");
                error_log('[LunaCore] A new version is available. Please log in into setup and update LunaCore: ' . $update->getRemoteVersion());
                echo("<script>console.log('[LunaCore] You can login into setup and update LunaCore to " . $update->getRemoteVersion(). "')</script>");
            }
        } else {
            echo("<script>console.log('[LunaCore] No updates available.');</script>");
        }


//            error_log('[LunaCore] A new version is available. Please visit https://lunacore.eu/ and download the newest version: ' . $this->getVersion());
//            echo("<script>console.warn('[LunaCore] A new version is available. Please visit https://lunacore.eu/ and download the newest version: " . $this->getVersion() . "')</script>");
    }

    /**
     * @return string - version
     */
    private function getLocalVersion(): string{
        return '1.4.2';
    }

    private function getVersion() {
        return json_decode(file_get_contents('https://api.lunacore.eu/info/'), true)['version'];
    }

    /**
     * check if lunacore has a update
     */
    private function hasUpdate(): bool
    {
        $request = file_get_contents('https://api.lunacore.eu/info/');

        if($request == "") {
            error_log('[LunaCore] CONNECTION FAILED! Cannot establish connection to API-Server');
            echo("<script>console.error('[LunaCore] CONNECTION FAILED! Cannot establish connection to API-Server!')</script>");
            return false;
        } else {
            return json_decode($request, true)['version'] != $this->getLocalVersion();
        }
    }


}