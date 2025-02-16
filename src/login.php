<?php
$name=$_POST['name'];
$mailid=$_POST['mailid'];
if(!empty($name)||!empty($mailid))
{
    $host="localhost";
    $dbname="root";
    $dbmailid="";
    $dbname="event";
    $conn=new mysqli($host,$dbname,$dbmailid,$dbname);
    if(mysqli_connect_errno()){
        die('connect error('.mysqli_connect_errno().')'.mysqli_connect_error());
    }
    else{
        $select="select mailid from login where mailid=?limit1";
        $insert="insert into login(name,mailid)(?,?)";
        $stmt=$conn->prepare($select);
        $stmt->bind_param("s",$mailid);
        $stmt->execute();
        $stmt->bind_result($mailid);
        $stmt->store_result();
        $rnum=$stmt->num_rows;
        if($rnum==0){
            $stmt->close();
            $stmt=$conn->prepare($insert);
            $stmt->bind_param("ss",$name,$mailid);
            $stmt->execute();
            echo"new record succesfully"; 

        }
        else
         {
            echo"someone already register using this mail";
         }
         $stmt->close();
         $stmt->close();
        
    }
    else
    {
        echo"all field are required";
        die();
    }
}

            


