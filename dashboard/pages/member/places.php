<?php
  include '../../../auth/authorization/member.php';
  $places=require __DIR__ . '../../../../places/controllers/GET_PLACES_BY_USERID.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="../../../static/css/style.css" />
    <link rel="stylesheet" href="../../../static/css/modifyStyle.css" />
    <!-- <link rel="stylesheet" href="./static/css/home.css"> -->
    <title>Tenescity | Places</title>
    <!-- <script type="module" src="../../../static/js/map.js"></script> -->
    <style>
    #map,
    #map2 {
        height: 100%;
        width: 100%;
    }
    </style>
</head>

<body>
    <header class="header">
        <div class="left-header">
            <div class="logo">
                <h3>TenesCity</h3>
                <p>Member Page</p>
            </div>
            <div class="nav">
                <a class="places" id="active" href="">places</a>
            </div>
        </div>
        <div class="profile">
            <a href="../../../auth/logout.php">Logout</a>
        </div>
    </header>
    <div class="table-container">
        <div class="page-title">
            <h2>Manage your own places</h2>
        </div>

        <div class="table">
            <table>
                <thead>
                    <tr>
                        <th class="first-cell">name</th>
                        <th>description</th>
                        <th>lat</th>
                        <th>lng</th>
                        <th>Image</th>
                        <th></th>
                        <th class="last-cell">
                            <input type="button" value="Add place" id="open_popup"
                                onclick="popupAction('addPlace' , '')" />
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($places as $place): ?>


                    <tr class=" table-row ">
                        <td class="first-cell" id="place-name"><?= $place["name"] ?></td>
                        <td id="place-description"><?= $place["description"] ?></td>
                        <td>
                            <?= $place["lat"] ?>
                        </td>
                        <td>
                            <?= $place["lng"] ?>
                        </td>
                        <td></td>
                        <td><a href="/places_app/places/controllers/DELETE_PLACE.php?place_id=<?=$place["id"]?>"
                                class="delete">Delete</a>
                        </td>
                        <td class="last-cell"><a
                                onclick="popupAction('modifyPlace' , <?= $place['id'] ?> , 'modifyPlace')">Modify</a>
                        </td>

                    </tr>
                    <?php endforeach; ?>


                </tbody>
            </table>
        </div>
    </div>
    <!-- Add Place -->
    <div class="place-popup hide-popup popup" data-popup-name="addPlace">
        <div class="all-popups add-place">
            <h3>add place</h3>
            <form method="POST" action="/places_app/places/controllers/POST_PLACE.php" id="addPlaceForm">
                <input type="hidden" value="<?=$_SESSION["user_id"]?>" name="user_id">
                <div>
                    <label for="form_place-name">name</label>
                    <input type="text" id="form_place-name" class="text-input" name="name">
                </div>
                <div>
                    <label for="form_place-description">description</label>
                    <textarea name="description" id="form_place-description" class="text-input" cols="30"
                        rows="10"></textarea>
                </div>
                <div class="map-input">
                    <div id="map"></div>
                </div>
                <div class="buttons-section">
                    <input type="button" value="Cancel" id="close_popup" onclick="popupAction('addPlace' , '')">
                    <button id="addPlaceBtn">
                        Add
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modify Place -->
    <div class="place-popup hide-popup popup" data-popup-name="modifyPlace">
        <div class="all-popups add-place">
            <h3>Modify place</h3>
            <form method="POST" action="/places_app/places/controllers/UPDATE_PLACE.php" id="modifyPlaceForm">
                <input type="hidden" value="<?=$_SESSION["user_id"]?>" name="user_id">
                <div>
                    <label for="form_place-name">name</label>
                    <input type="text" id="form_place-name" class="text-input" name="name">
                </div>
                <div>
                    <label for="form_place-description">description</label>
                    <textarea name="description" id="form_place-description" class="text-input" cols="30"
                        rows="10"></textarea>
                </div>
                <div class="map-input">
                    <div id="map2"></div>
                </div>
                <div class="buttons-section">
                    <input type="button" value="Cancel" id="close_popup" onclick="popupAction('modifyPlace' , '')">
                    <button id="updatePlaceBtn">
                        Modify
                    </button>
                </div>
            </form>
        </div>
    </div>









    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCpakLUvHTl6mvACuX2Qo3ZEjDMs9VjO8o&callback=initMap&v=weekly"
        defer></script>
    <script src="../../../static/js/placeActions.js"></script>

    <script src="../../../static/js/popup.js"></script>
</body>

</html>