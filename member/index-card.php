
<?php  

// Connect to the Database 
include('config.php');

$insert = false;
$update = false;
$empty = false;
$delete = false;
$already_card = false;



if(isset($_GET['delete'])){
  $sno = $_GET['delete'];
  $delete = true;
  $sql = "DELETE FROM `cards` WHERE `sno` = $sno";
  $result = mysqli_query($conn, $sql);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (isset( $_POST['snoEdit'])){
      // Update the record
        $sno = $_POST["snoEdit"];
        $name = $_POST["nameEdit"];
        $id_no = $_POST["reg_noEdit"];

      // Sql query to be executed
      $sql = "UPDATE `cards` SET `name` = '$name' , `reg_no` = '$reg_no' WHERE `cards`.`sno` = $sno";
      $result = mysqli_query($conn, $sql);
      if($result){
        $update = true;
    }
    else{
        echo "We could not update the record successfully";
    }
}
else{
    $name = $_POST["name"];
    $reg_no = $_POST["reg_no"];
    $level = $_POST['level'];
    $session = $_POST['session'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $faculty = $_POST['faculty'];
    $department = $_POST['department'];
    $phone = $_POST['phone'];

    if($name == '' || $reg_no == ''){
        $empty = true;
    }
    else{
        //Check that Card no. is Already Registerd or not.
        $querry = mysqli_query($conn, "SELECT * FROM cards WHERE reg_no= '$reg_no' ");
        if(mysqli_num_rows($querry)>0)
        {
             $already_card = true;
        }
        else{


          // image upload 
          $uploaddir = 'img/';
          $uploadfile = $uploaddir . basename($_FILES['image']['name']);

      
          if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
              
          } else {
              echo "Possible file upload attack!\n";
          }
  // Sql query to be executed
  $sql = "INSERT INTO `cards`(`name`, `reg_no`, `email`, `phone`, `address`, `level`, `session`, `faculty`, `department`, `image`) VALUES ('$name','$reg_no','$email]','$phone','$address','$level','$session', '$faculty', '$department','$uploadfile')"; 

  // $sql = "INSERT INTO `cards` (`name`, `reg_no`) VALUES ('$name', '$reg_no')";
  $result = mysqli_query($conn, $sql);



   
  if($result){ 
      $insert = true;
  }
  else{
      echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
  } 
}
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
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="icon" type="image/png" href="images/favicon.png"/>
  <title>Library Card </title>

</head>

<body>
 

  <!-- Edit Modal -->
  <!-- <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Edit This Card</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form method="POST">
          <div class="modal-body">
            <input type="hidden" name="snoEdit" id="snoEdit">
            <div class="form-group">
              <label for="name">Student Name</label>
              <input type="text" class="form-control" id="nameEdit" name="nameEdit">
            </div>

            <div class="form-group">
              <label for="desc">Reg. Number:</label>
              <input class="form-control" id="id_noEdit" name="id_noEdit" rows="3"></input>
            </div> 
          </div>
          <div class="modal-footer d-block mr-auto">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div> -->


  <?php
  if($insert){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your Card has been inserted successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
  }
  ?>
  <?php
  if($delete){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your Card has been deleted successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
  }
  ?>
  <?php
  if($update){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your Card has been updated successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
  }
  ?>
   <?php
  if($empty){
    echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
    <strong>Error!</strong> The Fields Cannot Be Empty! Please Give Some Values.
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
  }
  ?>
     <?php
  if($already_card){
    echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
    <strong>Error!</strong> This Card is Already Added.
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
  }
  ?>
  <div class="container my-4">
  <button class="btn btn-success" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
  <i class="fa fa-plus"></i> Add New Card
  </button>
  <a href="id-card.php" class="btn btn-success">
  <i class="fa fa-address-card"></i> Generate ID Card
</a>
</p>
<div class="collapse" id="collapseExample">
  <div class="card card-body">

    <form method="POST" enctype="multipart/form-data">
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputCity">Student Name</label>
        <input type="text" name="name" class="form-control" id="inputCity">
      </div>
      <div class="form-group col-md-4">
        <label for="inputState">Session</label>
        <select name="session" class="form-control">
          <option selected>Choose...</option>
          <option value="2018/2019">2018/2019</option>
          <option value="2019/2020">2019/2020</option>
          <option value="2020/2021">2020/2021</option>
          <option value="2021/2022">2021/2022</option>
          <option value="2022/2023">2022/2023</option>
        </select>
      </div>
      <div class="form-group col-md-2">
        <label for="inputZip">Level</label>
        <select name="level" class="form-control">
          <option selected>Choose...</option>
          <option value="Level 100">Level 100</option>
          <option value="Level 200">Level 200</option>
          <option value="Level 300">Level 300</option>
          <option value="Level 400">Level 400</option>
          <option value="Level 500">Level 500</option>
        </select>
      </div>
      <div class="form-group col-md-4">
        <label for="inputZip">Faculty</label>
        <input type="text" name="faculty" class="form-control">
      </div>
      <div class="form-group col-md-4">
          <label for="reg_no">Reg No.</label>
          <input class="form-control" id="reg_no" name="reg_no" ></input>
      </div>
      <div class="form-group col-md-4">
        <label for="inputState">Email Id</label>
        <input type="text" name="email" class="form-control">
      </div>
    </div>
    <div class="form-row">
    <div class="form-group col-md-4">
        <label for="inputCity">Department</label>
        <input type="text" name="department" class="form-control">
      </div>
      <div class="form-group col-md-5">
        <label for="inputCity">Address</label>
        <input type="text" name="address" class="form-control">
      </div>
      <div class="form-group col-md-3">
          <label for="phone">Phone No.</label>
          <input class="form-control" id="phone" name="phone" ></input>
        </div>
     
    </div>
      
      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="photo">Photo</label>
          <input type="file" name="image" />
        </div>
      </div>
      <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Add Card</button>
    </form>
  </div>
</div>

  
  <hr>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>
  <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script>

    
    $(document).ready(function () {
      $('#myTable').DataTable();

    });
  </script>
 
</body>

</html>
