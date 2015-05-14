<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Sign Up - TCMC</title>
</head>
<body>
<h1>Membership Registration Form</h1>
<form id="signUp" action="" method="post">
    <h3>Personal Details: </h3>
    <p>
        <label for="fName">First Name: </label>
        <input type="text" id="fName" name="fName">
    </p>
    <p>
        <label for="lName">Last Name: </label>
        <input type="text" id="lName" name="lName">
    </p>
    <p>
        <label for="dayPhone">Day Phone: </label>
        <input type="text" id="dayPhone" name="dayPhone">
    </p>
    <p>
        <label for="afterHoursPhone">After hours Phone: </label>
        <input type="text" id="afterHoursPhone" name="afterHoursPhone">
    </p>
    <p>
        <label for="mobile">Mobile: </label>
        <input type="text" id="mobile" name="mobile">
    </p>
    <p>
        <label for="email">Email: </label>
        <input type="text" id="email" name="email">
    </p>
    <p>
        <label for="address">Postal Address: </label>
        <textarea id="address" name="address"></textarea>
    </p>
    <h3>Create Account</h3>
    <p>
        <label for="userName">User Name: </label>
        <input type="text" id="userName" name="userName" placeholder="Email address only">
    </p>
    <p>
        <label for="password">Password: </label>
        <input type="text" id="password" name="password">
    </p>
    <input type="submit" name="submit" id="signUp" value="Sign Up">
</form>
</body>
</html>