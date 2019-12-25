  <!-- /.content-wrapper -->
  <footer class="main-footer">
      <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
          <b>Version</b> 3.0.1
      </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <script>
      $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url('assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
  <!-- ChartJS -->
  <script src="<?= base_url('assets/admin/plugins/chart.js/Chart.min.js')?>"></script>
  <!-- Sparkline -->
  <script src="<?= base_url('assets/admin/plugins/sparklines/sparkline.js')?>"></script>
  <!-- JQVMap -->
  <script src="<?= base_url('assets/admin/plugins/jqvmap/jquery.vmap.min.js')?>"></script>
  <script src="<?= base_url('assets/admin/plugins/jqvmap/maps/jquery.vmap.usa.js')?>"></script>
  <!-- jQuery Knob Chart -->
  <script src="<?= base_url('assets/admin/plugins/jquery-knob/jquery.knob.min.js')?>"></script>
  <!-- daterangepicker -->
  <script src="<?= base_url('assets/admin/plugins/moment/moment.min.js')?>"></script>
  <script src="<?= base_url('assets/admin/plugins/daterangepicker/daterangepicker.js')?>"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="<?= base_url('assets/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')?>"></script>
  <!-- Summernote -->
  <script src="<?= base_url('assets/admin/plugins/summernote/summernote-bs4.min.js')?>"></script>
  <!-- overlayScrollbars -->
  <script src="<?= base_url('assets/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')?>"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url('assets/admin/dist/js/adminlte.js')?>"></script>
  <!-- Datatables -->
  <script src="<?= base_url('assets/admin/plugins/datatables/jquery.dataTables.js')?>"></script>
  <script src="<?= base_url('assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.js')?>"></script>


  <!-- fullCalendar 2.2.5 -->
  <script src="<?= base_url('assets/admin/plugins/moment/moment.min.js')?>"></script>
  <script src="<?= base_url('assets/admin/plugins/fullcalendar/main.min.js')?>"></script>
  <script src="<?= base_url('assets/admin/plugins/fullcalendar-daygrid/main.min.js')?>"></script>
  <script src="<?= base_url('assets/admin/plugins/fullcalendar-timegrid/main.min.js')?>"></script>
  <script src="<?= base_url('assets/admin/plugins/fullcalendar-interaction/main.min.js')?>"></script>
  <script src="<?= base_url('assets/admin/plugins/fullcalendar-bootstrap/main.min.js')?>"></script>

  <script type="text/javascript">
    $(document).ready(function(){
      $('#sale_list').DataTable();
    });
  </script>

  <script type="text/javascript">
    $(document).ready(function(){
      $('.viewbtn').on('click',function(e){
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: '<?=base_url('admin/check_invoice/')?>',
            data: {
                    orderid  :$(this).data('id'),
                    penjualid:$(this).data('penjualid'),
                    pembeliid:$(this).data('pembeliid')
                  },
            success: function(response) {
              console.log(response);
              $('#viewInvoiceContent').html(response);
          },
            error: function(response) {         
              console.log(response);          
            }        
        });
      });
    });
  </script>


  <script type="text/javascript">
    $(document).ready(function(){
      $('.deletebtn').on('click',function(e){
        deleteinvoice(e);  
      });
    });
    
    function deleteinvoice(e){
      Swal.fire({
        title: 'Hapus Invoice',
        text: "Apakah Anda yakin untuk Menghapus Invoice?",
        icon: 'warning',
        showCancelButton: true,
         confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus',
            cancelButtonText: 'Tidak'
      }).then((result) => {
            if (result.value) {
               e = e || window.event;
              e.preventDefault();
                $.ajax({
                    type  :   'post',
                    url   :   $('.deletebtn').data('url'),
                    success: function(response) {

                      Swal.fire({
                        title: 'Dihapus',
                      text : 'Invoice Telah Dihapus!',
                      icon : 'success'
                      }).then((result)=>{
                        location.reload(true);            
                      });
              },
                    error: function(response) {         
                        Swal.fire(
                      'Something Error',
                      'Ada error yang terjadi, error : '+response,
                      'error'
                  )         
                    }        
                });
            }
        });
    }
  </script>

</body>

</html>