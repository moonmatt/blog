<?php
include_once 'includes/dbh.php';
session_start();

if (!isset($_SESSION['access_token']) && $_SESSION['id'] != '108557018525577409619') {
  header("Location: index.php");
}
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
  <!-- include summernote css/js -->
<script type="text/javascript" src="nicEdit.js"></script>
<script type="text/javascript">
	bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script>

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
          <h1>moonblog</h1>
          <span class="subheading">Programming tutorials and adventures.</span>
          </div>
        </div>
      </div>
    </div>
  </header>


<div class="container">
<form action="includes/submit.php" method="POST" enctype="multipart/form-data">
      <input type="text" name="title" class="form-control form-control-lg" id="colFormLabelLg" placeholder="Title">
      <input type="text" name="description" class="form-control form-control-lg" id="colFormLabelLg" placeholder="Description">
      <textarea name="content" style="width: 100%; height: 500px;">
</textarea>
      <input type="hidden" value="<?php echo date("Y-m-d"); ?>" name="date">
      <input name="img" size="35" type="file"/><br/>
      <input type="hidden" value="<?php echo $_SESSION['givenName']; ?>" name="username" required>
      <br>
    <button type="submit" class="btn btn-primary btn-lg btn-block" name="submit">Submit</button>
</form>
</div>


<hr>
<?php include 'footer.html'; ?>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>