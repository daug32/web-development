<?php 

header('Content-type: text/plain');

require 'SurveyInfo.php';
// echo SurveyInfo::GetProp("daug32@mail.ru", "first_name");
// echo SurveyInfo::GetProp("daug32@mail.ru", "second_name");
// echo SurveyInfo::GetProp("daug32@mail.ru", "email");
// echo SurveyInfo::GetProp("daug32@mail.ru", "age");
// echo SurveyInfo::GetProp("daug32@mail.ru", "hobby");

echo SurveyInfo::GetAll("daug32@mail.ru");