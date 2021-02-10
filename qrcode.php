<?php
session_start();
require_once "classes/phpqrcode/qrlib.php";

QRcode::png($_SESSION["json"]);
session_unset();