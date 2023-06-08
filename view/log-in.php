<?php

if (isset($_POST["submit"])) {
  $username = $_POST["username"];
  $password = $_POST["password"];

  $users = $db->query("SELECT username, password FROM users")->fetchAll(PDO::FETCH_ASSOC);

  $isMatched = false;

  foreach ($users as $user) {
    if ($user["username"] == $username && password_verify($password, $user["password"])) {
      $isMatched = true;
      break;
    }
  }

  if ($isMatched) {
    $_SESSION["loggedIn"] = true;
    $_SESSION["username"] = $username;

    header("Location:home");
  } else {
    echo "<script>alert('Username and password does not matched.')</script>;";
  }
}

?>

<main class="log-in">
  <h3>Log In</h3>

  <form method="POST">
    <label for="username">
      <span>Username</span>
      <input
        type="text"
        id="username"
        name="username"
        placeholder="Enter username"
        required
      />
    </label>

    <label for="password">
      <span>Password</span>
      <input
        type="password"
        id="password"
        name="password"
        placeholder="Enter password"
        required
      />
    </label>

    <input type="hidden" name="submit" value="1" />

    <button type="submit">Log In</button>
  </form>
</main>
