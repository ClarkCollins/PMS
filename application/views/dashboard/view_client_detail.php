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
            <?php if ($meg7 == "1"): ?>
                <h1 class="page-header">Client</h1>
            <?php else: ?>
                <h1 class="page-header">Dependent</h1>
            <?php endif ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php if ($meg7 == "1"): ?>
                        <i class="fa fa-user fa-fw"></i> Client Details
                    <?php else: ?>
                        <i class="fa fa-user fa-fw"></i> Dependent Details
                    <?php endif ?>

                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-10">
                            <form action="<?php echo site_url() ?>/update" enctype="multipart/form-data"  method="post" role="form">
                                <?php if ($meg6 == "no_profile.jpeg"): ?>
                                    <img src="<?php echo base_url(); ?>files/no_profile.jpeg" alt="user photo" style="display:block; margin-left: auto; margin-right: auto;width:150px;height:150px;outline: #4CAF50 solid 2px;outline-style:dotted;">
                                <?php else: ?>
                                    <img src="<?php echo base_url(); ?>files/client_photo/<?php echo $meg6 ?>" alt="user photo" style="display:block; margin-left: auto; margin-right: auto;width:150px;height:150px;outline: #4CAF50 solid 2px;outline-style:dotted;">
                                <?php endif ?>
                                <div class="form-group">
                                    <label>First Name:</label>
                                    <input readonly type="text" class="form-control" value="<?php echo $meg1 ?>" placeholder="first name" name="FirstName" required>
                                </div>
                                <div class="form-group">
                                    <label>Last Name:</label>
                                    <input readonly type="text" class="form-control" value="<?php echo $meg2 ?>" placeholder="last name" name="LastName" required>
                                </div>
                                <?php if ($meg7 == "1"): ?>

                                    <div class="form-group">
                                        <label>Contact Number:</label>
                                        <input readonly type="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" value="<?php echo $meg3 ?>" class="form-control" placeholder="xxx-xxx-xxxx" name="ContactNo" required>
                                        <span class="validity"></span>
                                    </div>
                                <?php else: ?>
                                <?php endif ?>
                                <div class="form-group">
                                    <label>Age:</label>
                                    <input readonly type="text" class="form-control" value="<?php
                                    $d1 = new DateTime($meg4);
                                    $d2 = new DateTime();
                                    $diff = date_diff($d1, $d2);
                                    echo $diff->y . " " . "Years";
                                    ?>">
                                </div>
                                <div class="form-group">
                                    <label>Gender:</label>
                                    <input readonly type="text"value="<?php echo ucfirst($meg5) ?>" class="form-control">

                                </div>
                                    
                                    <?php foreach ($mType->result() as $value) { ?>
                                        <?php if ($meg7 != "1" && $meg7 == $value->MembershipID): ?>
                                            <div class="form-group">
                                                <label>Member Type:</label>
                                                <input readonly type="text"value="<?php echo ucfirst($value->TypeName) ?>" class="form-control">
                                            </div>
                                        <?php else: ?>
                                        <?php endif ?>
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
































































































































































































