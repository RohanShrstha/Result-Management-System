<?php if (isset($error)) { ?>
    <p style="color:red;"><?php echo $error; ?></p>
<?php } ?>

<form action="/rms/user/login" method="POST">
    <label for="name">Username:</label>
    <input type="text" name="name" required>
    <br>
    <label for="password">Password:</label>
    <input type="password" name="password" required>
    <br>
    <input type="submit" value="Login">
</form>
