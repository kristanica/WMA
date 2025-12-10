<?php
session_start();

include_once "php/CRUD/retrieveComment.php";
include_once "php/CRUD/editComment.php";
include_once "php/CRUD/deleteComment.php";

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
    <link href="https://fonts.googleapis.com/css2?family=Exo:wght@100..900&display=swap" rel="stylesheet">
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
    <div class="fixed inset-0 bg-[url(./assets/optimized-logo-gif.webp)] opacity-20 -z-10"></div>

    <!-- Navigation -->
    <div class="fixed top-5 left-0 right-0 flex justify-between px-10 gap-3 z-10">
        <div class="flex flex-col gap-5">
            <a class="cursor-pointer text-sm hover:underline tracking-[15px]" href="dashboard.php">HOME</a>
            <a class="cursor-pointer text-sm hover:underline tracking-[15px]" href="album.php">ALBUM</a>
            <a class="cursor-pointer text-sm hover:underline tracking-[15px]" href="tracks.php">TRACKS</a>
            <a class="cursor-pointer text-sm hover:underline tracking-[15px]" href="allReleases.php">ALL RELEASES</a>
            <a class="cursor-pointer text-sm hover:underline tracking-[15px]" href="comments.php">COMMENTS</a>
        </div>

        <div class="flex flex-col gap-5 items-end">
            <?php if (isset($_SESSION["id"])): ?>
                <form method="post">
                    <button type="submit" name="logout"
                        class="cursor-pointer text-sm hover:underline tracking-[15px]">LOG OUT</button>
                </form>
            <?php else: ?>
                <a class="cursor-pointer text-sm hover:underline tracking-[15px]" href="register.php">REGISTER</a>
                <a class="cursor-pointer text-sm hover:underline tracking-[15px]" href="login.php">LOGIN</a>
            <?php endif; ?>
        </div>
    </div>

    <header class="h-[20vh] flex flex-col justify-end items-center text-center relative">
        <img src="./assets/optimized-logo-gif.webp" class="h-24 w-24 fixed top-10 z-10">
        <p class="text-center tracking-widest mt-2">From first track to last hit—All Paramore.</p>
    </header>

    <main>



        <div class="min-h-screen flex justify-center items-center flex-col gap-10">
            <div class="w-[80%] h-64 overflow-hidden">
                <img src="./assets/images/concert.jpg" class="w-full h-full object-cover px-2">
            </div>
            <!-- COMMENTS LOOP -->
            <?php foreach ($comment as $comm): ?>
                <div class="comment-card bg-[#2a1f33] rounded-2xl p-6 w-[80%]">
                    <div class="flex flex-col md:flex-row md:justify-between items-start relative mb-2">

                        <div>
                            <p class="text-yellow-400 font-extrabold text-lg">
                                <?= htmlspecialchars($comm["username"]) ?>
                            </p>
                            <p class="text-gray-400 text-sm"><?= htmlspecialchars($comm["email"]) ?></p>
                        </div>

                        <div>
                            <?php if (isset($_SESSION["id"]) && $_SESSION["id"] == $comm["user_id"]): ?>
                                <button class="edit-btn bg-yellow-400 text-black px-3 py-1 rounded"
                                    data-comment-id="<?= $comm['comment_id'] ?>">
                                    EDIT
                                </button>

                                <button class="dlt-btn bg-red-400 text-black px-3 py-1 rounded"
                                    data-comment-id="<?= $comm['comment_id'] ?>">
                                    DELETE
                                </button>
                            <?php endif; ?>
                        </div>

                    </div>

                    <!-- Comment Text -->
                    <p class="comment-text text-white text-md leading-relaxed">
                        <?= htmlspecialchars($comm["comment"]) ?>
                    </p>
                </div>
            <?php endforeach; ?>
        </div>

    </main>

    <!-- EDIT MODAL -->
    <div id="editCommentModal"
        class="fixed inset-0 bg-black bg-opacity-70 backdrop-blur-sm flex justify-center items-center hidden z-50">
        <div class="bg-[#2a1f33] p-8 rounded-xl w-[90%] max-w-md text-center relative">
            <h2 class="text-xl font-bold text-red-400 mb-4">EDIT COMMENT</h2>

            <button onclick="closeEditModal()" class="absolute top-3 right-3 text-white text-xl">&times;</button>

            <form method="post">
                <input type="hidden" name="comment_id" id="editCommentID">
                <input type="text" name="editComment" id="editCommentInput"
                    class="text-black w-full p-2 rounded">
                <button type="submit" name="updateComment"
                    class="bg-green-500 text-white px-4 py-2 rounded mt-3 w-full">SAVE</button>
            </form>
        </div>
    </div>

    <!-- DELETE MODAL -->
    <div id="deleteModal"
        class="fixed inset-0 bg-black bg-opacity-70 backdrop-blur-sm flex justify-center items-center hidden z-50">

        <div class="bg-[#2a1f33] p-8 rounded-xl w-[90%] max-w-md text-center">
            <h2 class="text-xl font-bold text-red-400 mb-4">Confirm Delete</h2>

            <form method="post">
                <input type="hidden" name="deleteCommentId" id="deleteCommentID">
                <button type="submit" name="deleteComment"
                    class="bg-red-500 text-white px-6 py-2 rounded-lg hover:bg-red-600 transition">
                    YES, DELETE
                </button>
                <button type="button" id="cancelDelete"
                    class="ml-4 bg-gray-500 text-white px-6 py-2 rounded-lg hover:bg-gray-600 transition">
                    CANCEL
                </button>
            </form>
        </div>
    </div>

    <!-- FOOTER -->
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
                <h2 class="font-semibold tracking-wider">FOLLOW PARAMORE</h2>
                <div class="flex justify-center md:justify-start gap-4 text-xl">
                    <a class="hover:text-red-400 transition">🎵</a>
                    <a class="hover:text-red-400 transition">📸</a>
                    <a class="hover:text-red-400 transition">▶️</a>
                </div>
            </div>
        </div>
    </footer>


    <script>
        // EDIT BUTTON
        document.querySelectorAll('.edit-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                let id = btn.getAttribute('data-comment-id');
                let commentText = btn.closest('.comment-card').querySelector('.comment-text').innerText;

                document.getElementById("editCommentID").value = id;
                document.getElementById("editCommentInput").value = commentText;

                document.getElementById("editCommentModal").classList.remove("hidden");
            });
        });

        function closeEditModal() {
            document.getElementById("editCommentModal").classList.add("hidden");
        }

        // DELETE BUTTON
        document.querySelectorAll('.dlt-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                let id = btn.getAttribute('data-comment-id');
                document.getElementById("deleteCommentID").value = id;

                document.getElementById("deleteModal").classList.remove("hidden");
            });
        });

        document.getElementById("cancelDelete").addEventListener("click", () => {
            document.getElementById("deleteModal").classList.add("hidden");
        });
    </script>

</body>

</html>