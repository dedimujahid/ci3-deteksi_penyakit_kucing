<!-- application/views/register.php -->
<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
</head>
<body>
    <h2>User Registration</h2>
    <?php echo form_open('auth/register'); ?>
    <p>
        <label for="username">Username:</label>
        <input type="text" name="username" required>
    </p>
    <p>
        <label for="email">Email:</label>
        <input type="email" name="email" required>
    </p>
    <p>
        <label for="password">Password:</label>
        <input type="password" name="password" required>
    </p>
    <p>
        <input type="submit" value="Register">
    </p>
    <?php echo form_close(); ?>
</body>
</html>
