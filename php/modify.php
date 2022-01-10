<?php

    $seq=$_POST["seq"];
    $postThing=$_POST["postThing"];
    $postDate=$_POST["postDate"];
    $host="YOURSERVER";
    $dbuser="USER";
    $dbpassword="PASSWORD";
    $dbname="NAME";
    

    $sql="UPDATE `todolist` SET `thing`='$postThing',`date`='$postDate' WHERE `seq`='$seq'";
    if ( !( $database = mysqli_connect( $host , $dbuser, $dbpassword ) ) )
        print( "<p>Could not connect to database</p>" );
    if ( !mysqli_select_db($database,$dbname ) ) 
        print( "<p>Could not open products database</p>" );
    if(!($result=mysqli_query($database,$sql)))
        print("<p>Cannt execute the query</p>");
    mysqli_close( $database );

?>