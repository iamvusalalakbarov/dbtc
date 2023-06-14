<?php

if (isset($_POST["submit"])) {
  $firstName = $_POST["firstName"];
  $lastName = $_POST["lastName"];
  $email = $_POST["email"];
  $message = $_POST["message"];

  $query = $db->prepare(
    "INSERT INTO messages SET
    firstName = ?,
    lastName = ?,
    email = ?,
    message = ?"
  );
  $insert = $query->execute([$firstName, $lastName, $email, $message]);

  header("Location:home");
}

?>

<main class="contact">
  <h1>Contact Us</h1>

  <form method="POST">
    <input type="text" placeholder="First Name" name="firstName" required />

    <input type="text" placeholder="Last Name" name="lastName" required />

    <input type="email" placeholder="E-mail" name="email" required />

    <textarea placeholder="Your message..." name="message" required></textarea>

    <input type="hidden" name="submit" value="1" />

    <button type="submit">Send</button>
  </form>
</main>