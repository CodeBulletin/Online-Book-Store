<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="../Libraries/css/bootstrap.min.css" />
      <link rel="stylesheet" href="../CSS/Login.css?">
      <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
      
      <script defer src="../Libraries/js/bootstrap.min.js"></script>
      <script defer src="../JS/FormError.js"></script>
      <title>Book Mania Login/Sign Up</title>
   </head>
   <body>
        <div class="MainDiv">
            <div class="FormDiv FormHead">
                <ul class="nav nav-tabs bg-dark FormHead nav-justified">
                    <li class="nav-item">
                        <a class="nav-link Link font_style" aria-current="page" data-bs-toggle="tab" data-bs-target="#SignUp">Sign Up</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active Link font_style" data-bs-toggle="tab" data-bs-target="#Login">Login</a>
                    </li>
                </ul>
            </div>
            <div class="tab-content" id="myTabContent">
                <div class="FormDiv FormBody tab-pane fade" role="tabpanel" id="SignUp" aria-labelledby="SignUp-tab">
                    <form class="form" action="./_SignUP.php" method="POST" id='sform'>
                        <?Php
                            if(isset($_GET['serror'])) {
                                echo "<div class='form__item'>";
                                echo "<span class='form__message'>";
                                if($_GET['serror'] == 1) {
                                    echo "User already exists";
                                }
                                echo "</span></div>";
                            }
                        ?>
                        <div class="form__item">
                            <label for="name" class="form__label">Enter your full name</label>
                            <input type="text" class="form__input " name="fname" id="fname" placeholder="FirstName LastName" required>
                            <span class="form__error">Enter a valid name</span>
                        </div>
                        <div class="form__item">
                            <label for="name" class="form__label">Enter your email</label>
                            <input type="email" class="form__input " name="email" id="email" placeholder="example@example.com" required>
                            <span class="form__error">Enter a valid email</span>
                        </div>
                        <div class="form__item">
                            <label for="name" class="form__label">Enter your phone number</label>
                            <input type="text" class="form__input " name="mno" id="mno" placeholder="" required>
                            <span class="form__error">Enter a valid phone number</span>
                        </div>
                        <div class="form__item">
                            <label for="name" class="form__label">Enter your username</label>
                            <input type="text" class="form__input " name="uname" id="uname" placeholder="user_123" required>
                            <span class="form__error">Enter a valid user name</span>
                        </div>
                        <div class="form__item">
                            <label for="name" class="form__label">Enter your password</label>
                            <input type="password" class="form__input " name="pass" id="pass" required>
                            <span class="form__error">Enter a valid password</span>
                        </div>
                        <div class="form__item">
                            <label for="name" class="form__label">Re-Enter your password</label>
                            <input type="password" class="form__input " name="repass" id="repass" required>
                            <span class="form__error">Password does not match</span>
                        </div>
                        <div class="form__item">
                            <label for="name" class="form__label">Enter your address</label>
                            <textarea class="form__input" name="Address" id="Address" cols="15" rows="5" required></textarea>
                        </div>
                        <div class="form__item">
                            <label for="" class="form__label">
                            <input type="checkbox" name="TAC" id="TAC" class="form__checkbox" required>
                                I agree to term and conditions.
                            </label>
                        </div>
                        <div class="form__item">
                            <button class="form__btn" type="submit" required>Sign Up</button>
                        </div>
                    </form>
                </div>
                <div class="FormDiv FormBody tab-pane fade show active" role="tabpanel" id="Login" aria-labelledby="Login-tab">
                    <form class="form" action="./_Login.php" method="POST" id='lform'>
                        <?Php
                            if(isset($_GET['lerror'])) {
                                echo "<div class='form__item'>";
                                echo "<span class='form__message'>";
                                if($_GET['lerror'] == 1) {
                                    echo "User does not exist";
                                }
                                else if($_GET['lerror'] == 2) {
                                    echo "Password is incorrect";
                                }
                                echo "</span></div>";
                            }
                        ?>
                        <div class="form__item">
                            <label for="name" class="form__label">Enter your username</label>
                            <input type="text" class="form__input" name="luname" id="luname" placeholder="user_123" required>
                            <span class="form__error">Enter a valid user name</span>
                        </div>
                        <div class="form__item">
                            <label for="name" class="form__label">Enter your password</label>
                            <input type="password" class="form__input" name="lpass" id="lpass" required>
                            <span class="form__error">Enter a valid password</span>
                        </div>
                        <div class="form__item">
                            <button class="form__btn" type="submit" id="login">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
   </body>
</html>
