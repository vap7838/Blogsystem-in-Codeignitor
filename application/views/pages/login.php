<!DOCTYPE html>
<html lang="en">
<body>
    <div class="container">
    <form id="form"  style="margin: 50px 250px 0px 250px;">
    

        <div class="form-group">
        <label for="Username">Username</label>
        <input type="text" class="form-control" id="uname"  name="uname" placeholder="Enter Username">
        </div>

        <div class="form-group" id="password1">
        <!-- <label for="Password">Password</label>
        <input type="password" class="form-control" id="password"  name="password" placeholder="Enter Password"> -->
        </div>

        <button  type="submit" value="submit" id="button" class="btn btn-primary btn-lg">Login</button>

    </form>
    </div>  
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"  crossorigin="anonymous"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
    <script>
    $(document).ready(function(){
        $('#form').submit(function(e){
            e.preventDefault();
            $.ajax({
                 url: '<?php echo base_url();?>login_controller/loginprocess',
                 type: 'POST',
                 data : new FormData(this),
                 dataType: "json",  
                 processData: false,    
                 contentType: false,
                 cache:false,
                 async:false,
                 success: function(response){    
                     console.log(response);
                     if(response == true){
                     alert('Login successfull!');
                     window.location.href = "<?php echo base_url();?>course_controller/course";
                     }else{
                        alert('Login not successfull!');
                        window.location.href = "<?php echo base_url();?>login_controller/login";
                     }
                    
                     }
             });
        });
    });
     $(document).ready(function(){
        $('#uname').blur(function(e){
            e.preventDefault();
            var uname = $('#uname').val();
            $.ajax({
                        type:"post",
                        url: "<?php echo base_url(); ?>user/user_exist",
                        data:{uname:uname},
                        datatype:"json",
                        success:function(response)
                        
                        {
                            console.log(response);
                            if (response === "true") 
                            {   
                                $('#password1').show();
                                $('#password1').html(` <label for="Password">Password</label>
                                     <input type="password" class="form-control" id="password"  name="password" placeholder="Enter Password">`);
                                $('#button').prop('disabled',false);
                            }
                            else 
                            {   
                                alert("register first");
                                $('#password1').hide();
                                $('#button').prop('disabled',true);
                                // $('#button').prop('disabled',false);
                            }  
                        }
            });
        });
    });
    </script>
    
        </body>
    </html>