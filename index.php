<!-- Connection -->
<?php
$server="localhost";
$user="root";
$password="";
$databse="todo";
$con=mysqli_connect($server,$user,$password,$databse);
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!-- DataTable Css -->
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
  
    <title>Work Pad</title>
  </head>
  <body>
  <!-- Edit Modal -->

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

  <!-- NAV BAR -->
  <nav class="navbar navbar-expand-lg  navbar navbar-light" style="background-color: #e3f2fd;">
  <a class="navbar-brand" href="#">WP</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Contact Us</a>
      </li>
      
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
 
 <!-- From -->
 <div class="container mt-5">
 <form action="http://localhost/phpPro/crud/" method="POST">
  <div class="form-group">
    <label for="notes">NOTES</label>
    <input type="text" class="form-control" id="notes" name="notes" aria-describedby="emailHelp">
    <small id="emailHelp" class="form-text text-muted">Work Hard Don't Procrastinate</small>
  </div>
  <div class="form-group">
    <label for="description">DESCRIPTION</label>
    <textarea class="form-control" id="description" name ="description" rows="3"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

<!-- Tables -->
<div class="container mt-5">
<table class="table" id="myTable">
  <thead class="table-primary">
    <tr>
      <th scope="col">Sno.</th>
      <th scope="col">Notes</th>
      <th scope="col">Description</th>
      <th scope="col">Actions</th>
      
    </tr>
  </thead>
  <?php
//   Insertion 
  if($_SERVER['REQUEST_METHOD']=="POST"){
      $noteP=$_POST['notes'];
      $descriptionP=$_POST['description'];
      $sql="INSERT INTO `todo`(`notes`,`description`) VALUES ('$noteP','$descriptionP')";
      $run1=mysqli_query($con,$sql);
      if(!$run1){
          echo "error is".mysqli_error();
      }
      else{
          echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
          <strong>Successful</strong> Data Filled In Form
          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
          </button>
        </div>";
       }
    }
    //   <!-- Display data in Table -->

      $sql1="SELECT * FROM `todo` ";
      $run2=mysqli_query($con,$sql1);
    
        $sno=0;
        while($row=mysqli_fetch_assoc($run2)){
            $sno=$sno+1;
          echo"  <tr>
            <th scope='row'>".$sno."</th>
            <td>".$row['notes']."</</td>
            <td>".$row['description']."</</td>
            <td><button type='button' class='edit btn btn-success'>Edit</button>
            <button type='button' class='delete btn btn-danger'>Delete</button></td>
            
            
          </tr>";
        }?>
  
</table>

</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <!-- DataTable jquery -->
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function(){
            $("#myTable").DataTable();
        });
        
    </script>
    <script>
     
    </script>
</body>
</html>