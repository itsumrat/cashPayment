<!--[if lt IE 9]>
<script src="{{$theme_assets}}/global/plugins/respond.min.js"></script>
<script src="{{$theme_assets}}/global/plugins/excanvas.min.js"></script>
<![endif]-->
<!-- BEGIN CORE PLUGINS -->
<script src="{{$theme_assets}}/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="{{$theme_assets}}/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="{{$theme_assets}}/global/plugins/js.cookie.min.js" type="text/javascript"></script>
<script src="{{$theme_assets}}/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="{{$theme_assets}}/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="{{$theme_assets}}/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="{{$theme_assets}}/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="{{$theme_assets}}/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<script src="{{$theme_assets}}/global/scripts/sweetalert.min.js"></script>
<!-- END CORE PLUGINS -->

<!-- BEGIN PAGE LEVEL PLUGINS -->
@yield('page_level_js_plugin')
<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="{{$theme_assets}}/global/scripts/app.min.js" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->

<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="{{$theme_assets}}/assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="{{$theme_assets}}/layouts/layout/scripts/layout.min.js" type="text/javascript"></script>
<script src="{{$theme_assets}}/layouts/layout/scripts/demo.min.js" type="text/javascript"></script>
<script src="{{$theme_assets}}/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
<!-- END THEME LAYOUT SCRIPTS -->
<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>

<!-- BEGIN PAGE LEVEL SCRIPTS -->
@yield('page_level_script')
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN JAVASCRIPTS -->
<script>
    jQuery(document).ready(function() {
        // initiate layout and plugins
        Metronic.init(); // init metronic core components
        Layout.init(); // init current layout
        QuickSidebar.init(); // init quick sidebar
        Demo.init(); // init demo features
    });
</script>
<!-- END JAVASCRIPTS -->

@stack('scripts')



