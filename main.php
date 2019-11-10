<?php
include_once('./Classes/Validator.php');
include_once('./Classes/Excel.php');
include_once('./Classes/FileContainer.php');
include_once('./Classes/Table.php');
include_once('./Classes/Core.php');
include_once('./Classes/Libs/PHPExcel/IOFactory.php');

$DEBUG_MOD = false;

if($DEBUG_MOD) echo "<pre>";
$core = new Core();
$core->init();
if($DEBUG_MOD) echo "</pre>";