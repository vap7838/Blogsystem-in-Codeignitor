<?php 
if(!isset($_SESSION['uname'])){
    redirect('login_controller/login');
}
?>
<!DOCTYPE html>
<html lang="en">
<body>
    <div class="container">
    <form id="form"  style="margin: 50px 250px 0px 250px;">
    

        <div class="form-group">
        <label for="Name">Name</label>
        <select class="custom-select" id="name" name="user_id">
        <option selected value="">Name</option>
        <?php
        foreach( $data['name'] as $row)
        {
      
        ?>
        <option value="<?php echo $row['id'];?>"><?php echo $row['fname']." ".$row['lname'];?></option>
        
        <?php    }
        ?>
       
        </select>
        </div>


        <div class="form-group">
        <label for="Course">Course</label>
        <select class="custom-select" id="course" name="course[]" multiple="multiple">
        <option selected value="">Course</option>
        <?php
        foreach( $data['course'] as $row)
        {
        // print_r($row);
        ?>
        <option value="<?php echo $row['id'];?>"><?php echo $row['course_name'];?></option>
        
        <?php    }
        ?>
        </select>
        </div>

        

        <button  type="submit" value="submit" id="button" class="btn btn-primary btn-lg">Submit</button>

    </form>
    </div> 
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"  crossorigin="anonymous"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
    
    <!-- <script>
    $(function()
    {
    $(".custom-select").select2();
    });
    </script> -->

    <script>
        $(document).ready(function(){
        $('#form').submit(function(e){
            e.preventDefault();
            // var course= [];
            // var name = $('#name').val();
            // var course = $('#course').val();
            // console.log(name);
            // console.log(course);

            $.ajax({
                        type:"post",
                        url: "<?php echo base_url(); ?>course_controller/course_asign",
                        data:new FormData(this),
                        datatype:"json",
                        processData: false,    
                        contentType: false,
                        cache:false,
                        async:false,
                        success:function(response)
                        {   
                            console.log(response);
                           if(response){
                            alert('Course asign successfully !');
                            window.location.href = "<?php echo base_url();?>coursedisplay_controller/display";
                           }else{
                            alert('Course not asign successfully !');
                            window.location.href = "<?php echo base_url();?>course_controller/course";
                           }
                        }
            });
        });
    });

    </script>
    </body>
</html>