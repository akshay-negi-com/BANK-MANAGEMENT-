<?php include('nav.php')?>
<center style="background-color: lightgray; color: lightcoral; padding-top: 10px; padding-bottom: 10px;"><h1>Deposit Amount Page</h1></center>
<br>
<div class="row">
<div class="col-md-3"></div>
<div class="col-md-5" style="border:2px solid blue; padding:20px">

<?php
    if(isset($_REQUEST['submit']))
    {
        $ac=$_REQUEST['ac'];
        $p=$_REQUEST['p'];
        $d=$_REQUEST['d'];
    $con=mysqli_connect('localhost', 'root', '', 'db');

    $q="select * from account where acno='$ac' && pin='$p'";
    
    
    $rs=mysqli_query($con,$q);
    $x=mysqli_num_rows($rs);
    if($x>0)
    {
        $r=mysqli_fetch_array($rs);
        $camt=$r['amount'];
       
            $camt=$camt+$d;
            $q="update account set amount='$camt' where acno='$ac'";
            mysqli_query($con,$q)or die("Could not Deposit ".mysqli_error($con));
                    $d=date('d-m-y');
            $t=date('h:i:s');
            $dt=$d." : ".$t;
            $q="insert into mytrans(acno,amount,dt,ds)values('$ac','$d','$dt','Deposit')";
            mysqli_query($con,$q)or die("Could not Update ".mysqli_error($con));

            echo"<div class='alert alert-success' role='alert'>
    <h3>After deposit $d Your current balance is $camt</h3>
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
Enter Amount to Deposit
<input type="text" class="form-control" name="d">
<br><br>
<input type="submit" name="submit" value="Deposit" class="btn btn-success">
<form>
</div>