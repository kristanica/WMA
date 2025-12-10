<?php
// Ensure getALbum only run once
session_start();
include_once "php/getAlbum.php";
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
    <title>Album</title>
    <link rel="stylesheet" href="scroll.css">
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

<body class="min-h-screen min-w-screen bg-[#1c151a] text-white">


    <div class="fixed inset-0 bg-[url(./assets/optimized-logo-gif.webp)] opacity-30 -z-10 "></div>

    <div class="fixed top-5 left-0 right-0 flex justify-between px-10  gap-3 z-10">
        <div class="flex flex-col gap-5">
            <a class="cursor-pointer text-sm hover:underline tracking-[15px] " href="dashboard.php">HOME</a>
            <a class="cursor-pointer text-sm hover:underline tracking-[15px] " href="album.php">ALBUM</a>
            <a class="cursor-pointer text-sm hover:underline tracking-[15px] " href="tracks.php">TRACKS</a>
            <a class="cursor-pointer text-sm hover:underline tracking-[15px] " href="allReleases.php">ALL RELEASES</a>
            <a class="cursor-pointer text-sm hover:underline tracking-[15px] " href="comments.php">COMMENTS</a>
        </div>
        <div class="flex flex-col gap-5 items-end">

            <!-- Checks wether user is login -->
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
        <img src="./assets/optimized-logo-gif.webp" class="h-24 w-24 fixed top-10 z-2 inset-50">
        <p class="text-center font-exo tracking-widest">From first track to last hit—All Paramore.</p>
    </header>


    <main>


        <div id="albums" class=" overflow-x-auto py-10 px-5 grid grid-cols-1 md:grid-cols-2 gap-10">


            <!-- Retrieves the filtered Albums from getAlbum.php -->
            <!-- Loops through filteredAlbums as album -->
            <?php foreach ($filteredAlbums as $album): ?>
                <div class="albumContent  grid grid-cols-1">
                    <img class=" mx-auto h-64 object-cover" src="<?= $album["image"] ?>" alt="<?= $album['name'] ?>">


                    <div class="p-4 flex flex-row justify-between items-center mx-[80px]">
                        <div>
                            <!-- Displays the name of the year -->
                            <h1 class=" text-white my-2 font-exo tracking-widest font-bold uppercase"><?= $album["name"] ?></h1>
                            <p class="text-gray-300 text-sm font-exo font-light  text-xs"> <?= $album["year"] ?></p>

                        </div>
                        <!-- Button for expanding -->
                        <button class="moreButton w-10 rounded-full bg-[#1c151a] border border-[#ffffff6e]"> ˅ </button>

                    </div>
                    <!-- Display additional information when button preesed-->

                    <div class="albumDetails  max-h-0 overflow-hidden transition-all duration-500 mx-[60px]">
                        <p class="text-gray-300 text-sm text-justify font-exo"><?= $album["about"] ?></p>
                        <p class="text-red-300 text-sm text-center font-exo"><?= $album["playCount"] ?></p>
                        <p class="text-gray-200 text-[10px] text-center font-exo">PLAYCOUNT</p>

                    </div>
                </div>

            <?php endforeach; ?>
        </div>
    </main>



    <!-- Simple footer -->
    <footer class="bg-black">
        <div class="grid grid-cols-3 py-5">
            <div class="flex flex-col justify-center items-center">
                <img src="./assets/optimized-logo-gif.webp" class="h-24 w-24">

            </div>
            <div class="flex flex-col justify-center">
                <a class="cursor-pointer text-sm hover:underline" href="dashboard.php">HOME</a>
                <a class="cursor-pointer text-sm hover:underline" href="album.php">ALBUM</a>
                <a class="cursor-pointer text-sm hover:underline" href="tracks.php">TRACKS</a>
                <a class="cursor-pointer text-sm hover:underline" href="allReleases.php">ALL RELEASES</a>
                <a class="cursor-pointer text-sm hover:underline" href="comments.php">COMMENTS</a>
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
                    <!-- Prints year -->
                    © <?= date("Y") ?> Paramore Fan Page — For educational use only.
                </p>
            </div>
        </div>


    </footer>
    <script>
        // Byutton expand logic
        const moreButton = document.querySelectorAll(".moreButton")
        moreButton.forEach((item, index) => {
            item.addEventListener("click", () => {
                const albumDetails = document.querySelectorAll(".albumDetails");

                let isOpen = false;
                albumDetails[index].classList.toggle("max-h-0", !isOpen);
                isOpen = albumDetails[index].classList.toggle("max-h-[500px]");

                item.textContent = isOpen ? "˄" : "˅";

            })
        })
    </script>
</body>

</html>