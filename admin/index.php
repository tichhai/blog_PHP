<?php
  session_start();
  include "database/database.php";
  include "database/blogcategories.php";
  include "database/blogs.php";
  include "helper/help_function.php";
  include "database/sliders.php";
  include "database/socials.php";
  include "database/links.php";
  include "database/about.php";
  include "database/contact.php";
  include "database/terms.php";
  include "database/settings.php";
  include "database/mailsettings.php";
  include "database/subscribers.php";
  include "database/comments.php";
  include "database/users.php";

  if(empty($_SESSION["user_id"])){
    header("location:login.php");
  }

  $database = new database();
  $db = $database->connect();
  $settings = new settings($db);
  $settings->id = 1;
  $settings->read();
  $page = isset($_GET["page"]) ? $_GET["page"] : "dashboard";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title><?php echo $settings->site_name?></title>
    <link
      href="<?php echo "../images/".$settings->site_favicon?>"
      rel="icon"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css"
      rel="stylesheet"
    />
    <link href="css/styles.css" rel="stylesheet" />
    <script
    src="https://use.fontawesome.com/releases/v6.1.0/js/all.js"
    crossorigin="anonymous"
    ></script>
    <!-- <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" /> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
  </head>
  <body class="sb-nav-fixed">
    <?php
        include "includes/header.php"
    ?>
    <div id="layoutSidenav">
      <?php
        include "includes/sidebar.php"
      ?>

      <?php
        if($page == "dashboard"){
          include "includes/dashboard.php";
        }
        else if($page == "blogcategories"){
          include "includes/blogcategories.php";
        }
        else if($page == "blogcategories_add"){
          include "includes/blogcategories_add.php";
        }
        else if($page == "blogcategories_edit"){
          include "includes/blogcategories_edit.php";
        }
        else if($page == "blogs"){
          include "includes/blogs.php";
        }
        else if($page == "blogs_add"){
          include "includes/blogs_add.php";
        }
        else if($page == "blogs_edit"){
          include "includes/blogs_edit.php";
        }
        else if($page == "sliders"){
          include "includes/sliders.php";
        }
        else if($page == "sliders_add"){
          include "includes/sliders_add.php";
        }
        else if($page == "sliders_edit"){
          include "includes/sliders_edit.php";
        }
        else if($page == "socials"){
          include "includes/socials.php";
        }
        else if($page == "socials_add"){
          include "includes/socials_add.php";
        }
        else if($page == "socials_edit"){
          include "includes/socials_edit.php";
        }
        else if($page == "links"){
          include "includes/links.php";
        }
        else if($page == "links_add"){
          include "includes/links_add.php";
        }
        else if($page == "links_edit"){
          include "includes/links_edit.php";
        }
        else if($page == "users"){
          include "includes/users.php";
        }
        else if($page == "users_add"){
          include "includes/users_add.php";
        }
        else if($page == "users_edit"){
          include "includes/users_edit.php";
        }
        else if($page == "about"){
          include "includes/about.php";
        }
        else if($page == "contact"){
          include "includes/contact.php";
        }
        else if($page == "terms"){
          include "includes/terms.php";
        }
        else if($page == "settings"){
          include "includes/settings.php";
        }
        else if($page == "mailsettings"){
          include "includes/mailsettings.php";
        }
        else if($page == "subscribers"){
          include "includes/subscribers.php";
        }
        else if($page == "subscribers_add"){
          include "includes/subscribers_add.php";
        }
        else if($page == "comments"){
          include "includes/comments.php";
        }
      ?>
    </div>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      crossorigin="anonymous"
    ></script>
    <script src="js/scripts.js"></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"
      crossorigin="anonymous"
    ></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/simple-datatables@latest"
      crossorigin="anonymous"
    ></script>
    <script src="js/datatables-simple-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script>
      $('#content').summernote({
        placeholder: 'Input content',
        tabsize: 2,
        height: 100
      });
      $('#footer').summernote({
        placeholder: 'Input content',
        tabsize: 2,
        height: 100
      });
      function sendMail(){
        let title = document.getElementById("title").value;
        let content = document.getElementById("content").value;
        let xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function (){
          if(this.readyState == 4 && this.status == 200){
            if(this.responseText == "Success"){
              document.getElementById("msg").innerHTML = "<div class='alert alert-success'>Mail has been sent to all users successfully!</div>";
            }
            else{
              document.getElementById("msg").innerHTML = "<div class='alert alert-warning'>No user available to send email!</div>";
            }
          }
        }
        xhttp.open("POST","mail/sendmail.php",true);
        xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xhttp.send("title="+title+"&content="+content);
      }
    </script>
  </body>
</html>
