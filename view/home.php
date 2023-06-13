<?php

if (isset($_SESSION["loggedIn"]) && isset($_SESSION["username"])) {
    $query = $db->prepare("SELECT * FROM users WHERE username = ?");
    $insert = $query->execute([$_SESSION["username"]]);
    $user = $query->fetch(PDO::FETCH_ASSOC);
    $userID = $user["userID"];

    $query = $db->prepare("SELECT * FROM chains WHERE userID = ? AND isActive = 1");
    $insert = $query->execute([$userID]);
    $activeChains = $query->fetchAll(PDO::FETCH_ASSOC);
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
        <h1><?php echo $_SESSION["username"]; ?>'s Chains</h1>

        <?php if (count($activeChains) > 0) : ?>
            <form method="POST">
                <table>
                    <tr>
                        <td>Chain Name</td>
                        <?php
                        $date = new DateTime();
                        $date->sub(new DateInterval("P10D"));
                        ?>
                        <?php for ($i = 10; $i > 0; $i--) : ?>
                            <td>
                                <?php $date->add(new DateInterval("P1D")); ?>
                                <div class="month"><?php echo $date->format("F"); ?></div>
                                <div class="day"><?php echo $date->format("d"); ?></div>
                            </td>
                        <?php endfor; ?>
                        <td>Length</td>
                    </tr>
                    <?php foreach ($activeChains as $chain) : ?>
                        <tr>
                            <td><?php echo $chain["chainName"]; ?></td>
                            <?php
                            $date = new DateTime();
                            $date->sub(new DateInterval("P10D"));
                            $chainDate = new DateTime($chain["startDate"]);
                            $chainDate->add(new DateInterval("P{$chain["length"]}D"));
                            ?>
                            <?php for ($i = 9; $i > 0; $i--) : ?>
                                <td>
                                    <?php $date->add(new DateInterval("P1D")); ?>
                                    <span <?php echo ($chainDate >= $date) ? "class='crossed'" : ""; ?>></span>
                                </td>
                            <?php endfor; ?>
                            <td>
                                <?php $date->add(new DateInterval("P1D")); ?>
                                <label <?php echo ($chainDate >= $date) ? "class='crossed'" : ""; ?>>
                                    <input type="checkbox" name="">
                                </label>
                            </td>
                            <td><?php echo $chain["length"]; ?></td>
                            <td>
                                <form method="POST">
                                    <input type="hidden" name="delete" value="<?php echo $chain["chainID"]; ?>">
                                    <button type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
                <input type="hidden" name="submit" value="1">
                <button type="submit">Submit Changes</button>
            </form>
        <?php else : ?>
            <p>You don't have any active chains yet. Create new by clicking the link below.</p>
        <?php endif; ?>

        <a href="create-chain">Create Chain</a>
    </main>

<?php endif; ?>