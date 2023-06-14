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

if (isset($_POST["delete"])) {
    $id = $_POST["delete"];

    $query = $db->prepare(
        "DELETE FROM chains
        WHERE chainID = ?"
    );
    $delete = $query->execute([$id]);

    header("Location:home");
}

if (isset($_POST["submit"])) {
    print_r($_POST["checkboxes"]);
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
                        <th>Chain Name</th>
                        <?php
                        $date = new DateTime();
                        $date->sub(new DateInterval("P10D"));
                        ?>
                        <?php for ($i = 10; $i > 0; $i--) : ?>
                            <th class="date">
                                <?php $date->add(new DateInterval("P1D")); ?>
                                <div class="month"><?php echo $date->format("F"); ?></div>
                                <div class="day"><?php echo $date->format("d"); ?></div>
                            </th>
                        <?php endfor; ?>
                        <th>Length</th>
                        <th>Deletion</th>
                    </tr>
                    <?php foreach ($activeChains as $chain) : ?>
                        <tr>
                            <td><?php echo $chain["chainName"]; ?></td>
                            <?php
                            $date = new DateTime();
                            $date->sub(new DateInterval("P10D"));
                            $currentDate = new DateTime($chain["startDate"]);
                            $currentDate->add(new DateInterval("P{$chain["length"]}D"));
                            $startDate = new DateTime($chain["startDate"]);
                            ?>
                            <?php for ($i = 9; $i > 0; $i--) : ?>
                                <td>
                                    <?php
                                    $date->add(new DateInterval("P1D"));
                                    $isCrossed = (($startDate <= $date) && ($date <= $currentDate));
                                    ?>
                                    <label <?php echo $isCrossed ? "class='crossed'" : ""; ?>></label>
                                </td>
                            <?php endfor; ?>
                            <td class="last-day">
                                <?php
                                $date->add(new DateInterval("P1D"));
                                $isCrossed = (($startDate <= $date) && ($date <= $currentDate));
                                ?>
                                <label id="last-day-label" <?php echo $isCrossed ? "class='crossed'" : ""; ?>>
                                    <input type="checkbox" name="checkboxes[]" onclick="toggleLabel()">
                                </label>
                            </td>
                            <td><?php echo $chain["length"]; ?></td>
                            <td>
                                <form method="POST">
                                    <input type="hidden" name="delete" value="<?php echo $chain["chainID"]; ?>">
                                    <button type="delete"><i class="fas fa-trash-alt"></i></button>
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

        <a href="create-chain" class="create-chain-link">Create New Chain</a>
    </main>

<?php endif; ?>

<script>
    function toggleLabel() {
        const label = document.getElementById("last-day-label");
        label.classList.toggle("crossed");
    }
</script>