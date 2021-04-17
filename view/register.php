<?php include ('header.php'); 
?>
<?php if (isset($_SESSION['userid'])){ ?>
    <h3> Thank you for registering, <?php echo $_SESSION['userid'];?>. </h3>  <br>
    <p><a href='.'>Return Home</a>
    
<?php    
}
else { ?>
    <form method="get" action="." >
    <label>First Name:</label>
    <input type="hidden" name="action" value="register">
    <input type="text" placeholder="" name="firstname"><br><br>
    <button type="submit">Register</button>
</form>
<?php } ?>



