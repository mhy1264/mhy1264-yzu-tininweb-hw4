<?php
    $seq=$_POST["seq"];

    $host="YOURSERVER";
    $dbuser="USER";
    $dbpassword="PASSWORD";
    $dbname="NAME";
    
    $sql="DELETE FROM `todolist` WHERE `seq`='$seq'";
    if ( !( $database = mysqli_connect( $host , $dbuser, $dbpassword ) ) )
        print( "<p>Could not connect to database</p>" );
    if ( !mysqli_select_db($database,$dbname ) )
        print( "<p>Could not open products database</p>" );
    if(!($result=mysqli_query($database,$sql)))
        print("<p>Cannt execute the query</p>");
    if(!($result=mysqli_query($database,$sql)))
        print("<p>Cannt execute the query</p>");
    else
        print("success");
    mysqli_close( $database );
?>
