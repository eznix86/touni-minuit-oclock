<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Touni-Minuit-O'clock</title>
    <script src="//unpkg.com/alpinejs" defer></script>
    <link rel="icon" type="image/png" href="assets/logov2.png">
    <link href="assets/output.css" rel="stylesheet">

</head>
<body class="bg-black text-white font-sans m-0 p-5">
    <div class="flex justify-center">
        <div class="relative">
            <img src="assets/logov2.png" alt="Logo" class="block max-w-full h-auto opacity-30">
            <div class="absolute inset-0 flex flex-col items-center justify-center text-center text-3xl">
                <span><?= htmlspecialchars($message) ?></span>
                <?php if ($showCountdown): ?>
                    <div 
                        x-data="countdown"
                        x-init="start()"
                        class="mt-4 text-2xl"
                    >
                        <span x-text="days"></span> days,
                        <span x-text="hours"></span> hours,
                        <span x-text="minutes"></span> minutes,
                        <span x-text="seconds"></span> seconds
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <footer>
        <div class="flex justify-center">
            <a href="http://www.freepik.com" class="text-xs hover:text-blue-500">Designed by upklyak / Freepik</a>
        </div>
    </footer>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('countdown', () => ({
                target: <?= $beerTimestamp ?>,
                days: 0,
                hours: 0,
                minutes: 0,
                seconds: 0,
                update() {
                    let now = Math.floor(Date.now() / 1000);
                    let diff = this.target - now;
                    if (diff < 0) diff = 0;
                    this.days = Math.floor(diff / 86400);
                    this.hours = Math.floor((diff % 86400) / 3600);
                    this.minutes = Math.floor((diff % 3600) / 60);
                    this.seconds = diff % 60;
                },
                start() {
                    this.update();
                    setInterval(() => this.update(), 1000);
                }
            }));
        });
    </script>
</body>
</html>
