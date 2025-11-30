<?php

include_once "php/getArtist.php";
include_once "php/hardCodedInfo.php";
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

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

<body class="min-h-screen min-w-screen bg-[#1c151a] text-white font-exo">
    <div class="fixed inset-0 bg-[url(./assets/optimized-logo-gif.webp)] opacity-30 -z-10 "></div>

    <div class="ml-10 mt-5 flex flex-col fixed gap-3">
        <a class="cursor-pointer font-exo text-sm  hover:underline" href="dashboard.php">HOME</a>
        <a class="cursor-pointer font-exo text-sm  hover:underline" href="album.php">ALBUM</a>
        <a class="cursor-pointer font-exo text-sm  hover:underline" href="tracks.php">TRACKS</a>
        <a class="cursor-pointer font-exo text-sm hover:underline" href="allReleases.php">ALL RELEASES</a>

    </div>

    <main>



        <div class="relative text-white min-w-screen min-h-screen flex justify-center items-center flex-col text-center px-5">
            <img src="./assets/optimized-logo-gif.webp" class="w-40 h-40 mb-3">
            <p class="text-xs mt-2">Explore the band's albums, tracks, and their journey</p>
        </div>

        <!-- Simple Line -->
        <div class="min-w-screen h-[1px] bg-white opacity-50 my-10 mx-5">
        </div>

        <div>


            <div id="about" class="w-[70%] mx-auto">


                <h1 class="text-4xl font-bold mb-3">PARAMORE</h1>
                <div class="w-full h-32 overflow-hidden">
                    <img src="./assets/images/concert.jpg" class="w-full h-full object-cover">
                </div>
                <p class="text-justify mt-3 "><?php echo $aboutParamore["bio"]["content"] ?></p>

            </div>


            <div class="w-[70%] mx-auto">
                <h1 class="text-bold text-4xl font-extrabold mt-10">MEMBERS</h1>
                <div class=" flex flex-wrap gap-8 my-10 px-5">
                    <?php foreach ($members as $member): ?>
                        <div class="flex flex-col items-center bg-[#1e1e1e] rounded-2xl p-5 w-60 shadow-lg hover:scale-105 transition-transform duration-300">
                            <img src="<?= $member['photo'] ?>" alt="<?= $member['name'] ?>" class="w-36 h-36 rounded-full mb-4 object-cover border-4 border-yellow-400">
                            <p class="font-bold text-lg text-center mb-1"><?= $member['name'] ?></p>
                            <p class="text-yellow-400 text-sm mb-1 text-center"><?= $member['role'] ?></p>
                            <p class="text-gray-400 text-xs mb-2 text-center"><?= $member['year'] ?></p>
                            <p class="text-center text-white text-sm"><?= $member['bio'] ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>

            </div>




            <div class="w-[70%] mx-auto">
                <h1 class="text-bold text-4xl font-extrabold mt-10">FORMER MEMBERS</h1>

                <div class=" flex flex-wrap gap-8 my-10 px-5">
                    <?php foreach ($formerMembers as $member): ?>
                        <div class="flex flex-col items-center bg-[#1e1e1e] rounded-2xl p-5 w-60 shadow-lg hover:scale-105 transition-transform duration-300">
                            <img src="<?= $member['photo'] ?>" alt="<?= $member['name'] ?>" class="w-36 h-36 rounded-full mb-4 object-cover border-4 border-yellow-400">
                            <p class="font-bold text-lg text-center mb-1"><?= $member['name'] ?></p>
                            <p class="text-yellow-400 text-sm mb-1 text-center"><?= $member['role'] ?></p>
                            <p class="text-gray-400 text-xs mb-2 text-center"><?= $member['year'] ?></p>
                            <p class="text-center text-white text-sm"><?= $member['bio'] ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>

            </div>


            <h1 class="text-white text-4xl font-extrabold text-center mb-6">THE TIMELINE</h1>
            <div class="flex flex-end flex-col gap-10 relative my-6">



                <div class="absolute left-1/2 w-1 bg-gray-800 top-0 bottom-0 -translate-x-1/2"></div>

                <?php foreach ($timeline as $item): ?>
                    <div class="group relative flex flex-col items-center">
                        <div class="w-6 h-6 bg-yellow-400 rounded-full border-4 border-gray-900 group-hover:scale-125 transition"></div>
                        <p class="text-white text-center mt-2">
                            <?= $item["year"] ?> - <?= $item["title"]  ?>
                        </p>

                        <div class="absolute text-white  opacity-0 group-hover:opacity-100 transition-opacity bottom-full mb-2 bg-gray-700 w-[50%] text-center px-7 py-2 rounded-xl">
                            <?= $item["text"] ?>

                        </div>


                    </div>
                <?php endforeach; ?>



            </div>
        </div>
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