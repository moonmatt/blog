<?php
include_once 'includes/dbh.php';
session_start();
$sql = 'SELECT * FROM posts ORDER BY id DESC;';
$result = mysqli_query($conn, $sql);
$resultcheck = mysqli_num_rows($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>moonblog - Programming tutorials and adventures | by Matteo Galavotti</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="css/clean-blog.min.css" rel="stylesheet">

</head>

<body>

  <?php include 'menu.html'; ?>

  <!-- Page Header -->
  <header class="masthead" style="background-image: url('https://images.unsplash.com/photo-1568584263125-bf8f0a77d51c?ixlib')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
          <!-- CHANGE THIS CODE - START -->
          <?php if (!isset($_SESSION['access_token']){
          echo '
          <h1>moonblog</h1>
          <span class="subheading">Programming tutorials and adventures.</span>
          ';
        } else {
          echo $_SESSION['id'];
          echo '
              <h1>'.$_SESSION['givenName'].'</h1>
              <span class="subheading"><a href="/logout">Logout</a> - <a href="/write">Write</a></span>';
        } ?>
        <!-- CHANGE THIS CODE - END -->
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container">
    <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
    <?php
if($resultcheck > 0){
	while($row = mysqli_fetch_assoc($result)){
		$title = $row['title'];
		$username = $row['username'];
		$description = $row['description'];
		$date = $row['date'];
		$link = $row['link'];
		echo '
    <div class="post-preview">
      <a href="'.$link.'">
        <h2 class="post-title">
          '.$title.'
        </h2>
        <h3 class="post-subtitle">
          '.$description.'
        </h3>
      </a>
      <p class="post-meta">Posted by
        '.$username.'
        on '.$date.'</p>
    </div>
    <hr>
';
	}
}
?>
     </div>
    </div>
  </div>
        <hr>


<?php include 'footer.html'; ?>

</html>
