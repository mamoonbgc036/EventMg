<?php include ROOT . '/app/views/layout/header.php'; ?>

<div class="container my-2">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg">
                <div class="card-header text-center bg-primary text-white">
                    <h4>Register</h4>
                </div>
                <div class="card-body">
                    <form action="/EventMg/store" method="POST">
                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="email"
                                placeholder="Enter your email">
                            <?php echo isset($_SESSION['errors']['email']) ? '<p style="color: red;">' . $_SESSION['errors']['email'] . '</p>' : null ?>
                            <?php echo isset($_SESSION['duplicate']['email']) ? '<p style="color: red;">' . $_SESSION['duplicate']['email'] . '</p>' : null ?>
                        </div>
                        <!-- Name -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Enter your name">
                            <?php echo isset($_SESSION['errors']['name']) ? '<p style="color: red;">' . $_SESSION['errors']['name'] . '</p>' : null ?>
                        </div>
                        <!-- Phone Number -->
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="tel" name="phone" class="form-control" id="phone"
                                placeholder="Enter your phone number">
                            <?php echo isset($_SESSION['errors']['phone']) ? '<p style="color: red;">' . $_SESSION['errors']['phone'] . '</p>' : null ?>
                            <?php echo isset($_SESSION['duplicate']['phone']) ? '<p style="color: red;">' . $_SESSION['duplicate']['phone'] . '</p>' : null ?>
                        </div>
                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="password"
                                placeholder="Enter your password">
                            <?php echo isset($_SESSION['errors']['password']) ? '<p style="color: red;">' . $_SESSION['errors']['password'] . '</p>' : null ?>
                        </div>
                        <!-- Role -->
                        <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <select class="form-select" name="role_id" id="role_id">
                                <option value="" selected>Choose a role</option>
                                <option value="2">Editor</option>
                                <option value="3">Viewer</option>
                            </select>
                            <?php echo isset($_SESSION['errors']['role_id']) ? '<p style="color: red;">' . $_SESSION['errors']['role_id'] . '</p>' : null ?>
                        </div>
                        <!-- Submit Button -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary w-100">Register</button>
                        </div>
                        <!-- Login Link -->
                        <div class="text-center mt-3">
                            <a href="/EventMg/login" class="text-decoration-none">Already have an account? Login</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include ROOT . '/app/views/layout/footer.php'; ?>