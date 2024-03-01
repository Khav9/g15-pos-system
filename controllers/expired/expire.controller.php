<?php
require "models/expired.model.php";

$productExpires = getExpireToday($_SESSION['today']);
require "views/expired/expire.view.php";



