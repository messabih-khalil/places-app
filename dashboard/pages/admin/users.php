<?php
    // Get All users from db
    $users=require __DIR__ . '../../../controllers/admin_crud/GET_USERS.php';

    // print_r($users);
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
    <title>TenesCity | Users</title>
</head>

<body>
    <header class="header">
        <div class="left-header">
            <div class="logo">
                <h3>TenesCity</h3>
                <p>Admin Page</p>
            </div>
            <div class="nav">
                <a class="places" href="./places.php">places</a>
                <a class="users" id="active" href="">users</a>
            </div>
        </div>
        <div class="profile">
            <a href="../../../auth/logout.php">Logout</a>
        </div>
    </header>
    <div class="table-container">
        <div class="page-title">
            <h2>users</h2>
        </div>

        <div class="table">
            <table>
                <thead>
                    <tr>
                        <th class="first-cell">name</th>
                        <th>email</th>
                        <th>password</th>
                        <th>role</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($users as $user): ?>
                    <tr class="table-row">
                        <td id="user-name" class="first-cell"><?= $user["username"] ?></td>
                        <td id="user-email"><?= $user["email"] ?></td>
                        <td id="user-password">123456789</td>
                        <td class="role"><span id="user-role"><?= $user["role"] ?></span></td>
                        <td>
                            <a class="delete"
                                href="/places_app/dashboard/controllers/admin_crud/DELETE_USER.php?user_id=<?=$user["id"]?>">Delete</a>
                        </td>
                        <td class="last-cell">
                            <a onclick="popupAction('modifyUser' , <?= $user['id'] ?>)">Modify</a>
                        </td>
                    </tr>

                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>

    <!-- Update User popup -->
    <div class="place-popup hide-popup popup-to-modify" id="popup" data-popup-name="modifyUser">
        <div class="all-popups modify-user">
            <h3>modify user informations</h3>
            <form action="/places_app/dashboard/controllers/admin_crud/UPDATE_USER.php?user_id=<?=$user["id"]?>"
                id="modifyUser-form" method="POST
                ">
                <div>
                    <label for="change_user-name">name</label>
                    <input type="text" id="change_user-name" class="text-input" name="username">
                </div>
                <div>
                    <label for="change_user-email">email</label>
                    <input type="text" id="change_user-email" class="text-input" name="email">
                </div>
                <div>
                    <label for="change_user-password">Password</label>
                    <input type="password" id="change_user-password" class="text-input" name="password">
                </div>
                <div>
                    <label for="change_user-role">role: </label>
                    <select name="role" id="change_user-role" class="select-role">
                        <option value="admin">admin</option>
                        <option value="user">user</option>
                    </select>
                </div>
                <div class="buttons-section">
                    <input type="button" value="Cancel" id="close_modify-popup" onclick="popupAction('modifyUser')">
                    <div id="modifyUser-btn">
                        Modify
                    </div>
            </form>
        </div>
    </div>



    <script src="../../../static/js/popup.js"></script>
</body>

</html>