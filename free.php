<?php
// Parent class
class CricketPlayer {
    public $name;
    public $role;

    public function __construct($name, $role) {
        $this->name = $name;
        $this->role = $role;
    }

    public function play() {
        return "$this->name is a $this->role in the team.";
    }
}

// Child class for Batsman
class Batsman extends CricketPlayer {
    public function play() {
        return "$this->name is a Batsman and scores runs for the team.";
    }
}

// Child class for Bowler
class Bowler extends CricketPlayer {
    public function play() {
        return "$this->name is a Bowler and takes wickets for the team.";
    }
}

// Child class for All-rounder
class AllRounder extends CricketPlayer {
    public function play() {
        return "$this->name is an All-rounder and contributes with both bat and ball.";
    }
}

// Using the classes
$batsman = new Batsman("Bairstow", "Batsman");
$bowler = new Bowler("Wood", "Bowler");
$allRounder = new AllRounder("Ben Stokes", "All-rounder");

// Display results
echo "<h3>Cricket Players</h3>";
echo $batsman->play() . "<br>";
echo $bowler->play() . "<br>";
echo $allRounder->play() . "<br>";
?>
