<div class="col-12 col-md-7">
    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                showGoledsMessage('success', '{{ session('success') }}');
            });
        </script>
    @endif
    @if (session('error'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                showGoledsMessage('error', '{{ session('error') }}');
            });
        </script>
    @endif
    @if (session('alert'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                showGoledsMessage('warning', '{{ session('alert') }}');
            });
        </script>
    @endif
</div>

<!--begin::Alert-->
@if (session('error_toastr'))
    <script>
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": true,
            "progressBar": false,
            "positionClass": "toastr-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };

        toastr.error('{{ session('error_toastr') }}', "Error");
    </script>
@endif
<!--end::Alert-->
