<?php
session_start();
?>

<h1>Article List</h1>

<div class="table-container">
<table>
    <thead>
        <tr>
            <th>Title</th>
            <th>Content</th>
            <th>Create Date</th>
            <th>Author</th>
            <th>Show</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($data['articles'] as $article): ?>
        <tr>
            <td><?= htmlspecialchars($article['title']); ?></td>
            <td><?= htmlspecialchars(substr($article['content'], 0, 100)); ?></td>
            <td><?= date('Y-m-d', strtotime($article['created_at'])); ?></td>
            <td><?= htmlspecialchars($article['user_id']) . ' - ' . htmlspecialchars($article['author_name']); ?></td>
            <td><a href="?controller=article&function=show&id=<?= $article['id']; ?>" class="btn">Show</a></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</div>
<?php 
if (isset($_SESSION['userid'])): ?>    
<br><br>
<a href="?controller=article&function=create" class="btn">Create New Article</a>
<?php endif; ?>
