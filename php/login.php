<?php
    $password=$_POST["password"];
    $username=$_POST["username"];
    
    $host="YOURSERVER";
    $dbuser="USER";
    $dbpassword="PASSWORD";
    $dbname="NAME";
    $status=1000;
    $sql="SELECT * FROM accounts";
    if ( !( $database = mysqli_connect( $host , $dbuser, $dbpassword ) ) )
        print( "<p>Could not connect to database</p>" );
    if ( !mysqli_select_db($database,$dbname ) )
        print( "<p>Could not open products database</p>" );
    if(($result=mysqli_query($database,$sql) and mysqli_num_rows($result)>=0))
    {
        
        while ($row = mysqli_fetch_assoc($result))
        {
            if($row['id']==$username && $row['password']==$password)
            {   
                $status=1;
                break;
            } 
            if(strcmp($row['id'],$username) && $row['password']!=$password )
            {
                $status=2;
            }                
        }

        if($status==1)
        {
            print("LOGIN SUCCESS");
        }
        if($status==2 )
            print("Wrong Password");
        else if($status==0)
            print("NO SUCH ACCOUNT");
    }
    else
    {
        print("<p>Cannt execute the query</p>");
    }
    

    mysqli_close( $database );
?>
