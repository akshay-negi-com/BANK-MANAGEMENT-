<?php include('nav.php')?>
<center style="background-color: lightgray; color: lightcoral; padding-top: 10px; padding-bottom: 10px;"><h1>Balance Enquery Page</h1></center>
<br>
<div class="row">
<div class="col-md-3"></div>
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
            $r=mysqli_fetch_array($rs);
            $camt=$r['amount'];
            echo"<div class='alert alert-success' role='alert'>
                <h3>Your current balance is $camt</h3>
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
<br><br>
<input type="submit" name="submit" value="Balance" class="btn btn-success">
</form>
</div>