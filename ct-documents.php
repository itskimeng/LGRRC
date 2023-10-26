<?php 
include 'function php/conn.php';

if (isset($_GET['id'])) 
{
  $id = $_GET['id'];
}
else
{
  $id = '';
}

 ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="LGRRC Website">
    <meta name="keywords" content="dilg,lgrc calabarzon,lgrrc calabarzon,lgrrc,lgrc, calabarzon, dilg calabarzon">
    <meta name="author" content="Jeck Castillo">
    <link rel="icon" type="image/png" href="images/lgrc_logo.png">
    <?php include 'includes/css_includes.php'; ?>

    <title>LGRRC</title>
    <style type="text/css">

      .menuOutput
      {
        height: 450px;
        overflow-y: scroll;
        border:2px solid lightgray;
        border-radius: 5px;
      }
      .menuOutput::-webkit-scrollbar {
          width: 6px;
      }
       
      .menuOutput::-webkit-scrollbar-track {
          -webkit-box-shadow: inset 0 0 6px #d7e5fc; 
          border-radius: 5px;
          /*color: #d7e5fc;*/
      }
       
      .menuOutput::-webkit-scrollbar-thumb {
          border-radius: 10px;
          -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
      }

    </style>
  </head>
  <body>
  <div class="bgImageSmall" style="background-image: url(images/hd7.jpg); background-position: 50% -25px;">
     <!-- Navbar-->
     <?php include 'includes/header.php'; ?>

      <!-- <br><br><br>
      <div class="container">

          <div class="pt-5">

            <div class="row align-items-center">

              <div class="col-lg-12 mb-4 text-white headingContent">
                <header class="py-5 mt-5">
                    <h1 class="display-6 headingText">LGRRC News and Events</h1>
                    <a href="#page2" class="btn btn-primary btn-lg mt-3 scrollTo"><i class="fa fa-angle-double-down"></i></a>
                </header>
              </div>



            </div>
          </div>
      </div>
      <span id="page2"></span> -->

    </div>
    <!-- bgImage -->


    <hr>

   <!-- <div class="parallax"> -->
    <!-- NEWS -->
     <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <center>
            <h2 class="section-title">Contact Tracer Learning Materials</h2>

            <ul class="nav nav-pills nav-fill mt-5" style="width: 50%;">
              <li class="nav-item">
                <a class="nav-link navPill" href="#">2021 DOH 4A</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="ct-documents2021lga.php">2021 LGA</a>
              </li>
            </ul>
          </center>

        </div>
      </div>

      <div class="row aos-init mt-3" data-aos="fade-up"  data-aos-duration="1500" data-aos-duration="2000">


        <div class="col-lg-12 mt-4">
          <div class="card" style="width: 100%;">
            <iframe src="https://docs.google.com/presentation/d/e/2PACX-1vSGr5G1j-i8kOOnTiXwnRErH2VF9yCuZSht8gEV94C7YMSUXX1PkwnC7Hnu6Ekutw/embed?start=false&loop=false&delayms=3000" frameborder="0" width="100%" height="500" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
            <div class="card-body">
              <p class="card-text"><b>Contact Tracing Module 1 Lesson 1_ Overview of National Health Emergency Strategic Response</b></p>
              <p class="card-text"><a href="https://drive.google.com/file/d/1HO0OzoIDKfafwpF5wxS2cKwzfkHSkiDL/view?usp=sharing" target="_blank">Download <i class="fa fa-chevron-circle-down"></i></a></p>
              <p class="card-text"><a href="">Google Form Question Link</a></p>
            </div>
          </div>
        </div>


      </div>
    </div>
  <!-- </div> --> 


  <br><br><br>

    <?php include 'includes/footer.php'; ?>
    <?php include 'includes/js_includes.php'; ?>

    <script type="text/javascript">


    </script>



  </body>
</html>