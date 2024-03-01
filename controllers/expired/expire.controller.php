<?php
require "models/expired.model.php";
$user = $_SESSION['user'];
$today = $_SESSION['today'];

$productExpires = getExpireToday($today);

$sevenDay = strtotime("+7 day", strtotime($today));
$oneMonth = strtotime("+1 Month", strtotime($today));

$sevenDayFormat = date("Y-m-d",$sevenDay);
$oneMonthFormat = date("Y-m-d",$oneMonth);

$expireInSevenDay = getExpires($today,$sevenDayFormat);
$expireInOneMonth = getExpires($today,$oneMonthFormat);

$numberOfExpire = 0;
$numberOfExpireSevenDay = 0;
$numberOfExpireOneMonth = 0;

$numberOfExpire += sum($productExpires);
$numberOfExpireSevenDay += sum($expireInSevenDay);
$numberOfExpireOneMonth += sum($expireInOneMonth);

//user
$numberOfExpireTodayUser = 0;
$numberOfExpireSevenDayUser = 0;
$numberOfExpireOneMonthUser = 0;

$expireToday = getExpireTodayByUser($today,$user[0]);
$expireInSevenDayUser = getExpiresUser($today,$sevenDayFormat,$user[0]);
$expireInOneMonthUser = getExpiresUser($today,$oneMonthFormat,$user[0]);

$numberOfExpireTodayUser += sum($expireToday);
$numberOfExpireSevenDayUser += sum($expireInSevenDayUser);
$numberOfExpireOneMonthUser += sum($expireInOneMonthUser);

require "views/expired/expire.view.php";
