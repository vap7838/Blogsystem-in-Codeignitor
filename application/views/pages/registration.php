<!DOCTYPE html>
<html lang="en">
<body>
    <div class="container">
    <form id="form"  style="margin: 50px 250px 0px 250px;">
        <div class="form-group">
        <label for="FirstName">FirstName</label>
        <input type="text" class="form-control" id="fname"  name="fname" placeholder="Enter FirstName">
        </div>

        <div class="form-group">
        <label for="LastName">LastName</label>
        <input type="text" class="form-control" id="lname"  name="lname" placeholder="Enter LastName">
        </div>

        <div class="form-group">
        <label for="Username">Username</label>
        <input type="text" class="form-control" id="uname"  name="uname" placeholder="Enter Username">
        <span id = "uname" ></span>
        </div>

        <div class="form-group">
        <label for="Qualification">Qualification</label>
        <input type="text" class="form-control" id="qualification"  name="qualification" placeholder="Enter Qualification">
        </div>

        <div class="form-group">
        <label for="Gender">Gender</label>
        <select class="custom-select" id="gender" name="gender">
        <option selected value="">Gender</option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
        <option value="Other">Other</option>
        </select>
        </div>

        <div class="form-group">
        <label for="Email">Email</label>
        <input type="email" class="form-control" id="email"  name="email" placeholder="Enter Email">
        </div>

        <div class="form-group">
        <label for="Password">Password</label>
        <input type="password" class="form-control" id="password"  name="password" placeholder="Enter Password">
        </div>

        <button  type="submit" value="submit" id="button" class="btn btn-primary btn-lg">Signup</button>

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
            var fname = $('#fname').val();            
            var lname = $('#lname').val();
            var uname = $('#uname').val();
            var qualification = $('#qualification').val();
            var gender = $('#gender').val();
            var email = $('#email').val();
            var password = $('#password').val();
            
            $(".error").remove();
             if(fname.length <2){
                 $('#fname').after('<span class="error" style="color: red;" >It is required field min-2 character required</span>');
                 return false ; 
             }else{
                 var regEx = /^[a-zA-Z][a-zA-Z\s]*$/;
                 var validname = regEx.test(fname);
                 if(!validname){
                    $('#fname').after('<span class="error"style="color: red;">Enter only latters</span>');
                    return false ; 
                 }
             }
             if(lname.length < 2){
                 $('#lname').after('<span class="error" style="color: red;">It is required field min-2 character required</span>');
                 return false ; 
             }else{
                 var regEx = /^[a-zA-Z][a-zA-Z\s]*$/;
                 var validlname = regEx.test(lname);
                 if(!validlname){
                    $('#lname').after('<span class="error" style="color: red;">Enter only latters</span>');
                    return false ; 
                 }
             }

             if(uname.length < 1){
                 $('#uname').after('<span class="error" style="color: red;">It is required field </span>');
                 return false ; 
              }
            //   else{
            
            //         $.ajax({
            //             type:"post",
            //             url: "<?php echo base_url(); ?>user/user_exist",
            //             data:{uname:uname},
            //             datatype:"json",
            //             success:function(response)
                        
            //             {
            //                 console.log(typeof(response));
            //                 if (response > 0) 
            //                 {   
            //                     $('#uname').html('<span  class="error" style="color: red;">Username Already Exist</span>');
            //                 }
            //                 else 
            //                 {   
            //                     $('#uname').html('<span class="error" style="color:green;">Available</span>');
                                
            //                 }  
            //             }
            //          });
               
            //  }
             
             if(qualification.length < 1){
                 $('#qualification').after('<span class="error" style="color: red;">It is required field</span>');
                 return false ; 
             }

             if(gender === ""){
                 $('#gender').after('<span class="error" style="color: red;">It is required field</span>');
                 return false ; 
             }

             if(email.length<1){
					 $('#email').after('<span class="error" style="color: red;">It is required field required</span>');
					 return false ; 
				 }else {
					var regEx = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
					var validEmail = regEx.test(email);
					if (!validEmail) {
						$('#email').after('<span class="error" style="color: red;">Enter a valid email</span>');
						return false ; 
					}   
				}
            if (password.length < 1) {
				    $('#password').after('<span class="error" style="color: red;">Password must be at least min-8 and max-15 characters long</span>');
					return false ; 
					}else{
						var regEx = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[#$^+=!*()@%&]).{8,15}$/
						var validpassword = regEx.test(password);
						if(!validpassword){
							$('#password').after('<span class="error" style="color: red;">Must contain atleast letter number special-char min-8 to max-15 character</span>')
							return false ; 
						}
					}   
          
                $.ajax({
                 url: '<?php echo base_url();?>user/insert',
                 type: 'POST',
                 data : new FormData(this),
                 dataType: "json",  
                 processData: false,    
                 contentType: false,
                 cache:false,
                 async:false,
                 success: function(response){    
                    alert('successfully Add data !');
                    window.location.href = "<?php echo base_url();?>login_controller/login";
                     }
             });         
            
        });
    });

    $(document).ready(function(){
        $('#uname').blur(function(e){
            e.preventDefault();
            var uname = $('#uname').val();
            console.log(uname);
            $(".error").remove();
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
                                $('#uname').after('<span  class="error" style="color: red;">Username Already Exist</span>');
                                $('#button').prop('disabled',true);
                            }
                            else 
                            {   
                                $('#uname').after('<span class="error" style="color:green;">Available</span>');
                                $('#button').prop('disabled',false);
                            }  
                        }
            });
        });
    });

    $(document).ready(function(){
        $('#email').blur(function(e){
            e.preventDefault();
            var email = $('#email').val();
            console.log(email);
            $(".error").remove();
            $.ajax({
                        type:"post",
                        url: "<?php echo base_url(); ?>user/email_exist",
                        data:{email:email},
                        datatype:"json",
                        success:function(response)
                        
                        {
                            console.log(typeof(response));
                            if (response === "true") 
                            {   
                                $('#email').after('<span  class="error" style="color: red;">Email Already Exist</span>');
                                $('#button').prop('disabled',true);
                            }
                            else 
                            {   
                                $('#email').after('<span class="error" style="color:green;">Available</span>');
                                $('#button').prop('disabled',false);
                            }  
                        }
            });
        });
    });
    </script>   



    
    <!-- <script>
    $(document).ready(function(){
         
         $('#form').on('submit',function(e){
             e.preventDefault();
             // var formData = new FormData(this);
 
              $.ajax({
                 url: '<?php echo base_url();?>user/insert',
                 type: 'POST',
                 data : new FormData(this),
                 dataType: "json",  
                 processData: false,
                 contentType: false,
                 cache:false,
                 async:false,
                 success: function(response){    
                    //  console.log(response);
                     }
             });
         });
      });
     </script> -->
</body>
</html>