<?php
session_start();
if (isset($_SESSION['error_msg'])) {
//  echo '<p style="color: red;">' . $_SESSION['error_msg'] . '</p>';
    $message = $_SESSION['error_msg'];    
    echo "<script> alert('".htmlspecialchars($message,ENT_QUOTES,'UTF-8')."'); </script>";
    unset($_SESSION['error_msg']);
}
?>

<h1>Edit User</h1>
<form action="?controller=user&function=update" method="post">
    <input type="hidden" name="id"  value="<?= $data['user']['id'];?>">
    <label for="name">Name</label>    
    <input type="text" name="name" id="name"
    value="<?= htmlspecialchars($data['user']['name']); ?>"
    required pattern="[A-Za-z\s]{2,25}"
    title="Name must be 2-25 letters and spaces only">
    <label for="email">email</label>
    <input type="email" name="email" id="email" value="<?= $data['user']['email'];?>">

    <label for="birth_date">Birth_date</label>
    <input type="date" name="birth_date" id="birth_date" value="<?= $data['user']['birth_date'];?>">

    <label for="password">Password</label>
    <input type="password" name="password" id="password" required minlength="8" title="Password must be at least 8 characters long">
    <label for="confirm_password">Confirm Password</label>
    <input type="password" name="confirm_password" id="confirm_password" required minlength="8" title="Please confirm your password">

    <input type="submit" value="save">
</form>
<a href="javascript:history.back()" class="btn-back">Back</a>
