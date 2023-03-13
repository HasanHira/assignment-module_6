<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>User Registration Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="container">
        <h1>User Registration Form</h1>
        <form action="register.php" method="POST" enctype="multipart/form-data">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" placeholder="Your name here" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Your valid email address" required>

            <label for="password">Password:</label>
            <input type="password" id="password" placeholder="Type a password" name="password" required>

            <label for="profile_pic">Profile Picture:</label>
            <input type="file" id="profile_pic" name="profile_pic" accept=".jpg, .jpeg, .png,.gif" required>

            <button type="submit" value="Submit">Submit</button>
        </form>
    </div>
</body>
</html>