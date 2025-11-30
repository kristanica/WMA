<?php
include_once "php/getAlbum.php";
include_once "php/getRandomTrack.php";
include_once "php/getArtist.php";
include_once "php/hardCodedInfo.php";
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Release</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Exo:ital,wght@0,100..900;1,100..900&family=Jersey+10&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>


    <!-- Estabishes tailwind config for style -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        exo: ['"Exo"', 'sans-serif'], // Example for overriding default sans-serif

                    },
                },
            },
        };
    </script>


</head>

<body class="min-h-screen min-w-screen bg-[#1c151a] text-white font-exo">
    <div class="fixed inset-0 bg-[url(./assets/optimized-logo-gif.webp)] opacity-30 -z-10 "></div>

    <div class="ml-10 mt-5 flex flex-col fixed gap-3 z-2">
        <a class="cursor-pointer font-exo text-sm  hover:underline" href="dashboard.php">HOME</a>
        <a class="cursor-pointer font-exo text-sm  hover:underline" href="album.php">ALBUM</a>
        <a class="cursor-pointer font-exo text-sm  hover:underline" href="tracks.php">TRACKS</a>
        <a class="cursor-pointer font-exo text-sm hover:underline" href="allReleases.php">ALL RELEASES</a>

    </div>
    <header class="h-[20vh] flex flex-col justify-end items-center text-center relative">
        <img src="./assets/optimized-logo-gif.webp" class="h-24 w-24 fixed top-10 z-2 inset-50">
        <p class="text-center font-exo tracking-widest">All the albums. All the hits. All Paramore.</p>


    </header>

    <main>
        <div id="topAlbum" class="flex flex-wrap justify-center gap-8 py-12 px-5">

            <?php foreach ($albums as $album): ?>
                <div class="flex flex-col bg-[#2a1f33] rounded-2xl overflow-hidden w-64 shadow-lg hover:scale-105 hover:shadow-yellow-500/70 transition-transform duration-300 border-2 border-transparent hover:border-yellow-400">

                    <div class="overflow-hidden">
                        <img class="w-full h-64 object-cover border-b-2 border-yellow-400" src="<?= $album["image"][3]["#text"] ?>" alt="<?= $album['name'] ?>">
                    </div>

                    <h1 class="text-yellow-400 text-center my-3 font-extrabold uppercase tracking-wide text-lg px-2"><?= $album["name"] ?></h1>
                </div>
            <?php endforeach; ?>

        </div>





    </main>
    <footer class="bg-black">
        <div class="grid grid-cols-3 py-5">
            <div class="flex flex-col justify-center items-center">
                <img src="./assets/optimized-logo-gif.webp" class="h-24 w-24">

            </div>
            <div class="flex flex-col justify-center">
                <a class="cursor-pointer font-exo text-sm  hover:underline" href="dashboard.php">HOME</a>
                <a class="cursor-pointer font-exo text-sm  hover:underline" href="album.php">ALBUM</a>
                <a class="cursor-pointer font-exo text-sm  hover:underline" href="tracks.php">TRACKS</a>
                <a class="cursor-pointer font-exo text-sm hover:underline" href="allReleases.php">ALL RELEASES</a>
            </div>
            <div class="flex flex-col justify-center text-center md:text-left space-y-3">
                <h2 class="text-white font-semibold tracking-wider">FOLLOW PARAMORE</h2>
                <div class="flex justify-center md:justify-start gap-4 text-xl">
                    <a href="#" class="hover:text-red-400 transition">🎵</a>
                    <a href="#" class="hover:text-red-400 transition">📸</a>
                    <a href="#" class="hover:text-red-400 transition">▶️</a>
                </div>

                <p class="text-sm text-gray-400">
                    Updates, concerts, announcements & more.
                </p>
            </div>
            <div class="col-span-3 text-center border-t border-gray-700 pt-5 mt-5">
                <p class="text-gray-500 text-xs">
                    © <?= date("Y") ?> Paramore Fan Page — For educational use only.
                </p>
            </div>
        </div>


    </footer>
</body>

</html>