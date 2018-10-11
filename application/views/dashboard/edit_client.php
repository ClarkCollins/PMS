<style>
    input:invalid + span:after {
        content: '✖';
        color: #f00;
        padding-left: 5px;}
    input:valid + span:after {
        content: '✓';
        color: #26b72b;
        padding-left: 5px;
    }

</style>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Client</h1>
        </div>
    </div>
    <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             <i class="fa fa-user-plus fa-fw"></i> Update Client Form
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-10">
                                    <form action="<?php echo site_url() ?>/register_client" enctype="multipart/form-data"  method="post" role="form">
                                        
                                            <input type="text" hidden value="<?php echo $meg1?>" name="IDNo" required>
                                        <div class="form-group">
                                            <label>First Name:</label>
                                            <input type="text" class="form-control" value="<?php echo $meg2?>" placeholder="first name" name="FirstName" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Last Name:</label>
                                            <input type="text" class="form-control" value="<?php echo $meg3?>" placeholder="last name" name="LastName" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Contact Number:</label>
                                            <input type="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" value="<?php echo $meg4?>" class="form-control" placeholder="xxx-xxx-xxxx" name="ContactNo" required>
                                            <span class="validity"></span>
                                        </div>
                                        <div class="form-group">
                                            <label>Date of Birth:</label>
                                            <input type="date" class="form-control" value="<?php echo $meg5?>" name="DOB" placeholder="date of birth" max="<?php $date = date('Y-m-d');echo $date ?>"  required>
                                        </div>
                                        <div class="form-group">
                                            <label>Gender:</label>
                                            <select required class="form-control" name="Gender">
                                                <?php if ( $meg6 == "male"): ?>
                                                <option selected value="male">Male</option>
                                                <option value="female">Female</option>
                                                <?php else: ?>
                                                <option value="male">Male</option>
                                                <option selected value="female">Female</option>
                                                <?php endif ?> 
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Client Photo:</label>
                                            <input class="form-control" type="file" name="userfile" accept=".jpeg, .jpg, .jpe, .jfif, .jif,.png,image/*"id="photo" required>
                                        </div>
                                        <div class="form-group input-group">
                                            <input name="upload" id="submit_btn" type="submit" class="form-control" value="Save">
                                        </div>
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->














































































































































