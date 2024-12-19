<?php
session_start();
?>
<h1>Article Show</h1>
<p><strong>Title:   </strong> <?= $data['title']   ; ?></p>
<p><strong>Content: </strong> <?= $data['content'] ; ?></p>
<p><strong>Author:  </strong> <?= $data['user_id'].'  '.$data['author_name'] ; ?></p>
<p><strong>Create Date: </strong> <?= date('Y-m-d', strtotime($data['created_at'])); ?></p>

<?php if (isset($_SESSION['userid']) && $data['user_id'] == $_SESSION['userid']): ?>
    <a href="?controller=article&function=edit&id=<?= $data['id']; ?>" class="btn">Edit</a>

<form action="?controller=article&function=delete" method="post">
    <input type="hidden" name="id" value="<?= $data['id']; ?>">
    <input type="submit" value="Delete" class="btn-danger">
</form>
<?php endif; ?>
<a href="javascript:history.back()" class="btn-back">Back</a>

