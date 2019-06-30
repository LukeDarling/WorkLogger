<?php
include("inherit.php");
switch($_SERVER["REQUEST_METHOD"]) {
    case "GET":
        $user = setupUser($_GET);
        api(["username" => $user["username"], "found" => true, "name" => $user["firstname"] . " " . $user["lastname"], "firstname" => $user["firstname"], "lastname" => $user["lastname"]]);
    case "POST":
        $user = setupUser($_POST);
        $changed = false;
        $data = read("$userroot/" . $user["username"] . ".json");
        if(isset($_POST["firstname"])) {
            $data["firstname"] = $_POST["firstname"];
            $changed = true;
        }
        if(isset($_POST["lastname"])) {
            $data["lastname"] = $_POST["lastname"];
            $changed = true;
        }
        if($changed) {
            write("$userroot/" . $user["username"] . ".json", $data);
        }
    default:
        api(["error" => getError("invalid-protocol")]);
}