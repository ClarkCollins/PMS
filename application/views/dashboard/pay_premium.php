<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Payment</h1>
        </div>
    </div>
    <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             <i class="fa fa-money fa-fw"></i> Payment Of Premium
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-10">
                                    <form action="<?php echo site_url() ?>/make_payment" enctype="multipart/form-data"  method="post" role="form">

                                        <div class="form-group">
                                            <input hidden  type="text" value="<?php echo urldecode($meg1); ?>" name="ClientID">
                                        </div>
                                        <div class="form-group">
                                            <label>Policy Number:</label>
                                            <input readonly  type="text" value="<?php echo urldecode($meg2) ; ?>" class="form-control" name="PolicyNumber">
                                        </div>
                                        <div class="form-group">
                                            <label>Monthly premium:</label>
                                            <input type="text" readonly min="50" step=".001" value="<?php echo urldecode("R ".$meg5); ?>" class="form-control" placeholder="Primium amount" name="premium_amt">
                                        </div>
                                        <div class="form-group">
                                            <label>First Name:</label>
                                            <input readonly type="text" value="<?php echo urldecode($meg3); ?>" class="form-control" placeholder="first name" name="FirstName" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Last Name:</label>
                                            <input readonly type="text" value="<?php echo urldecode($meg4); ?>" class="form-control" placeholder="last name" name="LastName" required>
                                        </div>
                                            <?php foreach ($total_pay->result() as $value) { ?>
                                            <?php if ($meg1 == $value->ClientID && $meg6 > $value->total): ?>
                                                <div class="form-group">
                                                    <label>Amount Due:</label>
                                                    <input readonly  type="text" value="<?php urldecode($cal=$meg6 - $value->total + $meg5);  echo "R ".$cal.".00"; ?>" class="form-control" name="amount_due">
                                                </div>
                                        <?php else: ?>
                                        <div class="form-group">
                                                    <label>Amount Due:</label>
                                                    <input readonly  type="text" value="<?php echo urldecode("R ".$meg5); ?>" class="form-control" name="amount_due">
                                                </div>
                                            <?php endif ?>
                                        <?php } ?>
                                        <div class="form-group">
                                            <label>Amount:</label>
                                            <input type="number" min="50" class="form-control" placeholder="Payment amount" name="Amount" required>
                                        </div>
                                        <div class="form-group input-group">
                                            <input name="upload" id="submit_btn" type="submit" class="form-control" value="Pay Now" colour="#59b300">
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
