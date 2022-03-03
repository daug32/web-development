<?php 

header('Content-type: text/plain');
error_reporting(0);
require 'SurveyInfo.php';

$prop = $_GET["prop"] ?: "all";
if($prop == "all") echo SurveyInfo::GetAll();
else echo $prop.": ".SurveyInfo::GetValue($prop);