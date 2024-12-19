<?php
session_start();
?>
<h1>Article Create</h1>
<form action="?controller=article&function=store" method="post">

    <label for="title">Title</label>
    <input type="text" name="title" id="title" 
           required pattern=".{5,100}" 
           title="Title must be between 5 and 100 characters.">
    
    <label for="content">Content</label>
    <textarea name="content" id="content" rows="5" 
              required pattern=".{5,1000}" 
              title="Content must be between 5 and 1000 characters."></textarea>
   
    <label for="author">Author</label>
    <input type="text" name="user_id" id="user_id" value="<?= isset($_SESSION['userid']) ? $_SESSION['userid'] : ''; ?>" readonly>
    
    <label for="created_at">Date</label>
    <input type="text" name="created_at" id="created_at" required value="<?= date('Y-m-d' ); ?>" readonly>


    <input type="submit" value="Save">
</form>
<a href="javascript:history.back()" class="btn-back">Back</a>
