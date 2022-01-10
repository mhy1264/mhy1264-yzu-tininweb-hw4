<?php
    $username=$_POST["username"];
    $date=$_POST["date"];
    $thing=$_POST["thing"];

    $host="YOURSERVER";
    $dbuser="USER";
    $dbpassword="PASSWORD";
    $dbname="NAME";

    $sql="SELECT * FROM `todolist`";
    if ( !( $database = mysqli_connect( $host , $dbuser, $dbpassword ) ) )
        print( "<p>Could not connect to database</p>" );
    if ( !mysqli_select_db($database,$dbname ) ) 
        print( "<p>Could not open products database</p>" );
    if(!($result=mysqli_query($database,$sql)))
        print("<p>Cannt execute the query</p>");
    while ($row = mysqli_fetch_assoc($result))
    {
        $size=$row['seq'];
    }   
    $size+=1;
    $sql="INSERT INTO `todolist`(`seq`,`thing`, `date`, `owner`) VALUES ('$size','$thing','$date','$username')";
    if(!($result=mysqli_query($database,$sql)))
        print("<p>Cannt execute the query</p>");

    mysqli_close( $database );
?>
