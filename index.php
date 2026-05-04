<?php

use Task3\Session;

require_once 'session.php';
Session::start();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Session App</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container">

        <h2>Login Form</h2>

        <!-- Messages -->
        <?php if ($msg = Session::flash('success')): ?>
            <div class="success"><?= htmlspecialchars($msg) ?></div>
        <?php endif; ?>

        <?php if ($msg = Session::flash('error')): ?>
            <div class="error"><?= htmlspecialchars($msg) ?></div>
        <?php endif; ?>

        <!-- Form -->
        <form method="POST" action="store.php">
            <input type="text" name="username" placeholder="Enter username">
            <input type="password" name="password" placeholder="Enter password">
            <button class="btn-submit" type="submit" name="action" value="login">Submit</button>
        </form>

        <div class="actions">
            <form method="POST" action="store.php">
                <button class="btn-warning" name="action" value="remove">
                    Remove User
                </button>
                <form method="POST" action="store.php">
                    <button class="btn-danger" name="action" value="destroy">
                        Destroy Session
                    </button>

                </form>

                <!-- User -->
                <?php if (Session::has('user')):
                    $user = Session::getSession('user');
                ?>
                    <div class="user">
                        Welcome <h3><i><?= htmlspecialchars($user['username']) ?></i></h3>
                    </div>
                <?php endif; ?>

        </div>

</body>

</html>