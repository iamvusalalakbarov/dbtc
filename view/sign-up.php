<?php

if (isset($_POST["submit"])) {
  $firstName = $_POST["firstName"];
  $lastName = $_POST["lastName"];
  $email = $_POST["email"];
  $username = $_POST["username"];
  $password = $_POST["password"];
  $password2 = $_POST["password2"];

  if ($password == $password2) {
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $users = $db->query("SELECT email, username FROM users")->fetchAll(PDO::FETCH_ASSOC);

    $isUnique = true;

    foreach ($users as $user) {
      if ($user["email"] == $email || $user["username"] == $username) {
        $isUnique = false;
        break;
      }
    }

    if ($isUnique) {
      $query = $db->prepare(
        "INSERT INTO users SET
        firstName = ?,
        lastName = ?,
        email = ?,
        username = ?,
        password = ?"
      );
      $insert = $query->execute([$firstName, $lastName, $email, $username, $hashedPassword]);

      header("Location:log-in");
    } else {
      echo "<script>alert('The username or email address is already exist!');</script>";
    }
  } else {
    echo "<script>alert('Passwords are not same!');</script>";
  }
}

?>

<main class="sign-up">
  <h3>Sign Up</h3>

  <form method="POST">
    <label for="firstName">
      <span>First Name</span>
      <input type="text" id="firstName" name="firstName" placeholder="Enter your first name" required />
    </label>

    <label for="lastName">
      <span>Last Name</span>
      <input type="text" id="lastName" name="lastName" placeholder="Enter your last name" required />
    </label>

    <label for="email">
      <span>Email</span>
      <input type="email" id="email" name="email" placeholder="Enter your email address" required />
    </label>

    <label for="username">
      <span>Username</span>
      <input type="text" id="username" name="username" placeholder="Define a username" required />
    </label>

    <label for="password">
      <span>Password</span>
      <input type="password" id="password" name="password" placeholder="Define a password" required />
    </label>

    <label for="password2">
      <span>Password</span>
      <input type="password" id="password2" name="password2" placeholder="Repeat your password" required />
    </label>

    <input type="hidden" name="submit" value="1" />

    <button type="submit">Sign Up</button>
  </form>
</main>