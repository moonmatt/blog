# My PHP Blogging System

Welcome to my PHP Blogging platform, at the moment it just allows one writer and the login is made with Google API.

First of all, create a table in your database called "posts" inside of the db called "blog", using this sql:

CREATE TABLE posts (
  id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  username varchar(20) NOT NULL,
  title varchar(200) NOT NULL,
  content longtext NOT NULL,
  description varchar(500) NOT NULL,
  link varchar(150) NOT NULL
)

Then go inside the folder "includes", open "dbh.php" and change the variables, adding your database infos.

At this point, go to https://console.developers.google.com/apis/, click on the menu and create a New Project, select a name and fill all the other inputs with your datas.
At the end, it will give you 2 Tokens, a Client one and a Secret one, copy them, edit "config.php" and paste them in the right spots.
Then set the App Name and the Redirect Url.

Go to the homepage, login with Google and it should show your Google ID, then edit index.php, remove the code starting at
"// CHANGE THIS CODE - START" and ending at "// CHANGE THIS CODE - END" and paste this:

          <!-- CODE TO PASTE - START -->
          <?php if (!isset($_SESSION['access_token']) && $_SESSION['id'] != 'YOUR GOOGLE ID'){
          echo '
          <h1>moonblog</h1>
          <span class="subheading">Programming tutorials and adventures.</span>
          ';
        } else {
          echo '
              <h1>'.$_SESSION['givenName'].'</h1>
              <span class="subheading"><a href="/logout">Logout</a> - <a href="/write">Write</a></span>';
        } ?>
        <!-- CODE TO PASTE - END -->

Last thing to do is to configure Imgur to host images. In order to do this, go to https://api.imgur.com/oauth2/addclient, create a new App, fill the form with your datas. MAKE SURE TO CHECK "Anonymous usage without user authorization". Once you finished, copy the Client ID, go to "includes/submit.php" and insert it inside the variable.

Congratulations, your blog should be ready to go! MAKE SURE YOU GAVE THE FILES ALL THE PERMISSIONS