<?php include '../layout/header.php'; ?>
<h2>Login</h2>
<form action="/login" method="POST">
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Login</button>
</form>
<?php include '../layout/footer.php'; ?>