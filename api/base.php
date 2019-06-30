<?php

# Declare content-type header as JSON for whole API
header("Content-type: application/json; charset=UTF-8");

# If file is not directly inherited, create apiroot variable
if(!isset($apiroot)) {
    $apiroot = "./";
}

# Setup variables
$approot = "../$apiroot";
$dataroot = "$approot/data";
$userroot = "$dataroot/users";

# Verify current user is logged in and get their username
# Set current username if user is logged in
$currentusername = "ldarling"; # TODO

# Decode error file for reading
$error = read("$approot/data/enums/error.json");

# 
function setupUser($method) {
    global $currentusername;
    if(isset($method["username"])) {
        $username = strtolower($method["username"]);
    } else {
        $username = $currentusername;
    }
    if(hasPermission($username)) {
        $user = getUser($username);
    } else {
        api(["username" => $username, "found" => false, "error" => getError("permission-denied")]);
    }
    if($user["found"]) {
        return $user;
    } else {
        api(["username" => $username, "found" => false, "error" => getError("user-not-found")]);
    }
}

# 
function getError($name) {
    global $error;
    return isset($error[$name]) ? $error[$name] : (isset($error["unknown"]) ? $error["unknown"] : "An unknown error has occurred.");
}

# 
function api($data) {
    print(json_encode($data, JSON_PRETTY_PRINT));
    exit(0);
}

# 
function read($filename) {
    return json_decode(file_get_contents($filename), true);
}

# 
function write($filename, $data) {
    file_put_contents($filename, json_encode($data));
}

# Gets a user by username
# Returns: array
function getUser($username) {
    global $userroot;
    $username = strtolower($username);
    $userfile = "$userroot/$username.json";
    if(!file_exists($userfile)) {
        return ["username" => $username, "found" => false];
    }
    return array_merge(["username" => $username, "found" => true], read($userfile));
}

# Checks if the current or given user has permission to do something
# Returns: boolean
function hasPermission($permission, $username = null) {
    global $currentusername;
    $username = strtolower($username);
    if($username == null) {
        $username = $currentusername;
    }
    return true; # TODO
}

# Checks if the current user is authenticated
# Returns: boolean
function isAuthed() {
    return true; # TODO
}