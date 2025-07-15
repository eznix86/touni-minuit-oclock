<?php

declare(strict_types=1);

date_default_timezone_set('Indian/Mauritius');

$envDate = getenv('NEXT_BEER');
$now = time();

$beerTimestamp = $envDate ? strtotime($envDate) : null;
$today = date('Y-m-d', $now);

if (!$beerTimestamp) {
    $message = "There are no beers planned!";
    $showCountdown = false;
} elseif (date('Y-m-d', $beerTimestamp) === $today) {
    $message = "There is a beer meetup today!";
    $showCountdown = false;
} elseif ($now < $beerTimestamp) {
    $message = "The next beer meetup is scheduled for " . date('Y-m-d', $beerTimestamp) . "";
    $showCountdown = true;
} else {
    $message = "There are no beers planned!";
    $showCountdown = false;
}

header('Content-Type: text/html; charset=UTF-8');

include 'views/index.html.php';
