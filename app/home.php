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
</head>

<body>
    <h1>Home Page</h1>
    <a href="../auth/logout.php">Logout</a>

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>



    <?php foreach($places as $place): ?>

    <h2>All Places</h2>
    <tr>
        <td class="noBorder">
            name : <?= $place["name"] ?>
        </td>

        <br>
        <td class="noBorder">

            description : <?= $place["description"] ?>
        </td>
    </tr>
    <?php endforeach; ?>

    <h2>
        Search place
    </h2>

    <div>
        <input type="text" name="place_name" id="place_name">
        <button id="search_button">
            Search
        </button>

        <div>
            <h3>Search Result : </h3>
            <div id="result">

            </div>
        </div>
    </div>

    <h2>
        Search by category
    </h2>

    <div>
        <select id="ddlViewBy">
            <option value="1">Restaurnat</option>
            <option value="3">Stadium</option>
        </select>

        <button id="search_button_category">
            Search
        </button>

        <div id="category_result"></div>
    </div>
    <script>
    const searchByName = (e) => {
        const inputValue = document.getElementById("place_name");

        if (inputValue.value !== '') {

            $.ajax({
                    type: 'GET',
                    url: `http://localhost/places_app/places/controllers/GET_BY_NAME.php?place_name=${inputValue.value}`,

                    success: (data) => {
                        data = JSON.parse(data)

                        data.map((e) => {
                            // Push data to html
                            document.getElementById("result").innerHTML += JSON.stringify(e)
                        })
                    }
                },

            )
        }
    }

    document.getElementById("search_button").addEventListener('click', searchByName)


    // Filter by category
    const searchByCategory = (e) => {
        var e = document.getElementById("ddlViewBy");
        var value = e.value;
        if (value !== '') {

            $.ajax({
                    type: 'GET',
                    url: `http://localhost/places_app/places/controllers/GET_BY_CATEGORY.php?place_category=${value}`,

                    success: (data) => {
                        data = JSON.parse(data)

                        data.map((e) => {
                            // Push data to html
                            document.getElementById("category_result").innerHTML += JSON.stringify(
                                e)
                        })

                        (data);
                    }
                },

            )
        }
    }

    document.getElementById("search_button_category").addEventListener('click', searchByCategory)
    </script>
</body>

</html>