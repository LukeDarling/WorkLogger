<?php
if(!isset($apiroot)) {
    $apiroot = "./";
}
$approot = "../$apiroot";

# Checks if the current user is authenticated
# Returns: boolean
function isAuthed() {
    return false;
}