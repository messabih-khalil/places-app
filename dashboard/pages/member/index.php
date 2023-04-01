<?php
  
  include '../../../auth/authorization/member.php';
  // die()
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
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
    <script>
    // Get user data before the page load
    $.ajax({
            type: 'GET',
            url: 'http://localhost/places_app/dashboard/controllers/member_crud/GET_ACCOUNT.php?user_id=<?=$_SESSION["user_id"]?>',

            success: (data) => {
                data = JSON.parse(data)
                document.getElementById("userData").innerHTML = `
                username : ${data.username}
                <br />
                email : ${data.email}
                <br />
                role : ${data.role}
                `
            }
        },

    )
    </script>

    <h1>Member page</h1>
    <div id="userData">

    </div>
    <br>
    <form action="http://localhost/places_app/dashboard/controllers/member_places_app/UPDATE_ACCOUNT.php" method="post">
        <input type="hidden" value="<?=$_SESSION["user_id"]?>" name="user_id">
        <input type="text" placeholder="username" name="username">
        <input type="email" placeholder="email" name="email">
        <input type="password" placeholder="password" name="password">
        <input type="submit" value="Update">
    </form>
    <br>
    <button>
        <a
            href="http://localhost/places_app/dashboard/controllers/member_places_app/DELETE_ACCOUNT.php?user_id=<?=$_SESSION["user_id"]?>">Delete
            Account</a>
    </button>
</body>

</html>