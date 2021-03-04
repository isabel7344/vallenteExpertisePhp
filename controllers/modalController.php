<?php
session_start();
require "../modeles/database.php";
require "../modeles/training_sessions.php";

$training_sessions = new TrainingSessions();