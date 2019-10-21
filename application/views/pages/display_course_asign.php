<?php 
if(!isset($_SESSION['uname'])){
    redirect('login_controller/login');
}
?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script -->
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <title>Document</title>
        <style>
        @media (min-width: 992px){
            .col-md-12 {
                width: 100%;
            }
        }
        </style>
    </head>
    <body>
    <div class="container">
    <div class="row col-md-12 ">
    <table class="table table-striped custab">
    <thead>
        <!-- <td class="text-center"><a class="btn btn-info btn-xs" href="<?php echo base_url(); ?>signup_controller/signup" <span class="glyphicon glyphicon-edit"></span>Add Data</a></td> -->
        <tr>
            <th>ID</th>
            <th>Name</th>
            <!-- <th>Lastname</th> -->
            <th>Course</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
       <?php
       foreach($course_teacher as $row)
       {     
       ?>
             
          <tr>
                <td><?php echo $row['user_id'];?></td>
                <td><?php echo $row['name'];?></td>
                <td>
                <?php 
                foreach($row['course'] as $key => $value) 
                {
                    ?>
                   <?php echo $value."," ;?>
               <?php     
                }

                ?>
                </td>
                <td class="text-center"><a class="btn btn-info btn-xs" href="<?php echo base_url();?>courseedit_controller/course_edit?user_id=<?php echo $row['user_id']?>"<span class="glyphicon glyphicon-edit"></span> Edit</a> <a href="<?php echo base_url();?>deletecourse_controller/delete?user_id=<?php echo $row['user_id']?>" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> Del</a></td>
            </tr>
    <?php }?>
       
    </table>    
    </div>
</div> 
    </body>
    </html>