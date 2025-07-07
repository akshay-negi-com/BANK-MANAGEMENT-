<?php include('nav.php')?>
<center style="background-color: lightgray; color: lightcoral; padding-top: 10px; padding-bottom: 10px;"><h1>Withdraw Amount Page</h1></center>
<br>
<div class="row">
<div class="col-md-3"></div>
<div class="col-md-5" style="border:2px solid blue; padding:20px">
<hr>
<?php
    if(isset($_REQUEST['submit']))
    {
        $ac=$_REQUEST['ac'];
        $p=$_REQUEST['p'];
        $w=$_REQUEST['w'];
    $con=mysqli_connect('localhost', 'root', '', 'db');

    $q="select * from account where acno='$ac' && pin='$p'";
    
    
    $rs=mysqli_query($con,$q)or die("Could not Update ".mysqli_error($con));
    $x=mysqli_num_rows($rs);
    if($x>0)
    {
        $r=mysqli_fetch_array($rs);
        $camt=$r['amount'];
        if($camt>=$w)
        {

            $camt=$camt-$w;
            $q="update account set amount='$camt' where acno='$ac'";
            mysqli_query($con,$q);
            $d=date('d-m-y');
            $t=date('h:i:s');
            $dt=$d." : ".$t;
            $q="insert into mytrans(acno,amount,dt,ds)values('$ac','$w','$dt','Withdraw')";
            mysqli_query($con,$q);
            

            echo"<div class='alert alert-success' role='alert'>
  <h3>After withdraw $w Your current balacne is $camt</h3>
</div>";
        }
        else
            echo"<div class='alert alert-danger' role='alert'>
  <h3>Invsufficient balance</h3>
</div>";
 
    }
    else
            echo"<div class='alert alert-danger' role='alert'>
  <h3>Invalid Account or Pin</h3>
</div>";
    }

?>
<hr>

<form>

Enter Account Number
<input type="text" class="form-control" name="ac">
Enter Pin  Number
<input type="text" class="form-control" name="p">
Enter Amount to Withdraw
<input type="text" class="form-control" name="w">
<br><br>
<input type="submit" name="submit" value="Withdraw" class="btn btn-success">
<form>
</div>