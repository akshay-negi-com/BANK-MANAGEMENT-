<?php include('nav.php')?>
<center><h1>Account Summery Page</h1></center><hr>
<br>
<div class="row">
<div class="col-md-3"></div>
<div class="col-md-4" style="border:2px solid blue; padding:20px">

<form>

Enter Account Number
<input type="text" class="form-control" name="ac">
Enter Pin  Number
<input type="text" class="form-control" name="p">

<br><br>
<input type="submit" name="submit" value="Show" class="btn btn-success">
<form>


</div>

<div class="col-md-5" style="border:2px solid blue; padding:20px">

<?php

if(isset($_REQUEST['submit']))
    {
        $ac=$_REQUEST['ac'];
        $p=$_REQUEST['p'];

        $con=mysqli_connect('localhost', 'root', '', 'db');

        $q="select * from account where acno='$ac' && pin='$p'";
    
        $rs=mysqli_query($con, $q);
        $x=mysqli_num_rows($rs);
        if($x>0)
        {
            $q="select * from mytrans where acno='$ac'";
            $rs=mysqli_query($con,$q);
            echo "<table class='table table-bordered table-striped table-hover table-dark'>";
            echo "<tr><td>TID</td><td>Account</td><td>Amount</td><td>Date</td><td>Description</td></tr>";
            while($r=mysqli_fetch_array($rs))
            {
                echo "<tr><td>$r[0]</td><td>$r[1]</td><td>$r[2]</td><td>$r[3]</td><td>$r[4]</td></tr>";
            }
        }
        else 
            echo"<div class='alert alert-danger' role='alert'>
                <h3>Invalid Account or Pin</h3>
                </div>";
    }
?>





</div>