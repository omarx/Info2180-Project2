<?php
session_start(); // Move session_start to the top
include 'header.php';
include './utils/connection.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username']; // Assuming username is the email
    $password = $_POST['password'];

    // Prepare SQL statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM Users WHERE email = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Verify the password
        if (password_verify($password, $row['password'])) {
            // Set session variables
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $row['firstname'];
            $_SESSION['userid'] = $row['id'];

            // Reset login attempt
            $_SESSION['login_attempt'] = '';

            // Redirect to dashboard.php
            header("Location: dashboard.php");
            exit;
        } else {
            // Set session variable for login attempt
            $_SESSION['login_attempt'] = 'fail';
        }
    } else {
        // Set session variable for login attempt
        $_SESSION['login_attempt'] = 'fail';
    }

    $stmt->close();
}
$conn->close();
?>

<link href="./assets/css/login.css" rel="stylesheet"/>

<h2>Login</h2>
<form method="post" id="loginForm" data-login-attempt="<?php echo isset($_SESSION['login_attempt']) ? $_SESSION['login_attempt'] : ''; ?>">
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
