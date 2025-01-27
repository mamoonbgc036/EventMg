<?php include ROOT . '/app/views/layout/header.php'; ?>
<div class="container my-2">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg">
                <div class="card-header text-center bg-primary text-white">
                    <h4>Login</h4>
                </div>
                <div class="card-body">
                    <form action="/EventMg/enter" method="POST">
                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="email"
                                placeholder="Enter your email">
                            <?php echo isset($_SESSION['errors']['email']) ? '<p style="color: red;">' . $_SESSION['errors']['email'] . '</p>' : null ?>
                            <?php
                            // if (isset($_SESSION['errors']['email'])) {
                            //     echo '<p style="color: red;">' . $_SESSION['errors']['email'] . '</p>';
                            // }
                            ?>
                        </div>
                        <!-- Name -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="password"
                                placeholder="Enter your password" required>
                        </div>
                        <!-- Role -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary w-100">Login</button>
                        </div>
                        <div class="text-center mt-3">
                            <a href="/EventMg/getRform" class="text-decoration-none">Have no account? Register</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include ROOT . '/app/views/layout/footer.php'; ?>