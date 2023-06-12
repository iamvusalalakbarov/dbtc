<?php

if (isset($_SESSION["loggedIn"]) && isset($_SESSION["username"])) {
    $query = $db->prepare("SELECT * FROM users WHERE username = ?");
    $insert = $query->execute([$_SESSION["username"]]);
    $user = $query->fetch(PDO::FETCH_ASSOC);
    $userID = $user["userID"];

    $query = $db->prepare("SELECT * FROM chains WHERE userID = ?");
    $insert = $query->execute([$userID]);
    $chains = $query->fetchAll(PDO::FETCH_ASSOC);
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

        <a href="#">Get Started</a>
    </main>

<?php else : ?>

    <main class="chains">
        <h1><?php echo $_SESSION["username"]; ?>'s Chains</h1>

        <?php if (count($chains) > 0) : ?>
            <table>
                <tr>
                    <td></td>
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
                </tr>
                <?php foreach ($chains as $chain) : ?>
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
                            <input type="checkbox" name=<?php echo $chain["chainName"]; ?>>
                            <span <?php echo ($chainDate >= $date) ? "class='crossed'" : ""; ?>></span>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    </main>

<?php endif; ?>