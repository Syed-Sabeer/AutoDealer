<!-- Core JS -->
<script data-cfasync="false" src="{{ asset('frontAssets/js/email-decode.min.js') }}"></script>
<script src="{{ asset('frontAssets/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('frontAssets/js/modernizr.min.js') }}"></script>
<script src="{{ asset('frontAssets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('frontAssets/js/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('frontAssets/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('frontAssets/js/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('frontAssets/js/jquery.appear.min.js') }}"></script>
<script src="{{ asset('frontAssets/js/jquery.easing.min.js') }}"></script>
<script src="{{ asset('frontAssets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('frontAssets/js/counter-up.js') }}"></script>
<script src="{{ asset('frontAssets/js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('frontAssets/js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('frontAssets/js/wow.min.js') }}"></script>
<script src="{{ asset('frontAssets/js/flex-slider.js') }}"></script>
<script src="{{ asset('frontAssets/js/main.js') }}"></script>
<!-- jQuery (required for Toastr) -->
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
<!-- Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
@yield('script')

<script>
    $(document).ready(function() {
        $(document).on('click', '.copy-icon', function() {
            var textToCopy = $(this).prev().text().trim(); // Get text from previous element

            // Create a temporary input element
            var tempInput = $('<input>');
            $('body').append(tempInput);
            tempInput.val(textToCopy).select();
            document.execCommand('copy');
            tempInput.remove();

            var $this = $(this);
            var tooltipInstance = bootstrap.Tooltip.getInstance(this); // Get existing tooltip instance

            if (tooltipInstance) {
                tooltipInstance.dispose(); // Destroy tooltip to update title
            }

            $this.attr('title', '{{__("Copied")}}'); // Update title
            $this.tooltip({
                trigger: 'manual'
            }).tooltip('show'); // Show updated tooltip

            // Reset tooltip after 1.5 seconds
            setTimeout(() => {
                $this.tooltip('hide').attr('title', '{{__("Copy")}}').tooltip();
            }, 1500);
        });
    });
</script>
<script>
    toastr.options = {
        "closeButton": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "timeOut": "2000"
    };
    @if(session('success'))
        toastr.success("{{ session('success') }}");
    @endif

    @if(session('error'))
        toastr.error("{{ session('error') }}");
    @endif

    @if(session('message'))
        toastr.info("{{ session('message') }}");
    @endif

    @if ($errors->any())
        toastr.error("{{ $errors->first() }}");
    @endif
</script>
