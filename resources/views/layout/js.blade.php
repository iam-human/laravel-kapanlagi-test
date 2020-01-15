
  <!-- Core -->
  <script src="{{url('/argon/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{url('/argon/assets/vendor/js-cookie/js.cookie.js')}}"></script>
  <script src="{{url('/argon/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js')}}"></script>
  <script src="{{url('/argon/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js')}}"></script>
  <!-- Optional JS -->
  <script src="{{url('/argon/assets/vendor/chart.js/dist/Chart.min.js')}}"></script>
  <script src="{{url('/argon/assets/vendor/chart.js/dist/Chart.extension.js')}}"></script>
  <!-- optional date JS -->
  <script src="{{url('/argon/assets/vendor/select2/dist/js/select2.min.js')}}"></script>
  <script src="{{url('/argon/assets/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
  <script src="{{url('/argon/assets/vendor/nouislider/distribute/nouislider.min.js')}}"></script>
  <script src="{{url('/argon/assets/vendor/quill/dist/quill.min.js')}}"></script>
  <script src="{{url('/argon/assets/vendor/dropzone/dist/min/dropzone.min.js')}}"></script>
  <script src="{{url('/argon/assets/vendor/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')}}"></script>
  <!-- Optional JS -->
  <script src="{{url('/argon/assets/vendor/datatables.net/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{url('/argon/assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{url('/argon/assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
  <script src="{{url('/argon/assets/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
  <script src="{{url('/argon/assets/vendor/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
  <script src="{{url('/argon/assets/vendor/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
  <script src="{{url('/argon/assets/vendor/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
  <script src="{{url('/argon/assets/vendor/datatables.net-select/js/dataTables.select.min.js')}}"></script>
  <script src="{{url('/argon/assets/vendor/jvectormap-next/jquery-jvectormap.min.js')}}"></script>
  <script src="{{url('/argon/assets/js/vendor/jvectormap/jquery-jvectormap-world-mill.js')}}"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <!-- Argon JS -->
  <script src="{{url('/argon/assets/js/argon.min9f1e.js')}}?v=1.1.0"></script>
  <!-- Demo JS - remove this in your project -->
  <script src="{{url('/argon/assets/js/demo.min.js')}}"></script>
  {{-- <script src="{{url('/assets/js/app.js')}}"></script>  --}}
  
  <script type="text/javascript">    
    
    // $('body').on('click', '.modal-edit', function (event) {
    //     event.preventDefault();

    //     $tr = $(this).closest('tr');
    //     var data = $tr.children("td").map(function () {
    //         return $(this).text();
    //     }).get();

    //     $("input#nik").val(data[2]);
    //     $("input#password").val(data[3]);
    //     $("input#nama").val(data[4]);
    //     $("input#email").val(data[5]);
    //     $("input#pendidikan").val(data[6]);
    //     $("input#phone").val(data[7]);
    //     $("input#tempat_lahir").val(data[8]);
    //     $("input#tgl_lahir").val(data[9]);
    //     $("textarea#alamat").val(data[10]);
    //     a = $("option#cabang").text("Ini");

    //     $('#modalEdit').modal('show');   
    //     $('#modalEdit').on('hidden.bs.modal', function () {
    //     $('.selectbox').prop('checked', false);
    //     $('tr.selected').toggleClass('selected ');
    //     });    

    // });
   

    // Select2
    $('.select2-hidden-accessible:not(.normal)').each(function () {
        $(this).select2({
            dropdownParent: $(this).parent()
        });
    });
    //data tables
    $(document).ready( function () {
        $('#datatable-bassic').DataTable();
    } );
    //tooltip
    $(function () {
      $('[data-tooltip="tooltip"]').tooltip()
    });
  </script>
  
  <script>
    $(document).ready(function(){
        $("#reset").click(function(){
          $('#form').find("input[type=text], input[type=password], input[type=file],input[type=email],input[type=phone]").val("");
        });
    });
  </script>
  
  <!-- Mirrored from demos.creative-tim.com/argon-dashboard-pro/pages/dashboards/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 18 Sep 2019 10:54:35 GMT -->
