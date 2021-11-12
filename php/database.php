<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'demonica';
// $xml_file = simplexml_load_file('carnage-report.xml');

function testDatabaseConnection()
{
    $database = new mysqli(
        $GLOBALS['servername'],
        $GLOBALS['username'],
        $GLOBALS['password'],
        $GLOBALS['database']
    )  or die("Unable to connect to database");

    $sql_test = "SELECT kills FROM halomcc";
    $result = $database->query($sql_test);

    #echo all kills
    while ($row = $result->fetch_assoc()) {
        echo "Kills: " . $row["kills"] . "<br>";
    }
}

function inputDataFromXML()
{
    $database = new mysqli(
        $GLOBALS['servername'],
        $GLOBALS['username'],
        $GLOBALS['password'],
        $GLOBALS['database']
    )  or die("Unable to connect to database");

    #open file & delete after database update
    if (is_file("carnage_report.xml")) {
        $xml_file = simplexml_load_file('carnage_report.xml');
        $sql = "SELECT kills from halomcc";

        $database_stats_kills = $database->query($sql);
        $index = 0; // used to iterate through the XML file

        while ($row = $database_stats_kills->fetch_assoc()) {
            $current_xml_kills = $xml_file->Kills[$index];
            $current_xml_deaths = $xml_file->Deaths[$index];
            $current_xml_assists = $xml_file->Assists[$index];
            if ($xml_file->Player[$index] == "Kristo Rails") {
                $player_id = 4;
            } else if ($xml_file->Player[$index] == "Viable Manatee") {
                $player_id = 1;
            } else if ($xml_file->Player[$index] == "Avo_JT") {
                $player_id = 2;
            } else if ($xml_file->Player[$index] == "Shadowinthehood") {
                $player_id = 3;
            }

            //Our database id starts at 1. Because reasons
            $sql_update = "UPDATE halomcc SET kills=kills+$current_xml_kills , 
            deaths=deaths+$current_xml_deaths , assists=assists+$current_xml_assists
            WHERE id=$player_id";
            $database->query($sql_update);
            $index++;
        }
        unlink("carnage_report.xml");
    }
}

class Player
{
    private $name;
    private $kills;
    private $deaths;
    private $assists;
    private $ratio;

    function __construct($n, $k, $d, $a)
    {
        $this->name = $n;
        $this->kills = $k;
        $this->deaths = $d;
        $this->assists = $a;
    }

    function calculateRatio()
    {
        $result = 0;
        if ($this->kills != 0) {
            $result = number_format(($this->kills + $this->assists * 0.5) / $this->deaths, 2);
        }
        return $result;
    }

    #get functions
    function getName()
    {
        return $this->name;
    }
    function getKills()
    {
        return $this->kills;
    }
    function getDeaths()
    {
        return $this->deaths;
    }
    function getAssists()
    {
        return $this->assists;
    }
}

function getPlayerStats()
{
    $database = new mysqli(
        $GLOBALS['servername'],
        $GLOBALS['username'],
        $GLOBALS['password'],
        $GLOBALS['database']
    )  or die("Unable to connect to database");

    $sql = "SELECT gamertag, kills, deaths, assists from halomcc";
    $result = $database->query($sql);

    $list_players = array();

    while ($row = $result->fetch_assoc()) {
        $name = $row['gamertag'];
        $kills = $row['kills'];
        $assists = $row['assists'];
        $deaths = $row['deaths'];

        $player = new Player($name, $kills, $deaths, $assists);
        array_push($list_players, $player);
    }
    return $list_players;
}
