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
