<?php
// ensure getAlbum.php run only once
include_once "php/getAlbum.php";

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tracks</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Exo:ital,wght@0,100..900;1,100..900&family=Jersey+10&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

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

<body class="min-h-screen min-w-screen bg-[#1c151a] text-white">
    <div class="fixed inset-0 bg-[url(./assets/optimized-logo-gif.webp)] opacity-30 -z-10 "></div>

    <div class="ml-10 mt-5 flex flex-col fixed gap-3 z-2">
        <a class="cursor-pointer font-exo text-sm  hover:underline" href="dashboard.php">HOME</a>
        <a class="cursor-pointer font-exo text-sm  hover:underline" href="album.php">ALBUM</a>
        <a class="cursor-pointer font-exo text-sm  hover:underline" href="tracks.php">TRACKS</a>
        <a class="cursor-pointer font-exo text-sm hover:underline" href="allReleases.php">ALL RELEASES</a>

    </div>
    <header class="h-[20vh] flex flex-col justify-end items-center text-center relative">
        <img src="./assets/optimized-logo-gif.webp" class="h-24 w-24 fixed top-10 z-2 inset-50">
        <p class="text-center font-exo tracking-widest">From “All We Know” to “This Is Why”—every track matters.</p>

    </header>
    <main>

        <div id="albums" class=" overflow-x-auto py-10 px-5 grid grid-cols-1 md:grid-cols-2 gap-10  max-w-[80%] mx-auto ">


            <!-- Display filteredalbums as album -->
            <?php foreach ($filteredAlbums as $album): ?>
                <div class="trackContent grid grid-cols-1 h-auto relative transition-all duration-500 w-full z-0 cursor-pointer">

                    <div class="flex justify-center items-center relative">
                        <!-- Retrieves the image -->
                        <img src="<?= $album["image"] ?>" class="h-[450px] object-contain border-yellow-400 border-[2px]">

                    </div>

                    <div class="albumDetails max-h-0 overflow-hidden transition-all duration-500 ease-in-out opacity-0">
                        <p class="text-center text-xl  mt-2 font-exo font-bold uppercase">
                            <?= $album["name"] ?>
                        </p>
                        <!-- Display all the tracks per album -->
                        <?php foreach ($album["trackDetails"] as $track): ?>
                            <!-- Formats the duration -->
                            <?php
                            $minutes = floor($track["trackDuration"] / 60);
                            $seconds = $track["trackDuration"] % 60;
                            $formattedDuration = sprintf("%d:%02d", $minutes, $seconds);
                            ?>
                            <div>
                                <p class="text-gray-200 font-medium truncate"><?= $track["trackName"] ?></p>
                                <p class="text-gray-400 text-sm"><?= $formattedDuration ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>


            <?php endforeach; ?>
        </div>

    </main>


    <!-- SImple footer -->
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
                <h2 class="text-white font-semibold tracking-wider font-exo">FOLLOW PARAMORE</h2>
                <div class="flex justify-center md:justify-start gap-4 text-xl">
                    <a class="hover:text-red-400 transition">🎵</a>
                    <a class="hover:text-red-400 transition">📸</a>
                    <a class="hover:text-red-400 transition">▶️</a>
                </div>

                <p class="text-sm text-gray-400 font-exo">
                    Updates, concerts, announcements & more.
                </p>
            </div>
            <div class="col-span-3 text-center border-t border-gray-700 pt-5 mt-5">
                <p class="text-gray-500 text-xs font-exo">
                    © <?= date("Y") ?> Paramore Fan Page — For educational use only.
                </p>
            </div>
        </div>


    </footer>

    <script>
        // Expand transition when album clicked
        const trackContent = document.querySelectorAll(".trackContent");

        trackContent.forEach((item, index) => {
            item.addEventListener("click", () => {
                const albumDetails = document.querySelectorAll(".albumDetails");
                albumDetails[index].classList.toggle("max-h-0");
                albumDetails[index].classList.toggle("max-h-[500px]");
                albumDetails[index].classList.toggle("opacity-0");
                albumDetails[index].classList.toggle("opacity-100");
            });
        });
    </script>
</body>

</html>