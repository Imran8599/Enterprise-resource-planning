
  </div>
</div>
<!--   Core JS Files   -->

<script src="{{asset('public/assets/js/core/popper.min.js')}}"></script>
<script src="{{asset('public/assets/js/core/bootstrap-material-design.min.js')}}"></script>
<script src="{{asset('public/assets/js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
<script src="{{asset('public/js/custom.js')}}"></script>

<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{asset('public/assets/js/material-dashboard.js?v=2.1.1')}}" type="text/javascript"></script>

<!-- Data Table script -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
<script>

  $(document).ready( function (){
    $('.data_table').DataTable();
  });
</script>

</body>

</html>
