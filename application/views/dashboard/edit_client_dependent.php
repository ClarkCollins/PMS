<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Dependent</h1>
        </div>
    </div>
    <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             <i class="fa fa-pencil-square-o fa-fw"></i> Update Dependent Form
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-10">
                                    <form action="<?php echo site_url() ?>/update_" enctype="multipart/form-data"  method="post" role="form">
                                       <input type="text" hidden value="<?php echo $meg1?>" name="IDNo" required>
                                        <div class="form-group">
                                            <input hidden  type="text" value="<?php echo $meg4; ?>" name="ContactNo">
                                        </div>
                                        <div class="form-group">
                                            <label>First Name:</label>
                                            <input type="text" value="<?php echo $meg2 ?>" class="form-control" placeholder="first name" name="FirstName" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Last Name:</label>
                                            <input type="text" value="<?php echo $meg3 ?>" class="form-control" placeholder="last name" name="LastName" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Date of Birth:</label>
                                            <input type="date" value="<?php echo $meg5 ?>" class="form-control" name="DOB" placeholder="date of birth" max="<?php $date = date('Y-m-d');echo $date ?>"  required>
                                        </div>
                                        <div class="form-group">
                                            <label>Gender:</label>
                                            <select required class="form-control" name="Gender">
                                                <?php if ($meg6 == "male"): ?>
                                                    <option selected value="male">Male</option>
                                                    <option value="female">Female</option>
                                                <?php else: ?>
                                                    <option value="male">Male</option>
                                                    <option selected value="female">Female</option>
                                                <?php endif ?> 
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Member Type:</label>
                                            <select class="form-control" required name="MembershipID">
                                                <?php foreach ($mType->result() as $value) { ?>
                                                <?php if ($meg8 == $value->MembershipID): ?>
                                                <option selected value="<?php echo $value->MembershipID ?>" title="<?php echo $value->Description ?>"><?php echo $value->TypeName ?></option>
                                                    <?php else: ?>
                                                <option value="<?php echo $value->MembershipID ?>" title="<?php echo $value->Description ?>"><?php echo $value->TypeName ?></option>
                                                    <?php endif ?> 
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Client Photo:</label>
                                            <input class="form-control" type="file" name="userfile" accept=".jpeg, .jpg, .jpe, .jfif, .jif,.png,image/*"id="photo">
                                            <input type="text" value="<?php echo $meg7?>" name="db_photo" hidden>
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




















































































































































