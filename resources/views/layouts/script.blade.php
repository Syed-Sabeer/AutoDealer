<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->

{{-- <script src="{{ mix('resources/js/app.js') }}"></script> --}}
<script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
<script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/node-waves/node-waves.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/hammer/hammer.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/i18n/i18n.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/typeahead-js/typeahead.js') }}"></script>
<script src="{{ asset('assets/vendor/js/menu.js') }}"></script>

<!-- endbuild -->

<!-- Vendors JS -->
<script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/swiper/swiper.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/@form-validation/popular.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/@form-validation/bootstrap5.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/@form-validation/auto-focus.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/cleavejs/cleave.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/cleavejs/cleave-phone.js') }}"></script>

<!-- Main JS -->
<script src="{{ asset('assets/js/main.js') }}"></script>

<!-- Page JS -->
<script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>

<script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
<script src="{{ asset('assets/js/extended-ui-sweetalert2.js') }}"></script>
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
        $(function() {
            var dtTable = $('.custom-datatables'),
                dt;
            if (dtTable.length) {
                dt = dtTable.DataTable({
                    dom: '<"row"' +
                        '<"col-md-2"<l>>' +
                        '<"col-md-10"<"dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-end flex-md-row flex-column mb-6 mb-md-0"fB>>' +
                        '>t' +
                        '<"row"' +
                        '<"col-sm-12 col-md-6"i>' +
                        '<"col-sm-12 col-md-6"p>' +
                        '>',
                    language: {
                        sLengthMenu: 'Show _MENU_',
                        search: '',
                        searchPlaceholder: 'Search...',
                        paginate: {
                            next: '<i class="ti ti-chevron-right ti-sm"></i>',
                            previous: '<i class="ti ti-chevron-left ti-sm"></i>'
                        }
                    },
                    buttons: [{
                        extend: 'collection',
                        className: 'btn btn-label-secondary dropdown-toggle me-4 waves-effect waves-light border-left-0 border-right-0 rounded',
                        text: '<i class="ti ti-upload ti-xs me-sm-1 align-text-bottom"></i> <span class="d-none d-sm-inline-block">{{__("Export")}}</span>',
                        buttons: [{
                                extend: 'print',
                                text: '<i class="ti ti-printer me-1"></i>{{__("Print")}}',
                                className: 'dropdown-item',
                                exportOptions: {
                                    columns: ':not(:last-child)' // Exclude the last column (Actions)
                                }
                            },
                            {
                                extend: 'csv',
                                text: '<i class="ti ti-file-text me-1"></i>{{__("Csv")}}',
                                className: 'dropdown-item',
                                exportOptions: {
                                    columns: ':not(:last-child)' // Exclude the last column (Actions)
                                }
                            },
                            {
                                extend: 'excel',
                                text: '<i class="ti ti-file-spreadsheet me-1"></i>{{__("Excel")}}',
                                className: 'dropdown-item',
                                exportOptions: {
                                    columns: ':not(:last-child)' // Exclude the last column (Actions)
                                }
                            },
                            {
                                extend: 'pdf',
                                text: '<i class="ti ti-file-description me-1"></i>{{__("Pdf")}}',
                                className: 'dropdown-item',
                                exportOptions: {
                                    columns: ':not(:last-child)' // Exclude the last column (Actions)
                                }
                            },
                            {
                                extend: 'copy',
                                text: '<i class="ti ti-copy me-1"></i>{{__("Copy")}}',
                                className: 'dropdown-item',
                                exportOptions: {
                                    columns: ':not(:last-child)' // Exclude the last column (Actions)
                                }
                            }
                        ]
                    }],

                });
            }

            setTimeout(() => {
                $('.dataTables_filter .form-control').removeClass('form-control-sm');
                $('.dataTables_length .form-select').removeClass('form-select-sm');
            }, 300);
            $('.dataTables_filter').addClass('ms-n4 me-4 mt-0 mt-md-6');
        });
    });
</script>
<script>
    @if (Session::has('success'))
        Swal.fire({
            title: '{{__("Success!")}}',
            text: "{{ __(Session::get('success')) }}",
            icon: 'success',
            timer: 2000,
            showConfirmButton: false
        });
    @endif

    @if (Session::has('message'))
        Swal.fire({
            title: '{{__("Info!")}}',
            text: "{{ __(Session::get('message')) }}",
            icon: 'info',
            timer: 2000,
            showConfirmButton: false
        });
    @endif

    @if (Session::has('error'))
        Swal.fire({
            title: '{{__("Error!")}}',
            text: "{{ __(Session::get('error')) }}",
            icon: 'error',
            timer: 2000,
            showConfirmButton: false
        });
    @endif

    // Delete Confirmation
    $(document).on('click', '.delete_confirmation', function(event) {
        event.preventDefault();
        var form = $(this).closest("form");
        Swal.fire({
            title: '{{__("Are you sure?")}}',
            text: '{{__("You would not be able to revert this!")}}',
            icon: 'warning',
            showCancelButton: true,
            cancelButtonText: '{{__("Cancel")}}',
            confirmButtonText: '{{__("Yes, delete it!")}}',
            customClass: {
                confirmButton: 'btn btn-primary me-3 waves-effect waves-light',
                cancelButton: 'btn btn-label-secondary waves-effect waves-light'
            },
            buttonsStyling: false
        }).then(function(result) {
            if (result.isConfirmed) {
                form.submit();
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire({
                    title: "{{ __('Your data is safe!') }}",
                    icon: "info",
                    timer: 2000,
                    showConfirmButton: false
                });
            }
        });
    });
</script>
