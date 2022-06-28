<?php
session_start();

require_once "Auth.php";
require_once "Util.php";

$auth = new Auth();
$db_handle = new DBController();
$util = new Util();

require_once "authCookieSessionValidate.php";

if (isset($_SESSION["locked"])) {
    $difference = time() - $_SESSION["locked"];
    if ($difference > 3) {
        unset($_SESSION["locked"]);
        unset($_SESSION["login_attempts"]);
        unset($_SESSION["error"]);
    }
}


if ($isLoggedIn) {
    $util->redirect("../menu.php");
}

if (!empty($_POST["login"])) {
    $isAuthenticated = false;

    $username = $_POST["member_name"];
    $password = $_POST["member_password"];
    $_SESSION["login_attempts"] = 0;
    $user = $auth->getMemberByUsername($username);
    if (isset($_SESSION["login_attempts"])) {
        if (isset($user[0]["member_password"]) > 0) {
            if (password_verify($password, $user[0]["member_password"])) {
                $isAuthenticated = true;
            } else {
                $_SESSION["login_attempts"] +=  1;
                $_SESSION["try"] = (3 - $_SESSION["login_attempts"]) . " more attempts";
                $_SESSION["invalid"] = "Invalid Password";
                if ($_SESSION["login_attempts"] > 2) {
                    $_SESSION["error"] = "There is an error";
                    $_SESSION["attempts"] = "Attempts limit reached";
                    unset($_SESSION["invalid"]);
                    unset($_SESSION["login_attempts"]);
                    unset($_SESSION["try"]);
                }
            }
        } else {
            $_SESSION["messages"] = "Username doesn't exist";
        }
    } else {
        $_SESSION["login_attempts"] = 0;
    }

    if ($isAuthenticated) {
        $_SESSION["member_id"] = $user[0]["member_id"];

        // Set Auth Cookies if 'Remember Me' checked
        if (!empty($_POST["remember"])) {
            setcookie("member_login", $username, $cookie_expiration_time);

            $random_password = $util->getToken(16);
            setcookie("random_password", $random_password, $cookie_expiration_time);

            $random_selector = $util->getToken(32);
            setcookie("random_selector", $random_selector, $cookie_expiration_time);

            $random_password_hash = password_hash($random_password, PASSWORD_DEFAULT);
            $random_selector_hash = password_hash($random_selector, PASSWORD_DEFAULT);

            $expiry_date = date("Y-m-d H:i:s", $cookie_expiration_time);

            // mark existing token as expired
            $userToken = $auth->getTokenByUsername($username, 0);
            if (!empty($userToken[0]["id"])) {
                $auth->markAsExpired($userToken[0]["id"]);
            }
            // Insert new token
            $auth->insertToken($username, $random_password_hash, $random_selector_hash, $expiry_date);
        } else {
            $util->clearAuthCookie();
        }
        unset($_SESSION["login_attempts"]);
        $util->redirect("../menu.php");
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@500;700&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../css/style.css">

    <style>
        #frmLogin {
            padding: 20px 40px 40px 40px;
            background: #5B4B8A;
            color: white;
            border-radius: 15px;
            width: 320px;
            /* box-shadow: 10px 10px 5px lightblue; */
            
        }

        .field-group {
            margin-top: 15px;
        }

        .input-field {
            padding: 12px 10px;
            width: 93%;
            border: grey 2px solid;
            border-radius: 2px;
            display: inline-block;
            margin-top: 5px;
        }

        .form-submit-button {
            background: #1B2430;
            border: 0;
            padding: 10px 0px;
            border-radius: 2px;
            color: white;
            text-transform: uppercase;
            width: 100%;
        }

        .error-message {
            text-align: center;
            color: #ff5757;
            font-weight: 100;
        }

        .formbody {
            display: inline-block;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <div class="navbar">
        <span >Project Complexity Risk Assessment</span>
    </div>
    <div style="margin: 0; display: inline-block;text-align:center;width:100%;height:100%;">
        <div style="margin-top:5%;margin-right: auto;margin-left:auto;width:50%;">
            <div class="formbody">
                <form action="" method="post" id="frmLogin">

                    <?php if (isset($_SESSION["messages"])) { ?>
                        <div class="error-message"><?= $_SESSION["messages"];  ?></div>
                    <?php unset($_SESSION["messages"]);
                    } ?>

                    <?php if (isset($_SESSION["invalid"])) { ?>
                        <div class="error-message"><?= $_SESSION["invalid"];  ?></div>
                    <?php unset($_SESSION["invalid"]);
                    } ?>

                    <?php if (isset($_SESSION["try"])) { ?>
                        <div class="error-message"><?= $_SESSION["try"];  ?></div>
                    <?php unset($_SESSION["try"]);
                    } ?>

                    <?php if (isset($_SESSION["login_attempts"])) { ?>
                        <div class="error-message"><?= $_SESSION["login_attempts"];  ?></div>
                    <?php unset($_SESSION["login_attempts"]);
                    } ?>

                    <div class="field-group">
                        <div>
                            <label for="login">Username</label>
                        </div>
                        <div>
                            <input name="member_name" type="text" value="<?php if (isset($_COOKIE["member_login"])) {
                                                                                echo $_COOKIE["member_login"];
                                                                            } ?>" class="input-field">
                        </div>
                    </div>
                    <div class="field-group">
                        <div>
                            <label for="password">Password</label>
                        </div>
                        <div>
                            <input name="member_password" type="password" value="<?php if (isset($_COOKIE["member_password"])) {
                                                                                        echo $_COOKIE["member_password"];
                                                                                    } ?>" class="input-field">
                        </div>
                    </div>
                    <div class="field-group">
                        <div>
                            <input type="checkbox" name="remember" id="remember" <?php if (isset($_COOKIE["member_login"])) { ?> checked <?php } ?> /> <label for="remember-me">Remember me</label>
                        </div>
                    </div>

                    <div class="field-group">
                        <div>
                            <?php
                            if (isset($_SESSION["error"])) {
                                $_SESSION["locked"] = time();
                                echo "<p>Please wait for 3 seconds</p>";
                            } else {
                            ?>
                                <input type="submit" name="login" value="Login" class="form-submit-button"></span>
                            <?php } ?>


                            
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</body>

</html>