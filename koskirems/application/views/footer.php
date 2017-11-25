  <!-- jQuery -->
    <script src="<?php echo base_url('res/bower_components/jquery/dist/jquery.min.js');?>"></script>
        
<!--Datatables -->
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.10/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.10/js/jquery.dataTables.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url('res/bower_components/bootstrap/dist/js/bootstrap.min.js');?>"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url('res/bower_components/metisMenu/dist/metisMenu.min.js');?>"></script>

    <!-- Morris Charts JavaScript -->
    <script src="<?php echo base_url('res/bower_components/raphael/raphael-min.js');?>"></script>



    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url('res/dist/js/sb-admin-2.js');?>"></script>
<script type="text/javascript">
  $(document).ready( function () {
    $('#datatable').DataTable();
    $('#datatable').css('background-color','#EB77A6');
     $('table.display tr.even').hover(function(){
       $(this).css('background-color','#000'); 
    });
} );
</script>
</body>

</html>
