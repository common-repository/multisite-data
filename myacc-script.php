<?php wp_enqueue_script ( 'custom-script', plugin_dir_url( __FILE__ ) . '/js/jquery.dataTables.min.js' ); ?>
<?php wp_enqueue_script ( 'custom-script', plugin_dir_url( __FILE__ ) . '/js/dataTables.buttons.min.js' ); ?>
<?php wp_enqueue_script ( 'custom-script', plugin_dir_url( __FILE__ ) . '/js/jszip.min.js' ); ?>
<?php wp_enqueue_script ( 'custom-script', plugin_dir_url( __FILE__ ) . '/js/pdfmake.min.js' ); ?>
<?php wp_enqueue_script ( 'custom-script', plugin_dir_url( __FILE__ ) . '/js/vfs_fonts.js' ); ?>
<?php wp_enqueue_script ( 'custom-script', plugin_dir_url( __FILE__ ) . '/js/buttons.html5.min.js' ); ?>
<?php wp_enqueue_script ( 'custom-script', plugin_dir_url( __FILE__ ) . '/js/buttons.print.min.js' ); ?>
<?php wp_enqueue_style( 'custom-css', plugin_dir_url( __FILE__ ) . '/css/jquery.dataTables.min.css',false,'','all'); ?> 
<?php wp_enqueue_style( 'custom-css', plugin_dir_url( __FILE__ ) . '/css/buttons.dataTables.min.css',false,'','all'); ?>

 <script>$(document).ready(function() { 
    $('#dataTable').DataTable( {        dom: 'Bfrtip',        buttons: [            'print'        ]    } );} );   
 </script>

 <style>table.dataTable tfoot th, table.dataTable tfoot td {       border-top: 1px solid #f6f7f7;} th {    font-weight: normal  !important;     border-bottom: 1px solid #ccc !important;}    </style>