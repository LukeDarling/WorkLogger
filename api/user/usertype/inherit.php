<?php
if(!isset($apiroot)) {
    $apiroot = "../";
} else {
    $apiroot = "../$apiroot";
}
include("$apiroot/inherit.php");