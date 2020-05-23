@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                Laravel Client side form alidation example
                </div>
                <div class="container">
                    <form id="form">
                      @csrf
                      <div class="form-group col-md-6">
                        <label for="exampleFormControlFile1">Enter Name<small style="color:red">*</small></label>
                        <input type="text" class="form-control-file" name="name" id="name" />
                      </div>
                      <div class="form-group col-md-6">
                        <label for="exampleFormControlFile1">Enter Email <small style="color:red">*</small></label>
                        <input type="text" class="form-control-file" name="email" id="email"/>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="exampleFormControlFile1">Enter Phone <small style="color:red">*</small></label>
                        <input type="text" class="form-control-file" name="phone" id="phone"/>
                      </div>
                       <div class="form-group col-md-12">
                        <label for="exampleFormControlFile1">Gender <small style="color:red">*</small></label>
                         <div class="form-group col-md-6">
                        <label for="exampleFormControlFile1">Male</label>
                        <input type="radio" class="form-control-file" name="gender" id ="gender"  value="Male"/>
                       
                      </div>
                       <div class="form-group col-md-6">
                        <label for="exampleFormControlFile1">Female</label>
                       
                       <input type="radio" class="form-control-file" name="gender" id="gender" value="Female"/>
                      </div>
                      </div>
                      
                     <div class="form-group col-md-5">
                       
                        <input type="button" class="form-control-file btn btn-primary"   onclick="return validation()" value="Submit">
                      </div>
                    </form>
                </div>
               <div class="container">
                 <table class="table">
                          <thead>
                            <tr>
                              <th scope="col">&nbsp;</th>
                              <th scope="col">SL</th>
                              <th scope="col">Name</th>
                              <th scope="col">Email</th>
                              <th scope="col">Gender</th>
                            </tr>
                          </thead>
                          <tbody id="row">
                            <?php $count  = 1; ?>
                            @foreach($data as $datas)
                            <tr >
                             
                              <td><input type="checkbox" name="ids[]"/></td>
                              <th scope="row">{{$count}}</th>
                              <td>{{$datas->name}}</td>
                              <td>{{$datas->email}}</td>
                              <td>{{$datas->gender}}</td>
                            </tr>
                            <?php $count++; ?>
                            @endforeach
                            
                          </tbody>
                        </table>
               </div>       

            </div>
        </div>
    </div>
</div>
@endsection

<script>
function validation(id = null){
let name =  $("#name").val();
let email = $("#email").val();
let phone = $("#phone").val();
let gender = $("#gender").val();
let regx =/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
let regxphone =/^\d{10}$/;
var count = 1;
var errors=0;

//name.css({"border-color":"red"});
   let fields =[name,email,phone,gender];
   var ids =[$("#name"), $("#email"), $("#phone"),$("#gender")];
//   let count = 0;

 for(let i= 0;i<fields.length;i++){
   

    if(fields[i]==""){
            errors = count;
            ids[i].css({"border-color":"red"});
            count++;
    }
    else{
          
          ids[i].css({"border-color":"white"});
    }


    if(fields[i]==email){

        if(email == ""){
               errors = count;
              ids[i].css({"border-color":"red"});
               count++;
        }
      

       else if(!regx.test(email)){
          errors = count;
         ids[i].css({"border-color":"red"});
          count++;
        }
    }
     else{
           
          ids[i].css({"border-color":"white"});
    }

     if(fields[i]==phone){
       if(phone==""){
             errors = count;
          ids[i].css({"border-color":"red"});
           count++;
       }
        

        else if(!regxphone.test(phone)){
        errors = count;
        ids[i].css({"border-color":"red"});
         count++;
        }
        else{
           
            ids[i].css({"border-color":"white"});
        }
    }

 }
         if(errors){
            return false;
         }
         else{
           store();
           $("#form")[0].reset();
           return true;
         }
   
   
                                                                                                                                                                                                                                                                                          
}
    let count  = "<?php echo $count; ?>";
  function store(){
   

          let data = $("#form").serializeArray();
         

         $.ajax({
            url: "{{route('store')}}",
            type: 'POST',
            data: data,
            datatype: 'json'
        })
        .done(function (data) { 

          
          $("#row").append("<tr><td><input type='checkbox' name='ids[]'/></td><th scope='row'>"+count+"</td><td>"+data.data.name+"</th><td>"+data.data.email+"</td><td>"+data.data.gender+"</td></tr>")
            count++;
         })
        .fail(function (jqXHR, textStatus, errorThrown) { 

         console.log('error');
         });
  }
</script>
