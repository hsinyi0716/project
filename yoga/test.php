
<?php 
if (isset($_POST)) {
$poseData = json_decode(file_get_contents("php://input"), true);
    echo json_encode($poseData);
}?>