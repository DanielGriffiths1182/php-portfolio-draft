<!DOCTYPE HTML>
<html>
  <head>
    <link rel="stylesheet" href="css/main.css" />
  </head>
  <body>

    <header id="header" class="alt">
      <h1><strong><a href="index.php">Splash</a></strong> by d.griffiths</h1>
    </header>

    <a href="#menu" class="navPanelToggle"><span class="fa fa-bars"></span></a>

		<div id="one" class="wrapper style2 special">
			<div class="container">
				<header class="major">
					<h2>Resources</h2>
				</header>
				<div class="row 150%">
					<div class="6u 12u$(xsmall)">
						<div class="image fit captioned">
							<img src="images/headshot.jpg" alt="" />
							<h3><a href="https://drive.google.com/file/d/0B-J4jsxsIL80N2JUcmkxQnZCSEk/view" class="button special big">Resume</a></h3>
						</div>
					</div>
					<div class="6u$ 12u$(xsmall)">
						<div class="image fit captioned">
							<img src="images/github.jpg" alt="" />
							<h3><a href="https://github.com/DanielGriffiths1182" class="button special big">Github</a></h3>
						</div>
					</div>
				</div>
			</div>
		</div>

    <div id="two" class="wrapper style3 special">
      <div class="container">
        <header class="major">
          <h2>Contact Daniel Griffiths</h2>
          <p>Required Fields: Name | Subject | Email</p>
        </header>
        <ul class="actions">
          <?php
          $nameErr = $subjectErr = $emailErr = $websiteErr = "";
          $name = $subjectErr = $email = $comment = $website = "";

          if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["name"])) {
              $nameErr = "Name is required";
            } else {
              $name = test_input($_POST["name"]);
              if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
                $nameErr = "Only letters and white space allowed";
              }
            }

            if (empty($_POST["subject"])) {
              $subjectErr = "Subject is required";
            } else {
              $subject = test_input($_POST["subject"]);
              if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
                $subjectErr = "Only letters and white space allowed";
              }
            }

            if (empty($_POST["email"])) {
              $emailErr = "Email is required";
            } else {
              $email = test_input($_POST["email"]);
              if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
              }
            }

            if (empty($_POST["website"])) {
              $website = "";
            } else {
              $website = test_input($_POST["website"]);
              if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
                $websiteErr = "Invalid URL";
              }
            }

            if (empty($_POST["comment"])) {
              $comment = "";
            } else {
              $comment = test_input($_POST["comment"]);
            }
          }

          function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
          }

          ?>
          <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            Name (required): <input type="text" name="name" value="<?php echo $name;?>">
            <span class="error"><?php echo $nameErr;?></span>
            <br><br>
            Subject (required): <input type="text" name="subject" maxlength="50" value="<?php echo $subject;?>">
            <span class="error"><?php echo $subjectErr;?></span>
            <br><br>
            E-mail (required): <input type="text" name="email" value="<?php echo $email;?>">
            <span class="error"><?php echo $emailErr;?></span>
            <br><br>
            Website: <input type="text" name="website" value="<?php echo $website;?>">
            <span class="error"><?php echo $websiteErr;?></span>
            <br><br>
            Comment: <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>
            <br><br>
            <input type="submit" class="button special big" name="button_pressed" value="Submit">
          </form>
        </ul>
      </div>
    </div>

    <footer id="footer">
      <div class="container">
        <ul class="copyright">
          <li>&copy; Daniel Griffiths</li>
          <li><a href="https://github.com/DanielGriffiths1182">GitHub</a></li>
        </ul>
      </div>
    </footer>

  </body>
</html>
