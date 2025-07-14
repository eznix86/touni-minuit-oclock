<!DOCTYPE html>
<html>
    <head>
        <title>Touni-Minuit-O'clock</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="icon" type="image/png" href="assets/logov2.png">
    </head>
    <body class="bg-black text-white font-sans m-0 p-5">
        <div class="flex justify-center">
            <div class="relative">
            <img src="assets/logov2.png" alt="Logo" class="block max-w-full h-auto opacity-30">
            <p class="absolute inset-0 flex items-center justify-center text-center text-3xl">
                <?php
                $env_date = getenv('NEXT_BEER');

                if ($env_date === false) {
                    echo "There is a beer meetup today!";
                }

                $beerdate = strtotime($env_date);
                $currentdate = time();

                // is today beer day
                if (date("Y-m-d", $beerdate) === date("Y-m-d", $currentdate)) {
                    echo "There is a beer meetup today!";
                }

                // if beerdate passed, display none upcoming
                else if ($currentdate > $beerdate) {
                    echo "There are no beers planned!";
                }

                // otherwise, display countdown
                else {
                    $days = floor(($beerdate - $currentdate) / (60 * 60 * 24));
                    $hours = floor(($beerdate - $currentdate) / (60 * 60)) % 24;
                    $minutes = floor(($beerdate - $currentdate) / 60) % 60;
                    $seconds = ($beerdate - $currentdate) % 60;

                    echo "The next beer meetup is scheduled for " . date("Y-m-d", $beerdate) . " in <br>" . $days . " days, " . $hours . " hours, " . $minutes . " minutes, and " . $seconds . " seconds";
                }
                ?>

            </p>
            </div>
        </div>
    </body>

    <footer>
        <div class="flex justify-center">
            <a href="http://www.freepik.com" class="text-xs hover:text-blue-500">Designed by upklyak / Freepik</a>
        </div>
    </footer>
</html>
