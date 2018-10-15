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
<?php if ($this->session->flashdata('flash_Success')): ?>
    <h4 style="text-align: center; color: green"><?php echo $this->session->flashdata('flash_Success') ?></h4>
<?php endif ?>
    <?php if ($this->session->flashdata('flash_error_large')): ?>
    <h4 style="text-align: center; color: green"><?php echo $this->session->flashdata('flash_error_large') ?></h4>
<?php endif ?>
    <?php if ($this->session->flashdata('flash_error')): ?>
    <h4 style="text-align: center; color: green"><?php echo $this->session->flashdata('flash_error') ?></h4>
<?php endif ?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Profile</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-user fa-fw"></i> User Profile
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-10">
                            <form action="<?php echo site_url() ?>/profile_update" enctype="multipart/form-data"  method="post" role="form">
                                <div class="form-group">

                                    <?php foreach ($info->result() as $value) { ?>
                                        <?php if ($value->PicturePath == "no_profile.jpeg"): ?>
                                            <img src="<?php echo base_url(); ?>files/no_profile.jpeg" alt="user photo" style="display:block; margin-left: auto; margin-right: auto;width:150px;height:150px;outline: #4CAF50 solid 2px;outline-style:dotted;">
                                        <?php else: ?>
                                            <img src="<?php echo base_url(); ?>files/client_photo/<?php echo $value->PicturePath ?>" alt="user photo" style="display:block; margin-left: auto; margin-right: auto;width:150px;height:150px;outline: #4CAF50 solid 2px;outline-style:dotted;">
                                        <?php endif ?>
                                    </div>
                                    <div class="form-group">
                                        <label>First Name:</label>
                                        <input name="FirstName" required value="<?php echo ucfirst($value->FirstName); ?>" type="text" class="form-control" placeholder="first name" >
                                    </div>
                                    <div class="form-group">
                                        <label>Last Name:</label>
                                        <input name="Lastname" required value="<?php echo ucfirst($value->Lastname); ?>" type="text" class="form-control" placeholder="last name" >
                                    </div>
                                    <div class="form-group">
                                        <label>Contact Number:</label>
                                        <input type="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" value="<?php echo $value->ContactNo; ?>" class="form-control" placeholder="xxx-xxx-xxxx" name="ContactNo" required>
                                        <span class="validity"></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Email:</label>
                                        <input name="email"  value="<?php echo ucfirst($value->Username); ?>" type="email" class="form-control" placeholder="email" >
                                        <?php echo form_error('email'); ?>
                                    </div>
                                <div class="form-group">
                                            <label>Date of Birth:</label>
                                            <input  value="<?php echo $value->DOB; ?>" type="date" class="form-control" name="DOB" placeholder="date of birth" max="<?php $date = date('Y-m-d');echo $date ?>"  required>
                                        </div>
                                        <div class="form-group">
                                            <label>Gender:</label>
                                            <select required class="form-control" name="Gender">
                                                <?php if ($value->Gender == "Nil"): ?>
                                                <option value="">--Select gender--</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                                <?php elseif($value->Gender == "male"):?>
                                                <option selected value="male">Male</option>
                                                <option value="female">Female</option>
                                                <?php else:?>
                                                <option value="male">Male</option>
                                                <option selected value="female">Female</option>
                                                <?php endif?>
                                            </select>
                                        </div>
                                    <div class="form-group">
                                        <label>Photo:</label>
                                        <input class="form-control" type="file" accept=".jpeg, .jpg, .jpe, .jfif, .jif,.png,image/*"id="userfile" name="userfile">

                                    </div>
                                    <input  type="text"name="photo2" hidden="" value="<?php echo $value->PicturePath; ?>">
                                    <div class="form-group input-group">
                                        <input name="upload" id="submit_btn" type="submit" class="form-control" value="Save">
                                    </div>
                                <?php } ?>
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






























































































































































