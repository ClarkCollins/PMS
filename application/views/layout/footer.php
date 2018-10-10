<style>
#footer {
    background: #343A40 !important;
    padding-top: 10px
}

</style>
<footer  id="footer">
    <section>
        <div class="container">

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white">
                    <p style="color: white">&copy <?php echo date("Y"); ?> All Rights Reserved.  <a href="#" target="_blank">Payment Management System</a></p>
                </div>
            </div>	
        </div>
    </section>
</footer>

<!-- jQuery -->
<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<!--<script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-confirmation.js"></script>-->

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo base_url(); ?>assets/js/metisMenu.min.js"></script>

<!-- Morris Charts JavaScript -->
<script src="<?php echo base_url(); ?>assets/js/raphael.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/morris.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/morris-data.js"></script>

<!-- Custom Theme JavaScript -->
<script src="<?php echo base_url(); ?>assets/js/sb-admin-2.js"></script>
 <!-- DataTables JavaScript -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/dataTables.responsive.js"></script>
    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>
</body>

</html>
