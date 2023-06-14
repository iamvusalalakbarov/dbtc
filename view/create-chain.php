<?php

if (isset($_POST["submit"]) && isset($_SESSION["username"])) {
    $chainName = $_POST["chainName"];
    $isPublic = $_POST["isPublic"];
    $startDate = date("Y-m-d");

    $query = $db->prepare("SELECT userID FROM users WHERE username = ?");
    $query->execute([$_SESSION["username"]]);
    $user = $query->fetch(PDO::FETCH_ASSOC);
    $userID = $user["userID"];

    $query = $db->prepare(
        "INSERT INTO chains SET
        chainName = ?,
        isPublic = ?,
        startDate = ?,
        userID = ?,
        isActive = 1,
        length = 0,
        currentDayStatus = 0"
      );
      $insert = $query->execute([$chainName, $isPublic, $startDate, $userID]);

      header("Location:home");
}

?>

<main class="create-chain">
    <h3>Create New Chain</h3>

    <form method="POST">
        <label for="chainName">
            <span>Chain Name</span>
            <input type="text" id="chainName" name="chainName" placeholder="Name your chain" required />
        </label>

        <div class="radio">
            <label for="public">
                <input type="radio" id="public" name="isPublic" value="1" required />
                <span>Public</span>
            </label>

            <label for="private">
                <input type="radio" id="private" name="isPublic" value="0" required />
                <span>Private</span>
            </label>
        </div>

        <input type="hidden" name="submit" value="1" />

        <button type="submit">Create</button>
    </form>
</main>