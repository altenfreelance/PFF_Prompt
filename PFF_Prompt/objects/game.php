<?php
class Game {
  // database connection and table name
  private $conn;

  // satistics object properties
  public $yards;
  public $week;
  public $touchdowns;
  public $player_id;
  public $on_home_team;
  public $interceptions;
  public $home_team;
  public $completions;
  public $away_team;
  public $attempts;

  //Constructor that accepts database
  public function __construct($db) {
    $this->conn = $db;
  }

  //Return JSON object of all players stats
  function readAll(){
    // select all query
    $query = 'SELECT P.player_id, P.first_name, P.last_name, S.*
      FROM players P, statistics S WHERE P.player_id = S.player_id
      ORDER BY P.last_name ASC, S.week';

    // prepare query statement
    $stmt = $this->conn->prepare($query);

    // execute query
    $stmt->execute();

    return $stmt;
  }

  //Return JSON object of single player stats based on ID
  function read_ID($player_id) {
    // select all query
    $query = 'SELECT P.player_id, P.first_name, P.last_name, S.*
      FROM players P, statistics S WHERE P.player_id = S.player_id
      AND P.player_id = :player_id
      ORDER BY P.last_name ASC, S.week';

    // prepare query statement
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':player_id', $player_id);

    // execute query
    $stmt->execute();

    return $stmt;
  }
}

