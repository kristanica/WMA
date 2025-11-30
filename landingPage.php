<?php include_once "php/getArtist.php" ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paramore Landing</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes scroll-left {
            0% {
                background-position: 0 0;
            }

            100% {
                background-position: 500px 0;

            }
        }

        .bg-scroll {
            animation: scroll-left 30s linear infinite;
            background-repeat: repeat-x;
            background-size: cover;

        }
    </style>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'paramore': ['"DINWOS"', 'sans-serif']
                    }
                }
            }
        }
    </script>

</head>

<body class="bg-gray-900 min-h-screen min-w-screen relative">

    <div class="absolute inset-0 bg-scroll bg-[url('./assets/riot.jpg')]">
    </div>
    <main class="flex min-h-screen justify-center flex-col items-center relative z-1 text-center">

        <img src="./assets//paramore-icon.png">
        <h1 class="text-orange-500 text-6xl font-paramore  font-extrabold">PARAMORE</h1>

        <p class="text-white">
            <?php echo $aboutParamore["bio"]["summary"] ?>

        </p> <br>
        <a href="dashboard.php" class="bg-[#FFFFFF] border-gray-400 border-[2px] font-bold px-7 py-2 rounded-xl mt-2 hover:scale-105 transition-transform ease-in duration-200 ">
            CONTINUE
        </a>

    </main>

</body>

</html>