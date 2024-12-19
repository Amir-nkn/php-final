<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MVC</title>
    <link rel="stylesheet" href="resources/css/style.css">
</head>     
<body>
<nav>
    <ul>
        <li><a href="?controller=user&function=login">Login</a></li>
        <li><a href="?controller=article&function=index">Article List</a></li> 
        <li><a href="?controller=user&function=index">User List</a></li>
        <li><a href="?controller=user&function=logout">Logout</a></li>
        
      
        <?php if (isset($_SESSION['userid'])): ?>
        <li class="user-box">Welcome, <?= htmlspecialchars($_SESSION['userid']) . ' ' . htmlspecialchars($_SESSION['username']); ?></li>
        <?php endif; ?>
    </ul>
</nav>
<main>
    <?php echo $content; ?> 
</main>
<footer>
    Copyright 2024
</footer>
</body>
</html>
