<?php include('nav.php')?>
<center style="background-color: lightgray; color: lightcoral; padding-top: 10px; padding-bottom: 10px;"><h1>Fund Transfer Page</h1></center>
<br>
<div class="row">
<div class="col-md-3"></div>
<div class="col-md-5" style="border:2px solid blue; padding:20px">

<?php
    if(isset($_REQUEST['submit']))
    {
        $ac=$_REQUEST['ac'];
        $p=$_REQUEST['p'];
        $amt=$_REQUEST['a'];
        $ac2=$_REQUEST['tac'];

    $con=mysqli_connect('localhost', 'root', '', 'db');
    $q="select * from account where acno='$ac' && pin='$p'";
    
    $rs=mysqli_query($con,$q);
    $x=mysqli_num_rows($rs);
    if($x>0)
    {
        $r=mysqli_fetch_array($rs);
        $camt=$r['amount'];
        echo "<br>Amount $camt";
        if($camt>=$amt)
        {
            $q="select * from account where acno='$ac2'";
            $rs=mysqli_query($con,$q);
            $x=mysqli_num_rows($rs);
            if($x>0)
            {
            $r=mysqli_fetch_array($rs);
            $tamt=$r['amount'];
            $camt=$camt-$amt;
            $tamt=$tamt+$amt;

            $q="update account set amount='$camt' where acno='$ac'";
            mysqli_query($con,$q);
            $q="update account set amount='$tamt' where acno='$ac2'";
            mysqli_query($con,$q);
                $d=date('d-m-y');
            $t=date('h:i:s');
            $dt=$d." : ".$t;
            $q="insert into mytrans(acno,amount,dt,ds)values('$ac','$amt','$dt','Transfer')";
            mysqli_query($con,$q);
            $q="insert into mytrans(acno,amount,dt,ds)values('$ac2','$amt','$dt','Recieve')";
            mysqli_query($con,$q);

            
            echo"<div class='alert alert-success' role='alert'>
    <h3>After transfer $amt Your current balance is $camt</h3>
</div>";
            }
            else
            echo"<div class='alert alert-danger' role='alert'>
  <h3>Invalid Benificairy Account</h3>
</div>";
            
        }
        else
            echo"<div class='alert alert-danger' role='alert'>
  <h3>Amount transferred</h3>
</div>";
 
    }
    else
            echo"<div class='alert alert-danger' role='alert'>
  <h3>Insufficient balance</h3>

</div>";
    }
?>

<form>
Enter Account Number
<input type="text" class="form-control" name="ac">
Enter Pin  Number
<input type="text" class="form-control" name="p">
Enter Amount to Transfer
<input type="text" class="form-control" name="a">
Enter Account to Transfer
<input type="text" class="form-control" name="tac">

<br><br>
<input type="submit" name="submit" value="Tranfer" class="btn btn-success">
</form>
</div>