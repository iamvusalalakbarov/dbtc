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
                </tr>
                <?php foreach ($brokenChains as $chain) : ?>
                    <tr>
                        <td><?php echo $chain["chainName"]; ?></td>
                        <td><?php echo $chain["startDate"]; ?></td>
                        <td><?php echo $chain["length"]; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    </main>

<?php endif; ?>