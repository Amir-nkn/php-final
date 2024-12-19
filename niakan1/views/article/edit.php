<?php
session_start();
?>
<h1>Article Edit</h1>
<form action="?controller=article&function=update" method="post">
    <input type="hidden" name="id" value="<?= $data['article']['id']; ?>">
    <label for="title">Title</label>
    <input type="text" name="title" id="title" 
           required pattern=".{5,100}" 
           title="Title must be between 5 and 100 characters."
           value="<?= htmlspecialchars($data['article']['title']); ?>">

    <label for="content">Content</label>
    <textarea name="content" id="content" rows="5" 
              required pattern=".{5,1000}" 
              title="Content must be between 5 and 1000 characters."><?= htmlspecialchars($data['article']['content']); ?></textarea>
    <label for="User ID">User ID</label>
    <input type="text" name="user_id" id="user_id" value="<?= htmlspecialchars($data['article']['user_id'].' - '.htmlspecialchars($data['article']['author_name'])); ?>" readonly>

    <label for="created_at">Date</label>
    <input type="text" name="created_at" id="created_at" required value="<?= date('Y-m-d', strtotime($data['article']['created_at'])); ?>">

    <input type="submit" value="Save">
</form>
<a href="javascript:history.back()" class="btn-back">Back</a>
