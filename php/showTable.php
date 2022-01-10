<?php
    $username=$_POST["username"];

    $host="YOURSERVER";
    $dbuser="USER";
    $dbpassword="PASSWORD";
    $dbname="NAME";
    $today=date("Y-m-d");

    $sql="SELECT * FROM `todolist` WHERE `owner`='$username'";
    if ( !( $database = mysqli_connect( $host , $dbuser, $dbpassword ) ) )
        print( "<p>Could not connect to database</p>" );
    if ( !mysqli_select_db($database,$dbname ) ) 
        print( "<p>Could not open products database</p>" );
    if(!($result=mysqli_query($database,$sql)))
        print("<p>Cannt execute the query</p>");

    $out='<table id="todolist"><tr><td style="display:none;">sql</td><td>NO.</td><td>thing</td><td>time</td><td>Modify</td><td>Delete</td><tr>';
    print($out);
    $count=0;
    while ($row = mysqli_fetch_assoc($result))
    {
        if(!strcmp($row['date'],date("Y-m-d")))
        {
            $style="color: red;";
        }
        else 
        {
            $style="color : black;";
        }
        $count++;
        $out1="<tr>";
        $out7='<td><p style="'.$style.'display:none;" id="'.$row['seq'].'seq">'.$row['seq'].'</p></td>';
        $out2='<td><p style="'.$style.'" id="'.$count.'">'.$count.'</p></td>';
        $out3='<td><p style="'.$style.'" id="'.$count.'thing">'.$row['thing'].'</p></td>';
        $out4='<td><p style="'.$style.'" id="'.$count.'date">'.$row['date'].'</p></td>';
        $out5='<td><input type="button" id="'.$row['seq'].'mod" onclick="modify()" value="Modify"</td>';
        $out6='<td><input type="button" id="'.$row['seq'].'del" onclick="deleteItem()" value="Delete"</td>'.'</tr>'; 
        $out=$out1.$out2.$out3.$out4.$out5.$out6;
        print($out);
    }
    $out="</table>";
    print($out);
    mysqli_close( $database );
//style="display:none;"
?>