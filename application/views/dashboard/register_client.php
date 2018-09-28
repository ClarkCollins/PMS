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
                             <i class="fa fa-user-plus fa-fw"></i> New Client Form
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-10">
                                    <form role="form">
                                        <div class="form-group">
                                            <label>First Name:</label>
                                            <input type="text" class="form-control" placeholder="first name" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Last Name:</label>
                                            <input type="text" class="form-control" placeholder="last name" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Contact Number:</label>
                                            <input type="number" class="form-control" placeholder="contact number" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Member Type:</label>
                                            <select class="form-control" required>
                                                <option selected>--Select member type--</option>
                                                <?php foreach ($mType->result() as $value) { ?>
                                                    <option value="<?php echo $value->MembershipType ?>" title="<?php echo $value->Description ?>"><?php echo $value->TypeName ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Client Photo:</label>
                                            <input class="form-control" type="file" accept=".jpeg, .jpg, .jpe, .jfif, .jif,.png,image/*"id="photo" name="photo" required>
                                        </div>
                                        <div class="form-group input-group">
                                            <input id="submit_btn" type="submit" class="form-control" value="Save">
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

























































































