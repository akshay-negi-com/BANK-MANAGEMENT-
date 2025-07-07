<?php include('nav.php')?>
<center><h1>Open Your First Account</h1></center><hr>
<br>
<div class="row">
<div class="col-md-3"></div>
<div class="col-md-6" style="border:2px solid blue; padding:20px">

<hr>
<?php
    if(isset($_REQUEST['submit']))
    {
        $p=$_REQUEST['p'];
        $n=$_REQUEST['n'];
        $fn=$_REQUEST['f'];
        $e=$_REQUEST['e'];
        $ph=$_REQUEST['ph'];
        $g=$_REQUEST['g'];
        $c=$_REQUEST['c'];
        $s=$_REQUEST['s'];
        $ct=$_REQUEST['ct'];
        $amt=$_REQUEST['a'];
        $ac="SBI";
    $con=mysqli_connect('localhost', 'root', '', 'db');

    $q="select * from account";
    
    $rs=mysqli_query($con,$q);
    $x=mysqli_num_rows($rs);
    if($x>0)
    {
        $x=$x+101;
        $ac=$ac.$x;
    }
    else
    $ac="SBI101";
 
   $q="insert into account values('$ac','$p','$n','$fn','$e','$ph','$g','$c','$s','$ct','$amt')";
        $x=mysqli_query($con, $q)or die("Coudl not crate ".mysqli_error($con));
            if($x>0)
            echo"<div class='alert alert-success' role='alert'>
  Account Open Succefully with account Nubmer $ac
</div>";
            else
            echo"<div class='alert alert-danger' role='alert'>
  Could not Create Account
</div>";
    }

?>
<hr>
<form>
<div class="row">
<div class="col">
Enter Pin 
<input type="text" name="p" class="form-control">
</div>
</div>
<br>

<div class="row">
<div class="col">
Enter Name
<input type="text" name="n" class="form-control">
</div>
<div class="col">
Enter FName
<input type="text" name="f" class="form-control">
</div>

</div>
<br>

<div class="row">
<div class="col">
Enter Email
<input type="text" name="e" class="form-control">
</div>
<div class="col">
Enter Phone
<input type="text" name="ph" class="form-control">
</div>

</div>
<br>

<div class="row">
<div class="col">
Enter Gender
<input type="text" name="g" class="form-control">
</div>

</div>
<br>


<div class="row">
<div class="col">
Enter Country
<input type="text" name="c" class="form-control">
</div>
<div class="col">
Enter State
<input type="text" name="s" class="form-control">
</div>

<div class="col">
Enter City
<input type="text" name="ct" class="form-control">
</div>

</div>
<br>
<div class="row">
<div class="col">
Enter Opening Amount
<input type="text" name="a" class="form-control">
</div>

</div>

<input type="submit" name="submit" value="Create Account" class="btn btn-success">
</div>
<form>
</div>
