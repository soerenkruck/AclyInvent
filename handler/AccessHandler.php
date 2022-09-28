<?php

include "credentials.php";

function getAllInvents() {
    $pdo = new PDO('mysql:host=localhost;dbname=aclyinvent_invent;charset=utf8', credentials::$user, credentials::$password);

    $sql = "SELECT * FROM `items` ORDER BY `items`.`id`";

    //$result = $pdo->query($sql);
    $length = 0;

    $result_string = "";

    foreach ($pdo->query($sql) as $row) {
        $result_string = $result_string .
            '<div class="top-holder">
            <div class="card full-width">
                <div class="card-content">
                <div class="left">
                <span class="card-title">' . $row['name'] . '</span><br>
                    <span class="">' . $row['category'] . '</span><br>
                    <div class="lm hm-1">
                    <span class="small">' . listProperties($row['properties']) . '</span>
                    </div>
                    <br>
                    
            </div>
            
                    <div class="right">
                        <button class="top" onclick="alert(\'any\')">Bearbeiten</button><br><br>
                        <span>Status: ' . $row['status'] . '</span>
                    </div>
                </div>
            </div>

        </div>';
        $length++;
    }
    if ($length == 0) {
        return '<div class="top-holder">
            <div class="card full-width">
                <div class="card-content">
                    <span class="card-title">Kein Inventar</span>
                </div>
            </div>
        </div>';
    } else {
        return $result_string;
    }
}

function listProperties($props) {
    $end = '';
    $t = explode(",", $props);

    foreach ($t as $v) {
        $end = $end . '- ' . $v . '<br>';
    }

    return $end;

}