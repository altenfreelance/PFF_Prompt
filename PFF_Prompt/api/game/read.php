<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");


// include database and object files
include_once "./../config/database.php";
include_once './../../objects/game.php';
 
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$game = new Game($db);
 
// query products
if (isset($_GET['player_id'])){
    $stmt = $game->read_ID($_GET['player_id']);

}
else{
    $stmt = $game->readAll();
}
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // products array
    $games_arr=array();
    $games_arr["stats"]=array();
 
    // retrieve our table contents
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $stats_item=array(
            "player_id" => $player_id,
            "last_name" => $last_name,
            "first_name" => $first_name,
            "yards" => $yards,
            "week" => $week,
            "touchdowns" => $touchdowns,
            "on_home_team" => $on_home_team,
            "interceptions" => $interceptions,
            "home_team" => $home_team,
            "completions" => $completions,
            "away_team" => $away_team,
            "attempts" => $attempts

        );
 
        array_push($games_arr["stats"], $stats_item);
    }
 
    // set response code - 200 OK
    http_response_code(200);
 
    // show products data in json format
    echo json_encode($games_arr);
}
 
else{
 
    // set response code - 404 Not found
    http_response_code(404);
 
    // tell the user no products found
    echo json_encode(
        array("message" => "No statistics found.")
    );
}
