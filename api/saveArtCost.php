<?php
header('Content-Type: application/json; charset=UTF-8');

class Response {
    public $success;
}

$result = false;

if (isset($_POST['postID']) && isset($_POST['art_cost'])) {
    require '../../../../wp-config.php';
    require_once '../DBManager/DBManager.php';

    $postId = $_POST['postID'];
    $art_cost = $_POST['art_cost'];

    $DB = new DBManager();
    $isExits = $DB->artCostIsExits();

    if(is_numeric($art_cost) && $isExits)
        $result = $DB->saveArtCost($postId, $art_cost);
}

$response = new Response();
$response->success = $result;

echo json_encode($response);