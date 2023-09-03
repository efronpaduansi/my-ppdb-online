 <!-- CORE PLUGINS-->
 <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
 <script src="{{ asset('backend/js/app.min.js') }}"></script>
 <script src="{{ asset('backend/vendors/jquery/dist/jquery.min.js') }}" type="text/javascript"></script>
 <script src="{{ asset('backend/vendors/popper.js/dist/umd/popper.min.js') }}" type="text/javascript"></script>
 <script src="{{ asset('backend/vendors/bootstrap/dist/js/bootstrap.min.js') }}" type="text/javascript"></script>
 <script src="{{ asset('backend/vendors/metisMenu/dist/metisMenu.min.js') }}" type="text/javascript"></script>
 <script src="{{ asset('backend/vendors/jquery-slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
 <!-- PAGE LEVEL PLUGINS-->
 <script src="{{ asset('backend/vendors/jquery-validation/dist/jquery.validate.min.js') }}" type="text/javascript"></script>
 <!-- CORE SCRIPTS-->
 <script src="{{ asset('backend/js/app.min.js') }}" type="text/javascript"></script>
 <!-- PAGE LEVEL PLUGINS-->
 <script src="{{ asset('backend/vendors/DataTables/datatables.min.js') }}" type="text/javascript"></script>
 <script src="{{ asset('backend/vendors/summernote/dist/summernote.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('backend/vendors/bootstrap-markdown/js/bootstrap-markdown.js') }}" type="text/javascript"></script>
    <!-- CORE SCRIPTS-->
    <script src="{{ asset('backend/js/app.min.js') }}" type="text/javascript"></script>
    <!-- PAGE LEVEL SCRIPTS-->
    <script type="text/javascript">
        $(function() {
            $('#summernote').summernote();
            $('#summernote_air').summernote({
                airMode: true
            });
        });
    </script>
 <script type="text/javascript">
    $(function() {
        $('#example-table').DataTable({
            pageLength: 10,
            //"ajax": './assets/demo/data/table_data.json',
            /*"columns": [
                { "data": "name" },
                { "data": "office" },
                { "data": "extn" },
                { "data": "start_date" },
                { "data": "salary" }
            ]*/
        });
    })
</script>