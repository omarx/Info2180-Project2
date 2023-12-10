<?php include 'header.php'; ?>
<link href="./assets/css/login.css" rel="stylesheet"/>


<h2>Login</h2>
<form method="post">
    <div class="login">
        <label for="username" hidden="hidden">Login</label><br/>
        <input type="text" id="username" aria-label="username" name="username" placeholder="Email address"/><br/>
        <label for="password" hidden="hidden">Password</label>
        <input type="password" id="password" name="password" aria-label="password" placeholder="Password"/><br/>
        <button type="submit"><i class="fa fa-lock" aria-hidden="true"></i> Login</button>
    </div>
</form>

<footer>
    Copyright &copy; 2023 Dolphin CRM
</footer>