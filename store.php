<?php


session_start();
include_once "php/CRUD/retrieveProducts.php";
if (isset($_POST["logout"])) {
    $_SESSION = [];
    session_destroy();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comments</title>
    <link rel="stylesheet" href="scroll.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Exo:ital,wght@0,100..900;1,100..900&family=Jersey+10&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/566c00e5db.js" crossorigin="anonymous"></script>

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

<body class="min-h-screen min-w-screen bg-[#1c151a] text-white font-exo relative">
    <!-- Background logo -->
    <div class="fixed inset-0 bg-[url(./assets/optimized-logo-gif.webp)] opacity-20 -z-10"></div>
    <!-- Sidebar / Navigation -->
    <div class="fixed top-5 left-0 right-0 flex justify-between px-10  gap-3 z-10">
        <div class="flex flex-col gap-5">
            <a class="cursor-pointer text-sm hover:underline tracking-[15px] " href="dashboard.php">HOME</a>
            <a class="cursor-pointer text-sm hover:underline tracking-[15px] " href="album.php">ALBUM</a>
            <a class="cursor-pointer text-sm hover:underline tracking-[15px] " href="tracks.php">TRACKS</a>
            <a class="cursor-pointer text-sm hover:underline tracking-[15px] " href="allReleases.php">ALL RELEASES</a>
            <a class="cursor-pointer text-sm hover:underline tracking-[15px] " href="comments.php">COMMENTS</a>
        </div>
        <div class="flex flex-col gap-5 items-end">
            <?php
            if (isset($_SESSION["id"])) {
            ?>
                <form method="post">
                    <button type="submit" name="logout" class="cursor-pointer text-sm hover:underline tracking-[15px] ">LOG OUT</button>
                </form>
            <?php } else { ?>
                <a class="cursor-pointer text-sm hover:underline tracking-[15px] " href="register.php">REGISTER</a>
                <a class="cursor-pointer text-sm hover:underline tracking-[15px] " href="login.php">LOGIN</a>
            <?php } ?>
        </div>
    </div>
    <header class="h-[20vh] flex flex-col justify-end items-center text-center relative">
        <img src="./assets/optimized-logo-gif.webp" class="h-24 w-24 fixed top-10 z-10">
        <p class="text-center font-exo tracking-widest mt-2">From first track to last hit—All Paramore.</p>
        <p class="text-center font-exo tracking-widest mt-2 text-red-500">This section is currently under Maintenance</p>

    </header>
    <main class="">
        <div class="grid grid-cols-2 mx-auto w-[90%]">
            <!-- Grain overlay -->
            <?php foreach ($prod as $merch): ?>
                <div class="">
                    <img src="./assets/images/merch/<?= $merch["name"] . ".webp" ?>" class="h-94 w-94 mx-auto">
                    <div class="pl-5">

                        <p class="tracking-[13px]"><?= $merch["name"] ?></p>
                        <p class="opacity-70 tracking-[5px] text-xs mt-2"><?= $merch["category"] ?></p>
                        <p><?= "£ " . $merch["price"] ?></p>
                        <button class="font-bold mx-auto mt-5 bg-white text-black px-7 py-2 text-center inline-block transition-colors hover:bg-black hover:text-white ease-in duration-200">
                            SOLD OUT
                        </button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>



        <i class="fa-solid fa-basket-shopping bottom-5 fixed right-5 text-4xl"></i>

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