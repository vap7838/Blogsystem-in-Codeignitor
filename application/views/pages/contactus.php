<!DOCTYPE html>
<html lang="en">
<body>
<div class="container">
    <form id="form" method="post" action ="<?php echo base_url();?>contactus_controller/sendmail" enctype="multipart/form-data" style="margin: 50px 250px 0px 250px;">
       
        <div class="form-group">
        <label for="Email">Email</label>
        <input type="email" class="form-control" id="email"  name="email" placeholder="Enter Email">
        </div>
        
        <div class="form-group">
        <label for="Subject">Subject</label>
        <input type="text" class="form-control" id="subject"  name="subject" placeholder="Enter Subject">
        </div>


        <div class="form-group">
        <label for="Massage">Massage</label>
        <textarea class="form-control" id="massage" name="massage" placeholder="Enter Massage" rows="5"></textarea>
        </div>

        <button  type="submit" value="Sendmail" class="btn btn-primary btn-lg">Send</button>

    </form>
</div>    
</body>
</html>