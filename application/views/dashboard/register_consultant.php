<script src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
<style>
    #form label{float:left; width:140px;}
    #error_msg{color:red; font-weight:bold;}
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
<script>
    $(document).ready(function () {
        var $submitBtn = $("#form input[type='submit']");
        var $passwordBox = $("#password");
        var $confirmBox = $("#confirm_password");
        var $errorMsg = $('<span id="error_msg">Passwords do not match.</span>');
        // This is incase the user hits refresh - some browsers will maintain the disabled state of the button.
        $submitBtn.removeAttr("disabled");
        function checkMatchingPasswords() {
            if ($confirmBox.val() !== "" && $passwordBox.val !== "") {
                if ($confirmBox.val() !== $passwordBox.val()) {
                    $submitBtn.attr("disabled", "disabled");
                    $errorMsg.insertAfter($confirmBox);
                }
            }
        }
        function resetPasswordError() {
            $submitBtn.removeAttr("disabled");
            var $errorCont = $("#error_msg");
            if ($errorCont.length > 0) {
                $errorCont.remove();
            }
        }
        $("#confirm_password, #password")
                .on("keydown", function (e) {
                    /* only check when the tab or enter keys are pressed
                     * to prevent the method from being called needlessly  */
                    if (e.keyCode === 13 || e.keyCode === 9) {
                        checkMatchingPasswords();
                    }
                })
                .on("blur", function () {
                    // also check when the element looses focus (clicks somewhere else)
                    checkMatchingPasswords();
                })
                .on("focus", function () {
                    // reset the error message when they go to make a change
                    resetPasswordError();
                });
    });</script>
<?php if ($this->session->flashdata('flash_Success')): ?>
    <h4 style="text-align: center; color: green"><?php echo $this->session->flashdata('flash_Success') ?></h4>
<?php endif ?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Consultant</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-user-plus fa-fw"></i> Add Consultant Form
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-10">
                            <form role="form" action="<?php echo site_url() ?>/add_consultant_" enctype="multipart/form-data"  method="post">
                                <div class="form-group">
                                    <label>First Name:</label>
                                    <input value="<?php if (isset($_POST['FirstName'])) echo $_POST['FirstName']; ?>" type="text" class="form-control" placeholder="first name" name="FirstName" required>
                                </div>
                                <div class="form-group">
                                    <label>Last Name:</label>
                                    <input value="<?php if (isset($_POST['Lastname'])) echo $_POST['Lastname']; ?>" type="text" class="form-control" placeholder="last name" name="Lastname" required>
                                </div>
                                <div class="form-group">
                                    <label>Contact Number:</label>
                                    <input value="<?php if (isset($_POST['ContactNo'])) echo $_POST['ContactNo']; ?>" type="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" value="" class="form-control" placeholder="xxx-xxx-xxxx" name="ContactNo" required>
                                    <span class="validity"></span>
                                </div>
                                <div class="form-group">
                                    <label>Location:</label>
                                    <select  value="<?php if (isset($_POST['location'])) echo $_POST['location']; ?>" required class="form-control" name="location" required>
                                        <option value="">--Select Location--</option>
                                        <?php foreach ($info2->result() as $value) { ?>
                                                    <option value="<?php echo $value->OfficeID ?>"><?php echo $value->City ?></option>
                                                <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Email:</label>
                                    <input value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" type="email" class="form-control" placeholder="email" name="email" required>
                                    <?php echo form_error('email'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Password:</label>
                                    <input value="<?php if (isset($_POST['password'])) echo $_POST['password']; ?>" id="password"  name="password" type="password" class="form-control" placeholder="password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" onkeyup='check();'>
                                </div>
                                <div class="form-group">
                                    <label>Confirm Password:</label>
                                    <input value="<?php if (isset($_POST['confirm_password'])) echo $_POST['confirm_password']; ?>" id="confirm_password" name="confirm_password" type="password" class="form-control" placeholder="confirm password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" onkeyup='check();'>
                                </div>
                                <div class="form-group input-group">
                                    <input name="upload" id="submit_btn" type="submit" class="form-control" value="Save"/>
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


























































































































