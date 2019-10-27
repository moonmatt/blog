<?php
if(isset($_POST['submit'])){
    include_once 'dbh.php';
    $img = $_FILES['img'];
    // FILE UPLOAD TO IMGUR
    echo $img['name'];
    if($img['name']==''){  
        echo "<h2>An Image Please.</h2>";
     }else{
        $filename = $img['tmp_name'];
        $client_id = "4cfe94fcd8e1e53"; // PUT HERE YOUR CLIENT ID
        $handle = fopen($filename, "r");
        $data = fread($handle, filesize($filename));
        $pvars   = array('image' => base64_encode($data));
        $timeout = 30;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://api.imgur.com/3/image.json');
        curl_setopt($curl, CURLOPT_TIMEOUT, $timeout);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Client-ID ' . $client_id));
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $pvars);
        $out = curl_exec($curl);
        curl_close ($curl);
        $pms = json_decode($out,true);
        $url = $pms['data']['link'];
      if($url == ""){
        header('Location: ../index.php?error');
      }
     }
    // END FILE UPLOAD TO IMGUR
    $username =  mysqli_real_escape_string($conn, $_POST['username']);
    $title =  mysqli_real_escape_string($conn, $_POST['title']);
    $content =  mysqli_real_escape_string($conn, $_POST['content']);
    $content = str_replace("'", "&#39;", $content);
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $link = str_replace(" ", "-", $title);
    $link = str_replace("?", "", $link);
    $link = str_replace("'", "&#39;", $link);
    $link = str_replace(",", "", $link);
    $link = str_replace(".", "", $link);
    $phpfile = $link.'.php';
    $handle = fopen('../'.$phpfile, 'w') or die('Cannot open file:  '.$phpfile); //implicitly creates file
    $data =  file_get_contents("scheme.txt");
    fwrite($handle, $data);
    $sql = "INSERT INTO posts (username, title, content, description, link, date, img) VALUES ('$username', '$title', '$content', '$description', '$link', '$date', '$url');";
    mysqli_query($conn, $sql);
    header("Location: ../$link");
    echo $sql;
} else {
    header("Location: ../index");
}