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
                             <i class="fa fa-user-plus fa-fw"></i> Dependent Form
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-10">
                                    <form action="<?php echo site_url() ?>/register_client_dependent" enctype="multipart/form-data"  method="post" role="form">
                                       
                                        <div class="form-group">
                                            <input hidden  type="text" value="<?php echo $meg1; ?>" name="PolicyNumber">
                                        </div>
                                        <div class="form-group">
                                            <input hidden  type="text" value="<?php echo $meg2; ?>" name="ContactNo">
                                        </div>
                                        <div class="form-group">
                                            <label>First Name:</label>
                                            <input type="text" class="form-control" placeholder="first name" name="FirstName" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Last Name:</label>
                                            <input type="text" class="form-control" placeholder="last name" name="LastName" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Date of Birth:</label>
                                            <input type="date" class="form-control" name="DOB" placeholder="date of birth" max="<?php $date = date('Y-m-d');echo $date ?>"  required>
                                        </div>
                                        <div class="form-group">
                                            <label>Gender:</label>
                                            <select required class="form-control" name="Gender">
                                                <option value="">--Select gender--</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Member Type:</label>
                                            <select class="form-control" required name="MembershipID">
                                                <option value="">--Select member type--</option>
                                                <?php foreach ($mType->result() as $value) { ?>
                                                    <option value="<?php echo $value->MembershipID ?>" title="<?php echo $value->Description ?>"><?php echo $value->TypeName ?></option>
                                                <?php } ?>
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




































































































































