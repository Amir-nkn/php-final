<h1>Show User Detalis</h1>
<p><strong>Name: </strong> <?= $data['name']; ?></p>
<p><strong>Email: </strong> <?= $data['email']; ?></p>
<p><strong>Birth_date: </strong> <?= $data['birth_date']; ?></p>
<a href="?controller=user&function=edit&id=<?= $data['id']; ?>" class="btn">Edit</a>
<form action="?controller=user&function=delete" method="post">
    <input type="hidden" name="id" value="<?= $data['id']; ?>">
    <input type="submit" value="Delete" class="btn-danger">
</form>
<a href="javascript:history.back()" class="btn-back">Back</a>
