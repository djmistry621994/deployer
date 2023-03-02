<script>
    var site_url = '{!! url('/') !!}/';
    var admin_url = site_url + 'admin/';
    var ajax_url = site_url + "ajax/";
    var admin_ajax_url = admin_url + 'ajax/';
    var view_page = false;
    var words = {!! json_encode(__('words')) !!};
    var messages = {!! json_encode(__('messages')) !!};
</script>

@if(isset($show) && $show == 1)
    <script>
        view_page = true;
    </script>
@endif
