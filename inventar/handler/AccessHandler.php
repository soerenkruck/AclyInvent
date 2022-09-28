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
            '<div class="card" style="max-width: 23em; min-width: 23em;" xmlns="http://www.w3.org/1999/html">
                <div class="item-content">
                    <div><span class="card-title" style="
  max-width : 242px;
  overflow:hidden;
  display:inline-block;
  text-overflow: clip;
  white-space: nowrap;">' . $row['name'] . '</span><br>
                        <span class="">' . $row['category'] . '</span>
                    </div>
                    <div style="text-align: right">
                        <button style="float: bottom">Bearbeiten</button>
                    </div>
                    <div class="overflow-scroll" style="max-height: 128px">' .
                        listProperties($row['properties']) . '
                    </div>
                    <div style="text-align: center"><span style="width: max-content">' . $row['status'] . '</span></div>
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
        $end = $end . '<span class="small2" style="width: 100%">- ' . $v . '</span><br>';
    }

    return $end;

}