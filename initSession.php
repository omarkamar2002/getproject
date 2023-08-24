<?php 
include_once ('Metier.php');
//include_once ('mysql.php');
session_start();

if(!isset($_SESSION['CoachList'])){
    $_SESSION['CoachList'] = new CoachList();
}
$CoachList = $_SESSION['CoachList'];

if(!isset($_SESSION['ClassList'])){
    $_SESSION['ClassList'] = new ClassList();}
$ClassList = $_SESSION['ClassList'];

?>
