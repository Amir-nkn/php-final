<?php 
session_start();
if (!(isset($_SESSION['username']) && $_SESSION['username'] === 'admin')): 
    header('Location: ?controller=article&function=index');
    exit;
endif; 
?>
<h1>User List</h1>
<div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Birth_date</th>
                    <th>id</th>
                    <th>Show</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data as $row){
                    ?>
                <tr>
                    <td><?= $row['name'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td><?= $row['birth_date'] ?></td>
                    <td><?= $row['id'] ?></td>
                    <td><a href="?controller=user&function=show&id=<?= $row['id'] ?>" class="btn">Show</a></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
</div>
<?php 
if (isset($_SESSION['userid'])): ?>    
<br><br>
<a href="?controller=user&function=create" class="btn">Create New User</a>
<?php endif; ?>
