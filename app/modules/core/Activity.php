<?php

class Activity {

    public const COLOR_PRIMARY = '#007bff';
    public const COLOR_SECONDARY = '#6c757d';
    public const COLOR_SUCCESS = '#28a745';
    public const COLOR_WARNING = '#ffc107';
    public const COLOR_DANGER = '#dc3545';
    public const COLOR_INFO = '#17a2b8';

    public const TYPE_SETUP = 'setup';
    public const TYPE_LOGIN = 'login';
    public const TYPE_LOGOUT = 'logout';
    public const TYPE_ROUTE_ADD = 'route_add';
    public const TYPE_ROUTE_EDIT = 'route_edit';
    public const TYPE_ROUTE_REMOVE = 'route_remove';

    public function insertActivity($name, $type, $icon, $color) {
        $activities = json_decode(file_get_contents('app/storage/activity.json'), true);
        $activities[] = [
            'name' =>  $name,
            'type' => $type,
            'icon' => $icon,
            'color' => $color,
            'date' => date('H:i, d.m.Y', time())
        ];
        file_put_contents('app/storage/activity.json', json_encode($activities));
    }

    public function getActivities() {
        return json_decode(file_get_contents('app/storage/activity.json'), true);
    }

    public function countActivities(): int{
        $count = 0;
        foreach ($this->getActivities() as $row) {
            $count++;
        }
        return $count;
    }

    public function getLastActivities($max = 5): array{
        $data = array_reverse($this->getActivities());
        if($this->countActivities() < $max)
            return $data;
        else {
            $tmpc = 0;
            $tmpdata = [];
            foreach($data as $row) {
               if(++$tmpc <= $max) {
                   $tmpdata[] = $row;
               }
            }
            return $tmpdata;
        }
    }

}