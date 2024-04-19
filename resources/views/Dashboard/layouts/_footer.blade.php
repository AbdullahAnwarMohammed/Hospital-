@include('notify::components.notify')

@notifyJs
<script src="{{asset('dashboard/assets')}}/js/jquery.min.js"></script>
<script src="{{asset('dashboard/assets')}}/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('dashboard/assets')}}/js/moment.js"></script>


<!-- *************
    ************ Vendor Js Files *************
************* -->
<!-- Slimscroll JS -->
<script src="{{asset('dashboard/assets')}}/vendor/slimscroll/slimscroll.min.js"></script>
<script src="{{asset('dashboard/assets')}}/vendor/slimscroll/custom-scrollbar.js"></script>

<!-- Daterange -->
<script src="{{asset('dashboard/assets')}}/vendor/daterange/daterange.js"></script>
<script src="{{asset('dashboard/assets')}}/vendor/daterange/custom-daterange.js"></script>


<!-- Main JS -->
<script src="{{asset('dashboard/assets')}}/js/main.js"></script>
@yield('js')

</body>
</html>