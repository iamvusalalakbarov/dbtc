<?php

$query = $db->query("SELECT chains.*, users.username FROM chains JOIN users ON chains.userID = users.userID WHERE isPublic = 1 AND length > 0 ORDER BY chains.length DESC");
$chains = $query->fetchAll(PDO::FETCH_ASSOC);

?>

<main class="leaderboard chains">
    <h1>Leaderboard</h1>

    <table>
        <tr>
            <th>#</th>
            <th>Chain Name</th>
            <th>Chain Owner</th>
            <th>Start Date</th>
            <th>Length</th>
        </tr>

        <?php foreach ($chains as $i => $chain) : ?>
            <tr>
                <td><?php echo $i + 1; ?></td>
                <td><?php echo $chain["chainName"]; ?></td>
                <td><?php echo $chain["username"]; ?></td>
                <td><?php echo $chain["startDate"]; ?></td>
                <td><?php echo $chain["length"]; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</main>