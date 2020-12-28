<footer class="main-footer">
        <strong>Copyright &copy; <?php echo date('Y'); ?> <a href="">MD Sadique</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.0.5
        </div>
    </footer>
</div>

<div class="loader" id="loader" style="display:none"></div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ url('/') }}/adminlte3/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ url('/') }}/adminlte3/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ url('/') }}/adminlte3/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- InputMask -->
<script src="{{ url('/') }}/adminlte3/plugins/moment/moment.min.js"></script>
<script src="{{ url('/') }}/adminlte3/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<!-- ChartJS -->
<script src="{{ url('/') }}/adminlte3/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="{{ url('/') }}/adminlte3/plugins/sparklines/sparkline.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{ url('/') }}/adminlte3/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="{{ url('/') }}/adminlte3/plugins/moment/moment.min.js"></script>
<script src="{{ url('/') }}/adminlte3/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ url('/') }}/adminlte3/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="{{ url('/') }}/adminlte3/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{ url('/') }}/adminlte3/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ url('/') }}/adminlte3/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ url('/') }}/adminlte3/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ url('/') }}/adminlte3/dist/js/demo.js"></script>
<!-- Select2 -->
<script src="{{ url('/') }}/adminlte3/plugins/select2/js/select2.full.min.js"></script>
<!-- bs-custom-file-input -->
<script src="{{ url('/') }}/adminlte3/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- DataTables -->
<script src="{{ url('/') }}/adminlte3/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ url('/') }}/adminlte3/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ url('/') }}/adminlte3/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ url('/') }}/adminlte3/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{ url('/') }}/js/offer.js"></script>


<script>
  $(function () {
    $('[data-mask]').inputmask();
    
    $('.select2').select2();

    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $(".example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  })
  $(document).ready(function () {
  bsCustomFileInput.init();
});
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('.imgtag').attr('src', e.target.result);
            console.log(e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$(document).on('change',".customFile",function() {
    readURL(this);
});


</script>
