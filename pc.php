<?php include('nav.php')?>
<center><h1>Pin Changed Page</h1></center><hr>
<br>
<div class="row">
<div class="col-md-3"></div>
<div class="col-md-5" style="border:2px solid blue; padding:20px">

<?php


if(isset($_REQUEST['submit']))
    {
        $ac=$_REQUEST['ac'];
        $p=$_REQUEST['p'];
        $np=$_REQUEST['np'];

        $con=mysqli_connect('localhost', 'root', '', 'db');

        $q="select * from account where acno='$ac' && pin='$p'";
    
        $rs=mysqli_query($con, $q);
        $x=mysqli_num_rows($rs);
        if($x>0)
        {
            $q="update account set pin='$np' where acno='$ac'";
            mysqli_query($con,$q);
            echo"<div class='alert alert-success' role='alert'>
                <h3>Pin Changec Succefully</h3>
                </div>";
        }
        else 
            echo"<div class='alert alert-danger' role='alert'>
                <h3>Invalid Account or Pin</h3>
                </div>";
    }
?>

<form>

Enter Account Number
<input type="text" class="form-control" name="ac">
Enter Pin  Number
<input type="text" class="form-control" name="p">
Enter new Pin
<input type="text" class="form-control" name="np">

<br><br>
<input type="submit" name="submit" value="Changed Pin" class="btn btn-success">
<form>
</div>