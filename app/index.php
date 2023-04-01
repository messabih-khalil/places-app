<?php
    $places=require __DIR__ . '../../places/controllers/GET_ALL.php';

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

    <script type="module" src="../static/js/map.js"></script>

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
                    <button>
                        <a href="../auth/authentication/index.php">Login</a>
                    </button>
                    <!-- Show only when the user is logged in -->
                    <!-- <button>Logout</button> -->
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



                <div class="box">
                    <!-- image -->
                    <div class="image-box">
                        <img src="https://picsum.photos/200" alt="" />
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
                        <i class="ri-message-2-line" id="open_popup"></i>
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
            <i class="ri-close-circle-line" id="close_popup"></i>
            <p>Comments</p>
            <div class="popup-body">
                <div class="comments">
                    <!-- Comment box -->
                    <div class="comment-box">
                        <!-- image -->
                        <div class="avatar-image">
                            <img src="https://picsum.photos/200" alt="" />
                        </div>
                        <!--  -->
                        <div class="comment-data">
                            <div class="user-info">
                                <p>Messabih Alaa</p>
                                <span>18 march 2022</span>
                            </div>

                            <p>
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ea
                                voluptatibus tenetur veniam reiciendis corrupti dolorum
                                nesciunt architecto reprehenderit.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Comment input -->

                <div class="comment-input">
                    <input type="text" placeholder="Share your thoughts ..." />
                    <i class="ri-send-plane-fill"></i>
                </div>
            </div>
        </div>
    </section>
    <!-- js files -->

    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCpakLUvHTl6mvACuX2Qo3ZEjDMs9VjO8o&callback=initMap&v=weekly"
        defer></script>

    <!-- <script src="../static/js/popup.js"></script> -->

    <script>
    const searchByName = async (e) => {
        const inputValue = document.getElementById("place_name");
        let placesBox = document.querySelector(".boxes")
        let searchPlaces = ``;
        if (inputValue.value !== '') {

            await $.ajax({
                    type: 'GET',
                    url: `http://localhost/places_app/places/controllers/GET_BY_NAME.php?place_name=${inputValue.value}`,

                    success: (data) => {
                        data = JSON.parse(data)

                        data.map((e) => {
                            console.log(e);
                            searchPlaces += `
                           <div class="box">
                    <!-- image -->
                    <div class="image-box">
                        <img src="https://picsum.photos/200" alt="" />
                    </div>
                    <!-- place details -->
                    <div class="place-details">
                        <!-- title -->
                        <p class="title">${e.name}</p>
                        <!-- description -->
                        <p class="description">
                        ${e.description}
                        </p>

                        <!-- comment button -->
                        <i class="ri-message-2-line" id="open_popup"></i>
                    </div>
                </div>
                           `
                        })
                        placesBox.innerHTML = searchPlaces
                    }

                },

            )
        }

    }

    document.getElementById("search_button").addEventListener('click', searchByName)


    // // Filter by category
    // const searchByCategory = (e) => {
    //     var e = document.getElementById("ddlViewBy");
    //     var value = e.value;
    //     if (value !== '') {

    //         $.ajax({
    //                 type: 'GET',
    //                 url: `http://localhost/places_app/places/controllers/GET_BY_CATEGORY.php?place_category=${value}`,

    //                 success: (data) => {
    //                     data = JSON.parse(data)

    //                     data.map((e) => {
    //                         // Push data to html
    //                         document.getElementById("category_result").innerHTML += JSON.stringify(
    //                             e)
    //                     })

    //                     console.log(data);
    //                 }
    //             },

    //         )
    //     }
    // }

    // document.getElementById("search_button_category").addEventListener('click', searchByCategory)
    </script>
</body>

</html>