<?php
require_once("../conn.php");

//if $_POST["seach"] isset and is not blank
$search = isset($_POST["search"]) && $_POST["search"] !="" ? $_POST["search"] : false;
$model = isset($_POST["model"]) && $_POST["model"] !="" ? $_POST["model"] : false;
$year = isset($_POST["year"]) ? $_POST["year"] : false;


$model = $db->real_escape_string(trim($model)); //prevents mysql injection attacks
$search = $db->real_escape_string(trim($search)); //prevents mysql injection attacks
$year = $db->real_escape_string($year); //prevents mysql injection attacks

if($search || $year || $model) {

    $search_sql = "SELECT * FROM cars
                    WHERE CONCAT_WS('', make, model) LIKE '%$search%'";

    if($year != 0) {
        $search_sql .= " AND year = $year";
    }

} else {
    $search_sql = "SELECT * FROM cars";
    
    }

    $result = $db->query($search_sql);

    $cars = array();
    while($row = $result->fetch_assoc()){
        $cars[] = $row; //append row to the $cars array

    }
    $db->close(); //Close connection when finished

    echo json_encode($cars); //return results in JS object notation


?>