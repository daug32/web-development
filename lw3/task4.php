<?php

header('Content-type: text/plain');
error_reporting(0);

require 'SurveySaver.php';
echo SurveySaver::Exec();