<?php
    $password=$_POST["password"];
    $username=$_POST["username"];

    $host="YOURSERVER";
    $dbuser="USER";
    $dbpassword="PASSWORD";
    $dbname="NAME";
    
    $sql="SELECT * FROM accounts";
    if ( !( $database = mysqli_connect( $host , $dbuser, $dbpassword ) ) )
        print( "<p>Could not connect to database</p>" );
    if ( !mysqli_select_db($database,$dbname ) )
        print( "<p>Could not open products database</p>" );
    if(($result=mysqli_query($database,$sql) and mysqli_num_rows($result)>=0))
    {
        $status=1;
        while ($row = mysqli_fetch_assoc($result))
        {
            if($row['id']==$username)
            {
                $status=0;
                break;
            }
        }

        if($status)
        {
            $sql="INSERT INTO `accounts`(`id`, `password`) VALUES ('$username','$password')";
            mysqli_query($database,$sql);
            print("<p>ACCOUNTS CREADED</p>");
        }
        else
            print("<p>ACCOUNTS ALREADY EXISTS</p>");
    }
    else
    {
        print("<p>Cannt execute the query</p>");
    }
        

    mysqli_close( $database );
?>
