<?php 

header('Content-type: text/plain');
require 'SurveyInfo.php';
error_reporting(0);

$prop = $_GET["prop"] ?: "all";
if($prop == "all") echo SurveyInfo::GetAll();
else echo $prop.": ".SurveyInfo::GetValue($prop);