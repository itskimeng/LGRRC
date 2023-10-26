<?php 
session_start();

if (!isset($_SESSION['id'])) 
{
  header('location: index.php?auth=false');
}

include 'function php/conn.php';
$id = $_GET['id'];

$sqlMain = ' SELECT `id`, `name`, `expertise`, `contactNumber`, `address`, `email`, `imageName`, `dateUploaded` FROM `tbl_expert` WHERE `id` = "'.$id.'" ';
$exec = $conn->query($sqlMain);
$result = $exec->fetch_assoc();


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
  </head>
  <body>
  <div class="bgImage" style="background-image: url(images/hd7.jpg); background-position: 50% -25px;">
     <!-- Navbar-->
     <?php include 'includes/header.php'; ?>

      <br><br><br>
      <div class="container">

          <div class="pt-2">

            <div class="row align-items-center">

              <div class="col-lg-12 mb-4 text-white headingContent" style="background-color: rgba(0,0,0,0.7) !important;">
                <header class="py-5 mt-2">  

                      <img class="expertProfilePicture" src="images/expert/<?php echo $result['imageName']; ?>" alt="" width="200px">
                       <h1 class="display-6 headingText"><?php echo $result['name']; ?></h1>
                        <p class="lead mb-0">Expertise: <b><?php echo $result['expertise']; ?></b></p>
                        <p class="lead mb-0">Licenses/Accreditation: <b><?php echo $result['contactNumber']; ?></b></p>
                        <p class="lead mb-0">Position: <b><?php echo $result['address']; ?></b></p>
                        <!-- <p class="lead mb-0">Email: <b><?php echo $result['email']; ?></b></p> -->
                        <hr style="color:white;">
                        <p><i>Send Request</i></p>

                        <div class="row">
                          <div class="col-sm-4"></div>
                          <div class="col-sm-4">
                            Choose Expertise:
                            <select class="form-control" id="requested_expertise">
                              <?php 
                                $arrayExpertise = explode(',', $result['expertise']);
                                foreach ($arrayExpertise as $key => $value) { ?>
                                
                                <option><?php echo $value; ?></option>



                                <?php } ?>
                            </select>
                            <br>
                            Reason:
                            <textarea class="form-control" placeholder="Type purpose or reason" id="reason"></textarea>


                          </div>
                          <div class="col-sm-4"></div>
                        </div>
                   

                
                        <button class="btn btn-primary mt-3" id="btnSendEmail">Send Request <i class="fa fa-paper-plane"></i></button>

                </header>
              </div>



            </div>
            <!-- <div class="row"> -->
          </div>
      </div>

    </div>
    <!-- bgImage -->


    <hr>




<br><br>

    <?php include 'includes/footer.php'; ?>
    <?php include 'includes/js_includes.php'; ?>

    <script type="text/javascript">

    $('#navDir').addClass('active');

    $('#btnSendEmail').click(function(){
      var id = <?php echo $result['id']; ?>;
      let reason = $('#reason').val();
      let requested_expertise = $('#requested_expertise').val();


      //confirmation start
      swal({
      title: "Are you sure?",
      text: "Send Expert Request!",
      type: "question",
      showCancelButton: true,
      confirmButtonColor: "#5cb85c",
      cancelButtonColor: "#d9534f",
      confirmButtonText: '<span class="fa fa-check"></span>&nbspProceed',
      cancelButtonText: '<span class="fa fa-remove"></span>&nbspDecline',
      confirmButtonClass: "btn",
      cancelButtonClass: "btn"
      }).then((result) => {
      if (result.value) {
        //ajax start
        $.ajax({  
          url:"function php/insertEmail.php?id="+id+'&reason='+reason+'&requested_expertise='+requested_expertise, 
          method:"POST",  
          //post:data  
          contentType:false,
          cache:false,
          processData:false,

          beforeSend:function() {

          swal({
          position: "top-end",
          type: "info",
          title: "Processing Data...",
          showConfirmButton: false,
          });

          }, 

          success:function(data){  
          // alert(data);
         
          swal.close();
          
          swal({
          title: "Request Successfully Sent!",
          // text: data,
          text: "Looking Good",
          type: "success",
          showCancelButton: false,
          confirmButtonColor: "#5cb85c",
          confirmButtonText: '<span class="fa fa-check"></span>&nbspProceed',
          confirmButtonClass: "btn"
          }).then((result) => {
            if (result.value) {

                location.reload();
            }
          });

          }
              
        });  
        //ajax end 



        }
      })
      //confirmation end

    });

    </script>



  </body>
</html>