<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Don't Break The Chain</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./view/css/style.css" />
</head>

<body>
    <header>
        <div class="logo">
            <a href="home">DBTC</a>
        </div>

        <nav>
            <ul>
                <li>
                    <a href="home">Home</a>
                </li>
                <li>
                    <a href="broken-chains">Broken Chains</a>
                </li>
                <li>
                    <a href="leaderboard">Leaderboard</a>
                </li>
                <li>
                    <a href="about">About</a>
                </li>
                <li>
                    <a href="contact">Contact</a>
                </li>
            </ul>
        </nav>

        <?php if (isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"]) : ?>
            <div class="log-buttons">
                <div class="user-info"><?php echo $_SESSION["username"]; ?></div>
                <a href="log-out">Log Out</a>
            </div>
        <?php else : ?>
            <div class="log-buttons">
                <a href="log-in">Log In</a>
                <a href="sign-up">Sign Up</a>
            </div>
        <?php endif; ?>
    </header>