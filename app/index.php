<?php
    $places=require __DIR__ . '../../places/controllers/GET_ALL.php';
    // Start the session
    session_start();

    // Check if user_id is set in session
    $user_id = $_SESSION['user_id'] ?? null;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <!-- Link files -->
    <link rel="stylesheet" href="../static/css/home.css" />
    <!-- Link font -->

    <!-- Link icon package -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet" />
    <!-- Map config -->
    <script script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

    <!-- <script type="module" src="../static/js/map.js"></script> -->

    <style></style>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
</head>

<body>
    <!-- Left side -->
    <section class="left-side">
        <!-- floating image -->
        <img class="floating-image" src="../static/imgs/map.png" alt="" />
        <!--  -->
        <div class="top-part">
            <!-- navbar -->
            <nav>
                <!-- logo -->
                <span>TnesCity</span>
                <!-- user action -->
                <div class="user-action">
                    <?php if ($user_id): ?>

                    <a href="../auth/logout.php">Logout</a>
                    <a href="../auth/register-middleware.php">Dashboard</a>
                    <?php else: ?>


                    <a href="../auth/authentication/index.php">Login</a>
                    <?php endif; ?>
                </div>
            </nav>

            <!-- Header Text -->

            <h1>
                Embark on an Adventure and Discover <br />
                the Best Hidden Gems and Must-See
                <br />
                Attractions in This City
            </h1>

            <!-- Search part -->

            <div class="search-part">
                <!-- search input -->
                <div class="search-box">
                    <input type="text" placeholder="Search for an place" id="place_name" />
                    <i class="ri-search-2-line" id="search_button"></i>
                </div>
            </div>
        </div>

        <!-- Places boxes -->

        <div class="places">
            <p>Places :</p>

            <!-- boxes -->
            <div class="boxes">

                <?php foreach($places as $place): ?>



                <div class="box" onclick="showMap(<?= $place['lat'] ?> , <?= $place['lng'] ?>)">
                    <!-- image -->
                    <div class="image-box">
                        <img src="<?= $place['image_path'] ?>" alt="">
                    </div>
                    <!-- place details -->
                    <div class="place-details">
                        <!-- title -->
                        <p class="title"><?= $place["name"] ?></p>
                        <!-- description -->
                        <p class="description">
                            <?= $place["description"] ?>
                        </p>

                        <!-- comment button -->
                        <i class="ri-message-2-line" id="open_popup" onclick="showComments(<?= $place['id'] ?>)"></i>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <!-- AIzaSyCpakLUvHTl6mvACuX2Qo3ZEjDMs9VjO8o -->

    <!-- Right side -->
    <section class="right-side">
        <div class="right-div-section">
            <div id="map"></div>
        </div>
    </section>

    <!-- Popup -->

    <section class="popup hide-popup" id="popup">
        <div class="popup-overlay">
            <i class="ri-close-circle-line" id="close_popup" onclick="closePopup()"></i>
            <p>Comments</p>
            <div class="popup-body">
                <div class="comments">
                    <!-- Comment box -->
                </div>

                <!-- Comment input -->
                <?php if ($user_id): ?>

                <div class="comment-input">
                    <input type="text" placeholder="Share your thoughts ..." id="comment_input" name="comment_text" />
                    <i class="ri-send-plane-fill" onclick="addComment()"></i>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <!-- js files -->

    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCpakLUvHTl6mvACuX2Qo3ZEjDMs9VjO8o&callback=initMap&v=weekly"
        defer></script>

    <!-- <script src="../static/js/popup.js"></script> -->

    <script src="../static/js/home.js">

    </script>
</body>

</html>