<?php

require_once "lib/protected-route.php";
require_once "lib/get-job-info.php";

$job = getJobInfo(true);
$jobName = $job['job-name'];
$id = $job['id'];
$json = file_get_contents('database/data.json');
$data = json_decode($json, true);
unset($data[$id]);
file_put_contents('database/data.json', json_encode($data));
header("Location: ../index.php")
?>

