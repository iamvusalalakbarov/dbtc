<main class="sign-up">
  <h3>Sign Up</h3>

  <form method="POST">
    <label for="first-name">
      <span>First Name</span>
      <input
        type="text"
        id="first-name"
        name="first-name"
        placeholder="Enter your first name"
        required
      />
    </label>

    <label for="last-name">
      <span>Last Name</span>
      <input
        type="text"
        id="last-name"
        name="last-name"
        placeholder="Enter your last name"
        required
      />
    </label>

    <label for="email">
      <span>Email</span>
      <input
        type="email"
        id="email"
        name="email"
        placeholder="Enter your email address"
        required
      />
    </label>

    <label for="username">
      <span>Username</span>
      <input
        type="text"
        id="username"
        name="username"
        placeholder="Define a username"
        required
      />
    </label>

    <label for="password">
      <span>Password</span>
      <input
        type="password"
        id="password"
        name="password"
        placeholder="Define a password"
        required
      />
    </label>

    <label for="password2">
      <span>Password</span>
      <input
        type="password"
        id="password2"
        name="password2"
        placeholder="Repeat your password"
        required
      />
    </label>

    <input type="hidden" name="submit" value="1" />

    <button type="submit">Sign Up</button>
  </form>
</main>
