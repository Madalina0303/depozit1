<?php
$requestUri = $_SERVER["REQUEST_URI"];
$requestMethod = $_SERVER["REQUEST_METHOD"];
if ($requestMethod === "GET") {
header('Content-Type: application/json');
if(isset($_GET["level"]))
$level=$_GET["level"];
else
$level="bh";
if(isset($_GET["challenge"]))
$challenge=$_GET["chlg"];
else
$challenge=1;

$model=file_get_contents("../models/model.json");
$modelJson=json_decode($model);
       
    $require= $modelJson->$level[($challenge-1)]->require;
    $answer= $modelJson->$level[($challenge-1)]->answer;
     //var_dump($require);
    echo json_encode(array("status"=>'ok', "require"=>$require,"answer"=>$answer));
}
else{
    echo json_encode(array(
        "status" => 405,
        "message" => "Method not allowed; Only GET is allowed"));

}
?>