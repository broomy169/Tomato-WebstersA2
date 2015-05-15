<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Sign Up - TCMC</title>
</head>
<body>
<h1>Membership Registration Form</h1>
<form id="signUp" action="signup_databaseProccess.php" method="post">
    <h3>Personal Details: </h3>
    <p>
        <label for="user_firstName">First Name: </label>
        <input type="text" id="user_firstName" name="user_firstName">
    </p>
    <p>
        <label for="user_lastName">Last Name: </label>
        <input type="text" id="user_lastName" name="user_lastName">
    </p>
    <p>
        <label for="user_phone">Day Phone: </label>
        <input type="text" id="user_phone" name="user_phone">
    </p>
    <p>
        <label for="user_phoneAfterHours">After hours Phone: </label>
        <input type="text" id="user_phoneAfterHours" name="user_phoneAfterHours">
    </p>
    <p>
        <label for="user_mobile">Mobile: </label>
        <input type="text" id="user_mobile" name="user_mobile">
    </p>
    <p>
        <input type="hidden" id="user_accessLevel" name="user_accessLevel" value="free">
    </p>
    <p>
        <label for="user_address">Postal Address: </label>
        <textarea id="user_address" name="user_address"></textarea>
    </p>
    <h3>Create Account</h3>
    <p>
        <label for="user_email">Email: </label>
        <input type="text" id="user_email" name="user_email" placeholder="Email address">
    </p>
    <p>
        <label for="user_password">Password: </label>
        <input type="text" id="user_password" name="user_password" placeholder="Enter password">
    </p>
    <input type="submit" name="submit" id="submit" value="Sign Up">
</form>
<h3><a href="../index.php">Go to home page</a></h3>

</body>
</html>