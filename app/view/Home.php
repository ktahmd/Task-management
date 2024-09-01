<?php if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formation en ligne</title>

    <link rel="stylesheet" href="public/assets/css/Block.css">
    <link rel="stylesheet" href="public/assets/css/BodyStyle.css">
    <link rel="stylesheet" href="public/assets/css/FixNav.css">
    <link rel="stylesheet" href="public/assets/css/Off-canav.css">
    <link rel="stylesheet" href="public/assets/css/Grid.css">
    <link rel="stylesheet" href="public/assets/css/Card.css">
    <link rel="stylesheet" href="public/assets/css/Button.css">
    <link rel="stylesheet" href="public/assets/css/Avatar.css">
    <link rel="stylesheet" href="public/assets/css/Notification.css">
    <link rel="stylesheet" href="public/assets/css/List.css">
    <link rel="stylesheet" href="public/assets/css/Tab.css">
    <link rel="stylesheet" href="public/assets/css/Table.css">
    <link rel="stylesheet" href="public/assets/css/DragDrop.css">
    <link rel="stylesheet" href="public/assets/css/Modal.css">
    <link rel="stylesheet" href="public/assets/css/Form.css">
    <link rel="stylesheet" href="public/assets/css/Alerts.css">
    <link rel="stylesheet" href="public/assets/css/Links.css">
    <link rel="stylesheet" href="public/assets/css/Error404.css">
    <link rel="stylesheet" href="public/assets/css/Drop.css">
    <link rel="stylesheet" href="public/assets/css/LiveSearch.css">
    <link rel="stylesheet" href="public/assets/css/SlideShow.css">

    <!-- Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Afacad' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Bayon' rel='stylesheet'>
    <link rel="stylesheet" href="public/assets/css/Fonts.css">
    <!-- Icon -->
    <link rel="icon" href="public/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body style="background-color:#f2f2f2">

<div id="navbar2">
    <a href="Home" class="active"><img alt="TaskyLogo" src="public/assets/img/logotasky.png" height="30px" align="left" ></a>
    
</div>
<div style="height:1000px">
<div class="roundbox">
    <div class="row" style="width:95%">
        <div class="column-50">
            <div class="card" style="margin:70px 100px 0px 100px; min-height:600px; text-align:center">
                <h2 id="form-title">SIGN UP</h2>
                <img align="center" width="40%" src="public/assets/img/ullistration.png">
                
                <!-- Sign Up Form -->
                <form id="signup-form" action="app/controllers/signup.php" method="post" style="display: block;">
                    <input type="email" name="email" placeholder="Email" required>
                    <?php
                        if (isset($_SESSION['emailmsg'])) { 
                            echo "<p style='color: #ff0000;
                                    padding-left: 20px; 
                                    text-align: left;
                                    font-size: 10px;'>";
                            echo htmlspecialchars($_SESSION['emailmsg'], ENT_QUOTES, 'UTF-8');
                            echo "</p>";
                            unset($_SESSION['emailmsg']);
                        }
                    ?><br>
                    <input id="psw" type="password" name="password" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                    <?php
                        if (isset($_SESSION['passmsg'])) { 
                            echo "<p style='color: #ff0000;
                                    padding-left: 20px;
                                    text-align: left;
                                    font-size: 10px;'>";
                            echo htmlspecialchars($_SESSION['passmsg'], ENT_QUOTES, 'UTF-8');
                            echo "</p>";
                            unset($_SESSION['passmsg']);
                        }
                    ?>
                    <div id="message">
                    <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                    <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                    <p id="number" class="invalid">A <b>number</b></p>
                    <p id="length" class="invalid">Minimum <b>8 characters</b></p>
                    </div>
                    <br>
                    <input type="password" placeholder="Confirme Password" id="confirmPassword" required>
                    <div id="mssg"></div><br>
                    <button type="submit" class="btn default">Sign up</button>
                </form>
                
                <!-- Sign In Form -->
                <form id="signin-form" action="app/controllers/login.php" method="post" style="display: none;">
                    <input type="email" name="email" placeholder="Email" required>
                    <?php
                        if (isset($_SESSION['usermsg'])) { 
                            echo "<p style='color: #ff0000;
                                    padding-left: 20px;
                                    text-align: left;
                                    font-size: 10px;'>";
                            echo htmlspecialchars($_SESSION['usermsg'], ENT_QUOTES, 'UTF-8');
                            echo "</p>";
                            unset($_SESSION['usermsg']);
                        }
                    ?><br>
                    <input type="password" name="password" placeholder="Confirme Password" required>
                    <?php
                        if (isset($_SESSION['passusermsg'])) { 
                            echo "<p style='color: #ff0000;
                                    padding-left: 20px;
                                    text-align: left;
                                    font-size: 10px;'>";
                            echo htmlspecialchars($_SESSION['passusermsg'], ENT_QUOTES, 'UTF-8');
                            echo "</p>";
                            unset($_SESSION['passusermsg']);
                        }
                    ?><br>
                    <button type="submit" class="btn default">Sign In</button>
                </form>

                <!-- Toggle Button -->
                 <div style="margin-top:60px">
                    <button class="btn noni" style="color:blue" onclick="signForms()">Switch to Sign In</button>
                </div>
            </div>
        </div>
        <div class="column-50" style="display:flex; flex-direction: column; justify-content:center; align-items:center;text-align:center; height:100vh;">
            <div class="slideshow-container" >

                <div class="mySlides fade" style="text-align:center;">
                    <div class="numbertext">1 / 3</div>
                    <img src="public/assets/img/pic1.png" style="width:100%">
                </div>

                <div class="mySlides fade" style="text-align:center;">
                    <div class="numbertext">2 / 3</div>
                    <img src="public/assets/img/pic2.png" style="width:100%">
                </div>

                <div class="mySlides fade" style="text-align:center;">
                    <div class="numbertext">3 / 3</div>
                    <img src="public/assets/img/pic3.png" style="width:100%">
                </div>

                <a class="prev" onclick="plusSlides(-1)">❮</a>
                <a class="next" onclick="plusSlides(1)">❯</a>
                <div style="margin-top: 5px; text-align:center;" >
                <span class="dot" onclick="currentSlide(1)"></span> 
                <span class="dot" onclick="currentSlide(2)"></span> 
                <span class="dot" onclick="currentSlide(3)"></span> 
                </div>
                <h5 style="color:azure">Boost your productivity with Tasky—the best task management tool! Simplify collaboration, manage projects seamlessly, and enjoy an easy-to-use interface. Get organized today!
            </div>

        </div>
    </div>
