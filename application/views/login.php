<!-- application/views/login.php -->
<!DOCTYPE html>
<html>
<head>
    <title>User Login</title>
</head>
<body>
    <h2>User Login</h2>
    <?php echo form_open('auth/login'); ?>
    <p>
        <label for  = "email">Email:</label>
        <input type = "email" name = "email" required>
    </p>
    <p>
        <label for  = "password">Password:</label>
        <input type = "password" name = "password" required>
    </p>
    <p>
        <input type = "submit" value = "Login">
    </p>
    <?php echo form_close(); ?>
</body>
</html>
