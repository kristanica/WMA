<?php
include_once "php/CRUD/register.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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

<body class="min-h-screen min-w-screen bg-[#1c151a] text-white flex-col font-exo flex justify-center items-center">

    <div class="fixed inset-0 bg-[url(./assets/Register-bg.gif)] opacity-30 -z-10 bg-center bg-cover"></div>

    <main class="w-[25%]">

        <img src="./assets/optimized-logo-gif.webp" class="h-24 w-24 mx-auto">

        <form method="post" class=" bg-[#1d171c] rounded-xl mt-2 p-2 border-yellow-400/40 border">

            <div class="py-5 border-b border-yellow-400/40 ">

                <h1 class="my-2 text-center font-bold text-3xl text-yellow-400">PARAMORE</h1>
                <p class="text-center font-exo tracking-widest text-xs">All the albums. All the hits. All Paramore.</p>
            </div>
            <div class="my-2">
                <label class="pl-2 text-white font-semibold text-yellow-400">USERNAME:</label> <br>
                <div class="py-2 px-2">
                    <input class="w-full px-4 py-2 rounded-lg bg-[#1c151a] text-white border border-yellow-400/40 " name="username" type="text" required>
                </div>
            </div>

            <div class="my-2">
                <label class="pl-2 text-white font-semibold text-yellow-400">EMAIL:</label> <br>
                <div class="py-2 px-2">
                    <input class="w-full px-4 py-2 rounded-lg bg-[#1c151a] text-white border border-yellow-400/40 " name="email" type="email" required>
                </div>
            </div>
            <div class="my-2">
                <label class="pl-2 text-white font-semibold text-yellow-400">PASSWORD:</label> <br>
                <div class="py-2 px-2">
                    <input class="w-full px-4 py-2 rounded-lg bg-[#1c151a] text-white border border-yellow-400/40 " name="password" type="password" required>
                </div>
            </div>
            <div class="my-2">
                <label class="pl-2 text-white font-semibold text-yellow-400">CONFIRM PASSWORD:</label> <br>
                <div class="py-2 px-2">
                    <input class="w-full px-4 py-2 rounded-lg bg-[#1c151a] text-white border border-yellow-400/40 " name="confirmPassword" type="password" required>
                </div>
            </div>

            <div class="text-center">
                <button type="submit" name="register" class="bg-yellow-400 text-[#1c151a] px-6 py-2 rounded-lg hover:bg-yellow-500 font-semibold transition">SUBMIT</button>
            </div>
        </form>

    </main>


</body>

</html>