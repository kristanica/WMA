<?php
include_once "php/CRUD/retrieveComment.php"; // Fetch comments

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comments</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Exo:ital,wght@0,100..900;1,100..900&family=Jersey+10&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        exo: ['"Exo"', 'sans-serif'],
                    },
                },
            },
        };
    </script>
</head>

<body class="min-h-screen min-w-screen bg-[#1c151a] text-white font-exo">

    <!-- Background logo -->
    <div class="fixed inset-0 bg-[url(./assets/optimized-logo-gif.webp)] opacity-20 -z-10"></div>

    <!-- Sidebar / Navigation -->
    <div class="ml-10 mt-5 flex flex-col fixed gap-3 z-10">
        <a class="cursor-pointer text-sm hover:underline" href="dashboard.php">HOME</a>
        <a class="cursor-pointer text-sm hover:underline" href="album.php">ALBUM</a>
        <a class="cursor-pointer text-sm hover:underline" href="tracks.php">TRACKS</a>
        <a class="cursor-pointer text-sm hover:underline" href="allReleases.php">ALL RELEASES</a>
        <a class="cursor-pointer text-sm hover:underline" href="comments.php">COMMENTS</a>
    </div>

    <!-- Header -->
    <header class="h-[20vh] flex flex-col justify-end items-center text-center relative">
        <img src="./assets/optimized-logo-gif.webp" class="h-24 w-24 fixed top-10 z-10">
        <p class="text-center font-exo tracking-widest mt-2">From first track to last hit—All Paramore.</p>
    </header>

    <main class="">


        <!-- Display Comments -->
        <div class="min-h-screen flex justify-center items-center flex-col gap-10">

            <?php foreach ($comment as $comm): ?>
                <div class="bg-[#2a1f33] rounded-2xl p-6 w-[80%]">
                    <div class="flex flex-col  md:justify-between items-start  mb-2">
                        <p class="text-yellow-400 font-extrabold text-lg"><?= htmlspecialchars($comm["name"]) ?></p>
                        <p class="text-gray-400 text-sm"><?= htmlspecialchars($comm["email"]) ?></p>
                    </div>
                    <p class="text-white text-md leading-relaxed"><?= htmlspecialchars($comm["comment"]) ?></p>
                </div>
            <?php endforeach; ?>

        </div>

    </main>

    <!-- Footer -->
    <footer class="bg-black mt-10">
        <div class="grid grid-cols-3 py-5 px-5">
            <div class="flex flex-col justify-center items-center">
                <img src="./assets/optimized-logo-gif.webp" class="h-24 w-24">
            </div>
            <div class="flex flex-col justify-center">
                <a class="cursor-pointer text-sm hover:underline" href="dashboard.php">HOME</a>
                <a class="cursor-pointer text-sm hover:underline" href="album.php">ALBUM</a>
                <a class="cursor-pointer text-sm hover:underline" href="tracks.php">TRACKS</a>
                <a class="cursor-pointer text-sm hover:underline" href="allReleases.php">ALL RELEASES</a>
            </div>
            <div class="flex flex-col justify-center text-center md:text-left space-y-3">
                <h2 class="text-white font-semibold tracking-wider font-exo">FOLLOW PARAMORE</h2>
                <div class="flex justify-center md:justify-start gap-4 text-xl">
                    <a class="hover:text-red-400 transition">🎵</a>
                    <a class="hover:text-red-400 transition">📸</a>
                    <a class="hover:text-red-400 transition">▶️</a>
                </div>
                <p class="text-sm text-gray-400 font-exo">Updates, concerts, announcements & more.</p>
            </div>
            <div class="col-span-3 text-center border-t border-gray-700 pt-5 mt-5">
                <p class="text-gray-500 text-xs font-exo">
                    © <?= date("Y") ?> Paramore Fan Page — For educational use only.
                </p>
            </div>
        </div>
    </footer>

</body>

</html>