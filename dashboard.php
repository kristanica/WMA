<?php
session_start();

include_once "php/getArtist.php"; // $aboutParamore, $members, $formerMembers, $timeline
include_once "php/hardCodedInfo.php";
include_once "php/CRUD/createComment.php"; // handle comment submission


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
    <title>Dashboard</title>
    <link rel="stylesheet" href="scroll.css">
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
    <!-- Background -->
    <div class="fixed inset-0 bg-[url(./assets/optimized-logo-gif.webp)] opacity-30 -z-10 "></div>

    <!-- Navigation -->
    <div class="fixed top-5 left-0 right-0 flex justify-between px-10 gap-3 z-10">
        <div class="flex flex-col gap-5">
            <a href="dashboard.php" class="cursor-pointer text-sm hover:underline tracking-[15px]">HOME</a>
            <a href="album.php" class="cursor-pointer text-sm hover:underline tracking-[15px]">ALBUM</a>
            <a href="tracks.php" class="cursor-pointer text-sm hover:underline tracking-[15px]">TRACKS</a>
            <a href="allReleases.php" class="cursor-pointer text-sm hover:underline tracking-[15px]">ALL RELEASES</a>
            <a href="comments.php" class="cursor-pointer text-sm hover:underline tracking-[15px]">COMMENTS</a>
        </div>
        <div class="flex flex-col gap-5 items-end">
            <?php if (isset($_SESSION["id"])): ?>
                <form method="post">
                    <button type="submit" name="logout" class="cursor-pointer text-sm hover:underline tracking-[15px]">LOG OUT</button>
                </form>
            <?php else: ?>
                <a href="register.php" class="cursor-pointer text-sm hover:underline tracking-[15px]">REGISTER</a>
                <a href="login.php" class="cursor-pointer text-sm hover:underline tracking-[15px]">LOGIN</a>
            <?php endif; ?>
        </div>
    </div>

    <main class="mt-32">
        <!-- Hero Section -->
        <div class="relative text-white min-w-screen min-h-screen flex justify-center items-center flex-col text-center px-5">
            <img src="./assets/optimized-logo-gif.webp" class="w-40 h-40 mb-3">
            <p class="text-xs mt-2">Explore the band's albums, tracks, and their journey</p>
        </div>

        <!-- Divider -->
        <div class="min-w-screen h-[1px] bg-white opacity-50 my-10 mx-5"></div>

        <!-- About Paramore -->
        <div id="about" class="w-[70%] mx-auto">
            <h1 class="text-4xl font-bold mb-3">PARAMORE</h1>
            <div class="w-full h-32 overflow-hidden">
                <img src="./assets/images/concert.jpg" class="w-full h-full object-cover">
            </div>
            <p class="text-justify mt-3"><?php echo $aboutParamore["bio"]["content"]; ?></p>
        </div>

        <!-- Members -->
        <div class="w-[70%] mx-auto mt-10">
            <h1 class="text-4xl font-extrabold mb-5">MEMBERS</h1>
            <div class="flex flex-wrap gap-8 my-10 px-5">
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

        <!-- Former Members -->
        <div class="w-[70%] mx-auto mt-10">
            <h1 class="text-4xl font-extrabold mb-5">FORMER MEMBERS</h1>
            <div class="flex flex-wrap gap-8 my-10 px-5">
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

        <!-- Timeline -->
        <h1 class="text-white text-4xl font-extrabold text-center mb-6 mt-10">THE TIMELINE</h1>
        <div class="flex flex-end flex-col gap-10 relative my-6 w-[70%] mx-auto">
            <div class="absolute left-1/2 w-1 bg-gray-800 top-0 bottom-0 -translate-x-1/2"></div>
            <?php foreach ($timeline as $item): ?>
                <div class="group relative flex flex-col items-center">
                    <div class="w-6 h-6 bg-yellow-400 rounded-full border-4 border-gray-900 group-hover:scale-125 transition"></div>
                    <p class="text-white text-center mt-2"><?= $item["year"] ?> - <?= $item["title"] ?></p>
                    <div class="absolute text-white opacity-0 group-hover:opacity-100 transition-opacity bottom-full mb-2 bg-gray-700 w-[50%] text-center px-7 py-2 rounded-xl">
                        <?= $item["text"] ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Comment Form -->
        <form method="post" class="bg-[#1e1e1e] w-[70%] mx-auto my-5 py-6 px-5 rounded-xl">
            <div class="mb-4">
                <label class="pl-2 text-yellow-400 font-semibold">COMMENT:</label>
                <div class="px-2 mt-2">
                    <textarea name="comment" required class="w-full px-4 py-2 h-32 rounded-lg bg-[#1c151a] text-white border border-yellow-400"></textarea>
                </div>
            </div>
            <?php if (isset($_SESSION["id"])): ?>
                <div class="text-center">
                    <button type="submit" name="createComment" class="bg-yellow-400 text-[#1c151a] px-6 py-2 rounded-lg hover:bg-yellow-500 font-semibold transition">SUBMIT</button>
                </div>
            <?php else: ?>
                <p class="text-center bg-yellow-400 text-[#1c151a] px-6 py-2 rounded-lg hover:bg-yellow-500 font-semibold transition">LOGIN FIRST TO CREATE A COMMENT</p>
            <?php endif; ?>
        </form>


        <div class="w-[70%] mx-auto my-10 bg-[#1e1e1e] p-8 rounded-xl text-white shadow-lg" id="quizContainer">
            <h1 class="text-4xl font-extrabold text-center mb-6">PARAMORE QUIZ</h1>

            <?php if (isset($_SESSION["id"])): ?>
                <p id="quizQuestion" class="text-center text-yellow-400 mb-8 text-lg md:text-xl font-semibold"></p>

                <form id="quizForm" class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                        <?php foreach (['a', 'b', 'c', 'd'] as $key): ?>
                            <div data-option="<?= $key ?>" class="quiz-option cursor-pointer bg-[#2c2c2c] hover:bg-yellow-500 hover:text-black transition-colors duration-200 rounded-lg p-4 text-center font-medium shadow-md select-none">
                                <span class="mr-2 font-bold"><?= strtoupper($key) ?>.</span>
                                <span id="choice-<?= $key ?>"></span>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </form>
            <?php else: ?>
                <p class="text-center bg-yellow-400 text-[#1c151a] px-6 py-2 rounded-lg hover:bg-yellow-500 font-semibold transition">LOGIN FIRST TO CREATE A COMMENT</p>
            <?php endif; ?>
            <div id="quizResult" class="mt-6 text-center text-xl font-bold hidden"></div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-black mt-10">
        <div class="grid grid-cols-3 py-5">
            <div class="flex flex-col justify-center items-center">
                <img src="./assets/optimized-logo-gif.webp" class="h-24 w-24">
            </div>
            <div class="flex flex-col justify-center">
                <a href="dashboard.php" class="cursor-pointer font-exo text-sm hover:underline">HOME</a>
                <a href="album.php" class="cursor-pointer font-exo text-sm hover:underline">ALBUM</a>
                <a href="tracks.php" class="cursor-pointer font-exo text-sm hover:underline">TRACKS</a>
                <a href="allReleases.php" class="cursor-pointer font-exo text-sm hover:underline">ALL RELEASES</a>
            </div>
            <div class="flex flex-col justify-center text-center md:text-left space-y-3">
                <h2 class="text-white font-semibold tracking-wider">FOLLOW PARAMORE</h2>
                <div class="flex justify-center md:justify-start gap-4 text-xl">
                    <a href="#" class="hover:text-red-400 transition">🎵</a>
                    <a href="#" class="hover:text-red-400 transition">📸</a>
                    <a href="#" class="hover:text-red-400 transition">▶️</a>
                </div>
                <p class="text-sm text-gray-400">Updates, concerts, announcements & more.</p>
            </div>
            <div class="col-span-3 text-center border-t border-gray-700 pt-5 mt-5">
                <p class="text-gray-500 text-xs">© <?= date("Y") ?> Paramore Fan Page — For educational use only.</p>
            </div>
        </div>
    </footer>

    <script>
        let correctAnswer;
        let answered;
        async function loadQuiz() {
            const res = await fetch("php/generateQuestion.php");
            const data = await res.json();
            correctAnswer = data.correctAnswer;
            document.getElementById("quizQuestion").textContent = data.question;
            ['a', 'b', 'c', 'd'].forEach(key => {
                document.getElementById("choice-" + key).textContent = data[key];
                const optionDiv = document.querySelector(`[data-option="${key}"]`);
                optionDiv.classList.remove("bg-green-500", "bg-red-500", "text-black", "text-white");
            });
            document.getElementById("quizResult").classList.add("hidden");
            answered = false;
        }

        loadQuiz();

        document.querySelectorAll(".quiz-option").forEach(option => {
            option.addEventListener("click", () => {
                if (answered) return;
                answered = true;
                const selected = option.getAttribute("data-option");
                const resultDiv = document.getElementById("quizResult");

                if (selected === correctAnswer) {
                    option.classList.add("bg-green-500", "text-white");

                } else {
                    option.classList.add("bg-red-500", "text-white");
                    document.querySelector(`[data-option="${correctAnswer}"]`).classList.add("bg-green-500", "text-white");

                }
                setTimeout(loadQuiz, 1500);

            });
        });
    </script>
</body>

</html>