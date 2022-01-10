var username;

function deleteItem()
{
  var seq= parseInt( event.target.id);
  $.ajax({
    url: "php/delete.php",
    data: {
      seq,seq
    },
    type: "POST",
    datatype: "html",
    success: function( output ) {
      alert(output);
      showTable();
    },
    error : function(){
      alert( "Request failed." );
    }
  }); 
}

function modifyItem(seq)
{
  var postDate = $("#postDate").val();
  var postThing = $("#postThing").val();
  $.ajax({
    url: "php/modify.php",
    data: {
      seq:seq,
      postThing:postThing,
      postDate:postDate
    },
    type: "POST",
    datatype: "html",
    success: function( output ) {
      alert("modify success");
      showTable();
      $( "#modifyForm" ).remove;
    },
    error : function(){
      alert( "Request failed." );
    }
  }); 
}


function modify()
{
  var seq= parseInt( event.target.id);
  var form='<form><p><input type="text" id="postThing" require > <input type="date" id="postDate" require ></p><p><input type="button" onclick="modifyItem('+seq+')"></p></table>';
  $( "#modifyForm" ).html(form);
}


/*
  modify()
  | - show the modify form 
  | - call add()
  | - call delete() 
*/
function showTable()
{
  $.ajax({
    url: "php/showTable.php",
    data: {
      username:username
    },
    type: "POST",
    datatype: "html",
    success: function( output ) {
      $( "#list" ).html(output);
    },
    error : function(){
      alert( "Request failed." );
    }
  });
}

function login() {
  var password = $("#password").val();
  username = $("#username").val();       
  $.ajax({
    url: "php/login.php",
    data: {
      username:username,
      password:password
    },
    type: "POST",
    datatype: "html",
    success: function( output ) {
      $( "#out" ).html(output);
      if(output=="LOGIN SUCCESS"){
        $( "#login" ).remove();
        document.getElementById("todo").style.display = "block"; // 顯示todo
        var addtodo='<form method="post"><input type="text" id="thing" required="" /><input type="date" id="date" required="" />'
        addtodo+='<input type="button" onclick="addevent()" value="add"></form>';
        $( "#add" ).html(addtodo);
        showTable();
      }
    },
    error : function(){
      alert( "Request failed." );
    }
  }); 
}

  

function addevent()
{
  var thing=$("#thing").val();
  var date=document.getElementById("date").value;
  console.log(date);
  console.log(username);
  $.ajax({
    url: "php/add.php",
    data: {
      username:username,
      thing:thing,
      date:date
    },
    type: "POST",
    datatype: "html",
    success: function( output ) {
      console.log(output);
      alert("success");
      showTable(username);
    },
    error : function(){
      alert( "Request failed." );
    }
  });
}                                                                                                                                                      

function start()
{
  document.getElementById("todo").style.display = "none";
}
window.addEventListener("load",start,false);