</div>

<div class="row">
    <div class="column-33" style="text-align:right;">
    <img src="public/assets/img/projects.png" alt="project" class="bigavatar"  >
    <h4>You can add projects</h4>
    </div>
    <div class="column-33" style="text-align:center;">
    <img src="public/assets/img/tasks.png" alt="project" class="bigavatar" >
    <h4>Manger your tasks</h4>
    </div>
    <div class="column-33" style="text-align:left;">
    <img src="public/assets/img/time.png" alt="project" class="bigavatar" >
    <h4>Natification/Rappels</h4>
    </div>
</div>


</div>
<div class="boxblock">
    <p style="padding:10%; font-size:24px ;color:#234052">Boost your productivity with Tasky—the best task management tool! Simplify collaboration, manage projects seamlessly, and enjoy an easy-to-use interface. Get organized today!
    </p>
</div>
<div style="height:800px;margin-top: 100px;">
    <div class="roundbox2">
        <div class="row">
            <div class="column-50" style="margin-top:50px;height:300px;display:flex;text-align: center;justify-content: center;align-content: center;align-items: center; ">
                
                    <h4 style="color:azure; padding:15%">Our user-friendly interface is crafted to make task management simple, allowing you to focus on what really matters without getting bogged down by complexity.</h4>
                    
            </div>
            <div class="column-50" style="margin-top:50px">
            <a href="Home" class="active"><img  src="public/assets/img/pic3.png" style="width:80%; border-radius:10px" ></a>
            </div>
        </div>
        <div class="row" style="margin-top:50px">
            <div class="column-50" >
                
            <a href="Home" class="active"><img alt="TaskyLogo" src="public/assets/img/pic4.png"  style="width:80%; border-radius:10px" align="right" ></a>
            </div>
            <div class="column-50" style="margin-top:50px;height:300px;display:flex;text-align: center;justify-content: center;align-content: center;align-items: center; ">
            <h4 style="color:azure; padding:0% 15% 20% 15%">With Tasky, you can effortlessly collaborate with your team, ensuring that managing projects becomes a seamless and efficient experience.
            </h4>
            </div>
        </div>
        
    </div>
</div>

    <!-- Footer -->
    <?php include 'layouts/footer.php'; ?>

    <script src="public/assets/js/SlideShow.js"></script>
    <script>
    function signForms() {
        const signupForm = document.getElementById('signup-form');
        const signinForm = document.getElementById('signin-form');
        const formTitle = document.getElementById('form-title');
        const toggleButton = document.querySelector('button[onclick="signForms()"]');
        
        if (signupForm.style.display === "none") {
            signupForm.style.display = "block";
            signinForm.style.display = "none";
            formTitle.innerText = "SIGN UP";
            toggleButton.innerText = "Switch to Sign In";
        } else {
            signupForm.style.display = "none";
            signinForm.style.display = "block";
            formTitle.innerText = "SIGN IN";
            toggleButton.innerText = "Switch to Sign Up";
        }
    }
</script>
<script>
var myInput = document.getElementById("psw");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
}

  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }

  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}

document.getElementById('signup-form').addEventListener('submit', function(event) {
    const password = document.getElementById('psw').value;
    const confirmPassword = document.getElementById('confirmPassword').value;
    const message = document.getElementById('mssg');

    if (password !== confirmPassword) {
        event.preventDefault(); // Prevent form submission if passwords do not match
        message.textContent = 'Passwords do not match!';
        message.className = 'invalid';
    } else {
        // Allow the form to submit if passwords match
        message.textContent = ''; // Clear the message if passwords match
        message.className = '';
    }
});

</script>
</body>
</html>