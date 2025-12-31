  <!--start overlay-->
     <div class="overlay btn-toggle"></div>
  <!--end overlay-->
  <!--start footer-->
   <footer class="page-footer">
    <p class="mb-0">Copyright © 2025. All right reserved.</p>
  </footer>
  <!--end footer-->
  
  <!-- Bootstrap JS -->
  <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
  
  <!-- Plugins -->
  <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
  <script src="{{ asset('assets/plugins/metismenu/metisMenu.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/peity/jquery.peity.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script src="{{ asset('assets/plugins/select2/js/select2-custom.js') }}"></script>
  <script src="{{ asset('assets/plugins/form-repeater/repeater.js') }}"></script>
	<script>
        /* Create Repeater */
        $("#repeater").createRepeater({
            showFirstItemToDefault: true,
        });
    </script>
  <!-- Main JS -->
  <script src="{{ asset('assets/js/main.js') }}"></script>
  <script>
    $(document).ready(function() {
			$('#example2').DataTable();
		  } );
	</script>
  
  
</body>

</html>