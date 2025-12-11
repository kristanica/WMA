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


        .overlay {
            background: rgba(0, 0, 0, 0.5);
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

<body class="bg-gray-900 min-h-screen relative overflow-hidden">


    <div class="absolute inset-0 bg-scroll bg-[url('./assets/riot.jpg')]"></div>

    <div class="absolute inset-0 overlay"></div>


    <main class="relative z-10 flex flex-col items-center justify-center min-h-screen text-center px-6">

        <img src="./assets/paramore-icon.png" class="w-32 md:w-48 mb-6 ">

        >
        <h1 class="text-orange-500 text-5xl md:text-6xl lg:text-7xl font-paramore font-extrabold tracking-wider mb-4 drop-shadow-lg">
            PARAMORE
        </h1>


        <p class="text-white max-w-xl text-sm md:text-base lg:text-lg leading-relaxed mb-6 drop-shadow-md">
            <?php echo $aboutParamore["bio"]["summary"] ?>
        </p>


        <a href="dashboard.php"
            class="bg-white text-gray-900 font-bold px-8 py-3 rounded-xl shadow-lg hover:scale-105 hover:shadow-2xl transition-transform duration-200">
            CONTINUE
        </a>
    </main>



</body>

</html>