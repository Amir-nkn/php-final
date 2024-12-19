<?php
session_start();
if (isset($_SESSION['error_msg'])) {
//  echo '<p style="color: red;">' . $_SESSION['error_msg'] . '</p>';
    $message = $_SESSION['error_msg'];    
    echo "<script> alert('".htmlspecialchars($message,ENT_QUOTES,'UTF-8')."'); </script>";
    unset($_SESSION['error_msg']);
}
?>
<h1>Register New User</h1>
<form action="?controller=user&function=store" method="post">
    <label for="name">Name</label>    
    <input type="text" name="name" id="name" required pattern="[A-Za-z\s]{2,25}" title="Name must be between 2 and 25 characters and contain only letters and spaces">
    <label for="email">Email</label>
    <input type="email" name="email" id="email" required>

    <label for="birth_date">Birth Date</label>
    <input type="date" name="birth_date" id="birth_date" required >

    <label for="password">Password</label>
    <input type="password" name="password" id="password" required minlength="8" title="Password must be at least 8 characters long">
    <label for="confirm_password">Confirm Password</label>
    <input type="password" name="confirm_password" id="confirm_password" required minlength="8" title="Please confirm your password">
    <input type="submit" value="Save">
</form>
<a href="javascript:history.back()" class="btn-back">Back</a>
