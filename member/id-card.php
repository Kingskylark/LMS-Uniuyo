<?php 
require "../header.php";
        $notfound = false;
        include 'config.php';
        $html = '';
        if(isset($_POST['search'])){

             $reg_no = $_POST['reg_no'];

             $sql = "Select * from cards where reg_no='$reg_no' ";

             $result = mysqli_query($conn, $sql);
 
 
             if(mysqli_num_rows($result)>0){
             $html="<div class='' style='width:100%; padding:0;' >";
     
               $html.="";
                         while($row=mysqli_fetch_assoc($result)){
                             
                            $name = $row["name"];
                            $reg_no = $row["reg_no"];
                            $level = $row['level'];
                            $session = $row['session'];
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
                                  
                                              <div class='container-3 d-flex justify-content-around'>
                                                  
                                                      <div class='id'>
                                                          <h4>Reg No</h4>
                                                          <p>$reg_no</p>
                                                      </div>
                                  
                                                      <div class='id'>
                                                      <h4>Session</h4>
                                                      <p>$session</p>
                                                  </div>

                                                  <div class='id'>
                                                          <h4>Faculty</h4>
                                                          <p>$faculty</p>
                                                      </div>
                                                      </div>

                                                      <div class='d-flex justify-content-around container-4'>
                                                      <div class='dob'>
                                                          <h4>Phone</h4>
                                                          <p>$phone</p>
                                                      </div>
                                  
                                                
                                                  <div class='dob'>
                                                  <h4>Department</h4>
                                                  <p>$department</p>
                                                  </div>
                                                  
                                                  </div>
                                                  
                                                  <div class=' d-flex justify-content-around container-5'>
                                                  <div class = 'dob'>
                                                  <h4 >Signature</h4> 
                                                  <p >....................</p>
                                                  </div>
                                                  <div class = 'dob'>
                                                  <h4>Level</h4>
                                                  <p >$level</p>
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
   font-family:'Orbitron', sans-serif'
   width:100%;
   }

/* .lavkush img {
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
} */
 /* second id card  */
 .box-2 p{
     font-size: 13px;
     /* margin-top: -5px; */
     margin-bottom:0;
 }
 .container {
    width: 300px;
    height: 200px;
    margin: auto;
    background-color: white;
    /* box-shadow: 0 1px 10px green; */
    overflow: hidden;
    border-radius: 10px;
    border:none;
    margin-top:10px;
    background-image: url("../img/favicon-32x32.png");
    /* background-repeat:none; */
    background-size:cover;
    background-blend-mode: multiply;
  }

  .container h4{
    margin-bottom:0px!important
  }
  .container p{
    margin-bottom:0px!important
  }

.header {
    width: 100%;
    height: 15%;
    background-color: transparent;
    overflow: hidden;
    font-family: 'Poppins', sans-serif;
}

.header h1 {
    color: green;
    text-align: center;
    margin-left: 4.7rem;
    margin-top: 5px;
    margin-bottom: 15px;
    font-size:20px;
    font-weight:bold
}

.container-2 {
    width: 100%;
    /* height: 10vh; */
    margin: 0px auto;
    /* margin-top: -20px; */
    display: flex;
}

.box-1 {
    border: 2px solid green;
    width:40%;
    height: 60px;
    margin-top: -1rem;
    margin-right: 1rem;
    border-radius: 5px;
    overflow:hidden
  
}

.box-1 img {
    width: 100%;
    height: 100%;
    overflow:hidden
}

.box-2 {
    flex-grow:1;
    width: 100%;
    /* height: 8vh; */
    margin: 7px 0px;
    /* padding: 5px 7px 0px 0px; */
    text-align: left;
    font-family: 'Poppins', sans-serif;
}

.box-2 h2 {
    font-size: 16px;
    /* margin-top: -5px; */
    color: black;
    /* text-align:center; */
    margin-bottom: 0px!important;
    font-weight:bold;
}


.container-3 {
    display:    flex;
    font-family: 'Shippori Antique B1', sans-serif;
    font-size: 0.7rem;
    text-align:center;
    gap:5%
}
.container-4 {
    display:    flex;
    font-family: 'Shippori Antique B1', sans-serif;
    font-size: 0.7rem;
    text-align:center;
    gap:5%
}
.container-5 {
    display:    flex;
    font-family: 'Shippori Antique B1', sans-serif;
    font-size: 0.7rem;
    text-align:center;
    gap:5%
}

.id h4 {
    color: green;
    font-size:16px;
    /* margin-bottom:1px */
    font-weight:bold;
}

.dob h4 {
    color: green;
    font-size:16px;
    /* margin-bottom:1px; */
    /* margin-top:10px; */
    font-weight:bold;
}
/


    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.6.0/dom-to-image.js"></script>
  </head>
  <body>


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
        <div class="" id="mycard">
          <?php echo $html ?>
        </div>
        <br>
        
     </div>
     
  </div>
  <hr>
<button id="demo" class="downloadtable btn btn-primary" onclick="downloadtable()"> Download Id Card</button>
<button onclick="history.back()" class="btn btn-success ml-2" >Back</button>
  
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