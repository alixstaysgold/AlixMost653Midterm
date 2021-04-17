<?php

include ('admin_header.php');

?>


<form method="post" action="." >
    <input type="hidden" name="action" value="register">
    <label>Username:</label>
    <input type="text" placeholder="" name="username"><br><br>
    <label>Password:</label>
    <input type="text" placeholder="" name="password"><br><br>
    <label>Confirm Password:</label>
    <input type="text" placeholder="" name="confirm_password"><br><br>
    <button type="submit">Register</button>
</form>

<p><a href=".">Back Home</a></p>
