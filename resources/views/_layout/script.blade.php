<!-- Vendor Scripts Start -->
@yield('js_vendor')
<!-- Vendor Scripts End -->

<!-- Vendor Scripts Start -->
<script src="{{ asset('js/vendor/jquery-3.5.1.min.js') }}"></script>
<script src="{{ asset('js/vendor/bootstrap.bundle.min.js') }}"></script>
{{-- <script src="{{ asset('js/vendor/OverlayScrollbars.min.js') }}"></script> --}}
{{-- <script src="{{ asset('js/vendor/autoComplete.min.js') }}"></script> --}}
{{-- <script src="{{ asset('js/vendor/clamp.min.js') }}"></script> --}}

<script src="{{ asset('icon/acorn-icons.js') }}"></script>
<script src="{{ asset('icon/acorn-icons-interface.js') }}"></script>

{{--<script src="{{ asset('js/vendor/Chart.bundle.min.js') }}"></script>--}}

{{--<script src="{{ asset('js/vendor/chartjs-plugin-datalabels.js') }}"></script>--}}

{{--<script src="{{ asset('js/vendor/chartjs-plugin-rounded-bar.min.js') }}"></script>--}}

{{--<script src="{{ asset('js/vendor/glide.min.js') }}"></script>--}}

{{--<script src="{{ asset('js/vendor/intro.min.js') }}"></script>--}}

<script src="{{ asset('js/vendor/select2.full.min.js') }}"></script>

{{--<script src="{{ asset('js/vendor/plyr.min.js') }}"></script>--}}

<script src="{{ asset('plugins/toastr.min.js') }}"></script>

<!-- Vendor Scripts End -->

<!-- Template Base Scripts Start -->
<script src="{{ asset('js/base/helpers.js') }}"></script>
<script src="{{ asset('js/base/globals.js') }}"></script>
<script src="{{ asset('js/base/nav.js') }}"></script>
<script src="{{ asset('js/base/search.js') }}"></script>
<script src="{{ asset('js/base/settings.js') }}"></script>
<!-- Template Base Scripts End -->
<!-- Page Specific Scripts Start -->

{{--<script src="{{ asset('js/cs/glide.custom.js') }}"></script>--}}

{{--<script src="{{ asset('js/cs/charts.extend.js') }}"></script>--}}

{{--<script src="{{ asset('js/pages/dashboard.default.js') }}"></script>--}}

{{--<script src="{{ asset('js/common.js') }}"></script>--}}
<script src="{{ asset('js/scripts.js') }}"></script>
<!-- Page Specific Scripts End -->

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Validación de campo numérico
        $(document).on('keydown', '.numerico', function (event) {
            // Evitar la entrada de caracteres si Shift está presionado
            if (event.shiftKey) {
                event.preventDefault();
                return;
            }

            // Permitir combinaciones de teclas Ctrl (Copiar, Pegar, Cortar)
            if (event.ctrlKey && (event.keyCode === 67 || // Ctrl + C (Copiar)
                event.keyCode === 86 || // Ctrl + V (Pegar)
                event.keyCode === 90 || // Ctrl + Z (Deshacer)
                event.keyCode === 88)) { // Ctrl + X (Cortar)
                return; // Permitir estas combinaciones de teclas
            }

            // Permitir teclas especiales (Suprimir, Retroceso, Tab, Flechas de dirección)
            if (event.keyCode === 46 || // Suprimir
                event.keyCode === 8 || // Retroceso
                event.keyCode === 9 || // Tab
                event.keyCode === 190 || // Punto decimal (si decides permitir puntos más tarde)
                event.keyCode === 110 || // Punto decimal en teclado numérico
                (event.keyCode >= 37 && event.keyCode <= 40) || // Flechas de dirección
                (event.keyCode >= 48 && event.keyCode <= 57) || // Números en la fila superior
                (event.keyCode >= 96 && event.keyCode <= 105) // Números en el teclado numérico
            ) {
                return;
            }

            // Prevenir la entrada de cualquier otro carácter
            event.preventDefault();
        });


        // Validación de campo numérico
        $(document).on('keydown', '.numerico-int', function (event) {
            // Evitar la entrada de caracteres si Shift está presionado
            if (event.shiftKey) {
                event.preventDefault();
                return;
            }

            // Permitir combinaciones de teclas Ctrl (Copiar, Pegar, Cortar)
            if (event.ctrlKey && (event.keyCode === 67 || // Ctrl + C (Copiar)
                event.keyCode === 86 || // Ctrl + V (Pegar)
                event.keyCode === 90 || // Ctrl + Z (Deshacer)
                event.keyCode === 88)) { // Ctrl + X (Cortar)
                return; // Permitir estas combinaciones de teclas
            }

            // Permitir teclas especiales como suprimir, retroceso y tab
            if (event.keyCode === 46 || // Delete
                event.keyCode === 8 || // Backspace
                event.keyCode === 9 || // Tab
                (event.keyCode >= 37 && event.keyCode <= 40) || // Flechas de dirección
                (event.keyCode >= 48 && event.keyCode <= 57) || // Números en la fila superior
                (event.keyCode >= 96 && event.keyCode <= 105) // Números en el teclado numérico
            ) {
                // Permitir la tecla presionada
                return;
            } else {
                // Prevenir la tecla presionada
                event.preventDefault();
            }
        });
    });
</script>

<script>
    document.addEventListener('livewire:init', () => {
        Livewire.on('showCustomMessage', (event) => {
            showCustomMessage(event.type, event.message);
        });

        Livewire.on('setSelectValue', (event) => {

            setTimeout(() => {
                const elementId = event.id ?? null;
                const value = event.value ?? null;

                if (!elementId) return;

                const $element = $('#' + elementId);

                if ($element.length === 0) {
                    console.warn(`Element with ID '${elementId}' not found.`);
                    return;
                }

                $element.val(value).trigger('change');
            }, 100);
        });
    });

    function showCustomMessage(type, message) {
        toastr.options = {
            "toastClass": 'toastr custom-toast',
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toastr-top-right custom-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000000",
            "timeOut": "5000",
            "extendedTimeOut": "1000000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };

        if (type === 'success') {
            toastr.success(message, "Éxito");
        } else if (type === 'error') {
            toastr.error(message, "Error");
        } else if (type === 'warning') {
            toastr.warning(message, "Alerta");
        } else if (type === 'info') {
            toastr.info(message, "Información");
        } else {
            toastr.info(message, "Información");
        }
    }
</script>

@stack('js_script')

@yield('js_page')
<!-- Page Specific Scripts End -->
