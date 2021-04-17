<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zippy's</title>
    <link rel="stylesheet" type="text/css" href="view/main.css">
</head>
<body>
<header><h1>Zippy's Used Auto<h1></header>

<?php if (!isset($_SESSION['userid']) && $action != "register" && $action !="logout"){?>
    <p><a href=".?action=register"> Register Here </a></p>    
<?php    
}
else if (isset($_SESSION['userid']) && $action != "register" && $action != "logout"){  ?>
<h3> Welcome, <?php echo $_SESSION['userid'] ?>. </h3><br>
   <p><a href=".?action=logout">Logout</a></p>    
<?php } else { } ?>




