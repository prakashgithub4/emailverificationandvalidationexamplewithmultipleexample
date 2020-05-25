<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>


  <style>
   .redborder{
    border: solid 1px red;
   }
  </style>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Condensed Table</h2>
 
  <form>         
   <p><button type="button" class="btn btn-info" onclick="validation()">Submit</button></p>   
  <table class="table table-condensed" border="1">
    <thead>
      <tr align="center">
        <th>Name</th>
        <th>Role</th>
        <th>Subject</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody id="row" >
      <tr align="center" id ="tr_0">
        <td>
          <input type="text" name="name[]"  />
          <small></small>

        </td>
        <td>
          <input type="text" name="role[]"/>
           <small></small>
        </td>
        <td><input type="text" name="sub[]"/></td>
         <small></small>
        <td><button type="button" class="btn btn-info" onclick="addmore()">+</button></td>
      </tr>
   
    
    </tbody>
  </table>
</form>
</div>

</body>
</html>
<script>
var count = 1;
function addmore(){
   
  let url = "{{url('addmore/')}}"+"/"+count;
  if(count <= 5)
  {
   
         $.ajax({
            url: url,
            type: 'get',
          
            datatype: 'html'
        })
        .done(function (data) { 
        
          
         $("#row").append(data);
           
         })
        .fail(function (jqXHR, textStatus, errorThrown) { 

         console.log('error');
         });
  }
  
  else{
    alert("no more");
  }
   count++;    

  }

function del(id){
 
 $("#tr_"+id).remove();
    
}

function validation(){

var flag;
let inputs = $("input").each(function(index,item){
    $(this).attr("id","row_"+index);
   
  });

  for (x of inputs) {
    if($(x).val() == ""){

     $(x).addClass("redborder");
     flag = false;
    }
    else{
       $(x).removeClass("redborder");
       flag = true;
    }
  }
  return flag;
 
}
  </script>