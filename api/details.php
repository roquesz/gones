<?php
include 'Gone.php';
$gone = new Gone();
$id = $_GET['id'];
echo $gone->getGoneDetails($id);