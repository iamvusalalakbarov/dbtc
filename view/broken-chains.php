<?php

if (isset($_SESSION["loggedIn"]) && isset($_SESSION["username"])) {
    $query = $db->prepare("SELECT * FROM users WHERE username = ?");
    $insert = $query->execute([$_SESSION["username"]]);
    $user = $query->fetch(PDO::FETCH_ASSOC);
    $userID = $user["userID"];

    $query = $db->prepare("SELECT * FROM chains WHERE userID = ? AND isActive = 0");
    $insert = $query->execute([$userID]);
    $brokenChains = $query->fetchAll(PDO::FETCH_ASSOC);
}

if (isset($_POST["delete"])) {
    $id = $_POST["delete"];

    $query = $db->prepare(
        "DELETE FROM chains
        WHERE chainID = ?"
    );
    $delete = $query->execute([$id]);

    header("Location:home");
}

?>

<?php if (!isset($_SESSION["loggedIn"]) || !$_SESSION["loggedIn"]) : ?>

    <main class="home">
        <h1>Don't Break The Chain!</h1>

        <div>
            <img src="view/img/logo.png" alt="Logo" />
            <p>
                <b>Log In</b> to view your chains. If you don't have an account yet,
                <b>Sign Up</b> and create chains to get a progress on new habits!
            </p>
        </div>

        <a href="sign-up">Get Started</a>
    </main>

<?php else : ?>

    <main class="chains">
        <h1><?php echo $_SESSION["username"]; ?>'s Broken Chains</h1>

        <?php if (count($brokenChains) > 0) : ?>
            <table>
                <tr>
                    <th>Chain Name</th>
                    <th>Start Date</th>
                    <th>Length</th>
                    <th>Deletion</th>
                </tr>
                <?php foreach ($brokenChains as $chain) : ?>
                    <tr>
                        <td><?php echo $chain["chainName"]; ?></td>
                        <td><?php echo $chain["startDate"]; ?></td>
                        <td><?php echo $chain["length"]; ?></td>
                        <td>
                            <form method="POST">
                                <input type="hidden" name="delete" value="<?php echo $chain["chainID"]; ?>">
                                <button type="submit"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else : ?>
            <p>You don't have any broken chains.</p>
        <?php endif; ?>
    </main>

<?php endif; ?>