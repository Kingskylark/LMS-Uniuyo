<?php 
        $notfound = false;
        include 'config.php';
        $html = '';
        if(isset($_POST['search'])){

             $reg_no = $_POST['reg_no'];

             $sql = "Select * from cards where reg_no='$reg_no' ";

             $result = mysqli_query($conn, $sql);
 
 
             if(mysqli_num_rows($result)>0){
             $html="<div class='card' style='width:350px; padding:0;' >";
     
               $html.="";
                         while($row=mysqli_fetch_assoc($result)){
                             
                            $name = $row["name"];
                            $reg_no = $row["reg_no"];
                            $level = $row['level'];
                            $session = $row['session'];
                            $address = $row['address'];
                            $email = $row['email'];
                            $faculty = $row['faculty'];
                            $phone = $row['phone'];
                            $address = $row['address'];
                            $image = $row['image'];
                            $department = $row['department'];
                           
                             
                             $html.="
                                        <!-- second id card  -->
                                        <div class='container' style='text-align:left; border:2px solid black;'>
                                              <div class='header'>
                                                <h1> LIBRARY CARD </h1>
                                              </div>
                                  
                                              <div class='container-2'>
                                                  <div class='box-1'>
                                                  <img src='$image'/>
                                                  </div>
                                                  <div class='box-2'>
                                                      <h2>$name</h2>
                                                      <p>Student</p>
                                                  </div>
                                                  
                                              </div>
                                  
                                              <div class='container-3'>
                                                  <div class='info-1'>
                                                      <div class='id'>
                                                          <h4>Reg No</h4>
                                                          <p>$reg_no</p>
                                                      </div>
                                  
                                                      <div class='dob'>
                                                          <h4>Phone</h4>
                                                          <p>$phone</p>
                                                      </div>
                                  
                                                  </div>

                                                  <div class='info-3'>
                                                  <div class='id'>
                                                      <h4>Address</h4>
                                                      <p>$address</p>
                                                  </div>

                                                  <div class='dob'>
                                                      <h4>Signature</h4>
                                                      <p>......................</p>
                                                  </div>
                                                  
                                                </div>

                                                  <div class='info-2'>
                                                      <div class='id'>
                                                          <h4>Faculty</h4>
                                                          <p>$faculty</p>
                                                      </div>
                                                      <div class='dob'>
                                                          <h4>Department</h4>
                                                          <p>$department</p>
                                                      </div>
                                                  </div>
                                                  
                                                 
                                                  </div>
                                                  </div>
                                                  <!-- id card end -->
                                        ";
                                        
                           
                         }
     

             }
            
        }

             ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="icon" type="image/png" href="images/favicon.png"/>
    <link rel="stylesheet" href="css/dashboard.css">
    
    <link rel="icon" type="image/png" href="images/favicon.png"/>

    <title>Library Card</title>
       <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Orbitron&display=swap" rel="stylesheet">



<style>
body{
   font-family:'arial';
   }

.lavkush img {
  border-radius: 8px;
  border: 2px solid blue;
}
span{

    font-family: 'Orbitron', sans-serif;
    font-size:16px;
}
hr.new2 {
  border-top: 1px dashed black;
  width:350px;
  text-align:left;
  align-items:left;
}
 /* second id card  */
 p{
     font-size: 13px;
     /* margin-top: -5px; */
     margin-bottom:0;
 }
 .container {
    width: 80vh;
    height: 45vh;
    margin: auto;
    background-color: lightgreen;
    box-shadow: 0 1px 10px rgb(146 161 176 / 50%);
    overflow: hidden;
    border-radius: 10px;
    background-image: url(assets/images/download.png);
    background-blend-mode: overlay;
    background-repeat: none;
   background-size: cover;


}

.header {
    width: 73vh;
    height: 15vh;
    background-color: transparent;
    overflow: hidden;
    font-family: 'Poppins', sans-serif;
}

.header h1 {
    color: green;
    text-align: center;
    margin-left: 4rem;
    margin-top: 15px;
}

.container-2 {
    width: 80vh;
    height: 10vh;
    margin: 0px auto;
    margin-top: -20px;
    display: flex;
}

.box-1 {
    border: 4px solid black;
    width: 90px;
    height: 95px;
    margin-top: -3rem;
    margin-right: 1rem;
    border-radius: 3px;
  
}

.box-1 img {
    width: 82px;
    height: 87px;
    
}

.box-2 {
    flex-grow:1;
    width: 33vh;
    height: 8vh;
    margin: 7px 0px;
    padding: 5px 7px 0px 0px;
    text-align: left;
    font-family: 'Poppins', sans-serif;
}

.box-2 h2 {
    font-size: 1.3rem;
    margin-top: -5px;
    color: black;
    ;
}


.container-3 {
    display:    flex;
    font-family: 'Shippori Antique B1', sans-serif;
    font-size: 0.7rem;
    text-align:center;
}

.id h4 {
    color: red;
    font-size:20px;
    margin-bottom:1px
}

.dob h4 {
    color: red;
    font-size:20px;
    margin-bottom:1px;
    margin-top:10px;
}

.dob p {
    font-size:15px;
    margin-top:10px;
}

.info-2 {
    width: 20vh;
    height: 12vh;
    text-align: center;
   }

.info-3 {
    width: 17vh;
    height: 12vh;
    flex-grow:1;
}


    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.6.0/dom-to-image.js"></script>
  </head>
  <body>

 <!-- Navigation bar start  -->
<nav class="navbar navbar-expand-lg navbar-dark bg-success" >
  <a class="navbar-brand" href="#"><img src="assets/images/codingcush-logo.png" alt=""></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index-card.php">Home <span class="sr-only">(current)</span></a>
      </li>
        </ul>
    </nav>
<!-- Navigation bar end  -->

  <br>

<div class="row" style="margin: 0px 20px 5px 20px">
  <div class="col-sm-6">
    <div class="card jumbotron">
      <div class="card-body">
        <form class="form" method="POST" action="id-card.php">.
        <label for="exampleInputEmail1">Student Reg. No.</label>
        <input class="form-control mr-sm-2" type="search" placeholder="Enter Reg. No." name="reg_no">
        <small id="emailHelp" class="form-text text-muted">Every student's should have a Reg no.</small>
        <br>
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="search">Generate</button>
        </form>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
      <div class="card">
          <div class="card-header" >
              Here is your Library Card
          </div>
        <div class="card-body" id="mycard">
          <?php echo $html ?>
        </div>
        <br>
        
     </div>
  </div>
  <hr>
<button id="demo" class="downloadtable btn btn-success" onclick="downloadtable()"> Download Id Card</button>
  
</div>
  <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <script>

function downloadtable() {
    alert("Are you sure you want a Library Card?");

var node = document.getElementById('mycard');

domtoimage.toPng(node)
    .then(function (dataUrl) {
        var img = new Image();
        img.src = dataUrl;
        downloadURI(dataUrl, "libraryCard.png")
    })
    .catch(function (error) {
        console.error('oops, something went wrong', error);
    });

}



function downloadURI(uri, name) {
var link = document.createElement("a");
link.download = name;
link.href = uri;
document.body.appendChild(link);
link.click();
document.body.removeChild(link);
delete link;
}





</script>
  </body>
</html>