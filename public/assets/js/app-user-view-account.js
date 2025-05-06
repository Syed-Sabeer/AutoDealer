/**
 * App User View - Account (jquery)
 */

$(function () {
  'use strict';

  // Variable declaration for table
  var dt_invoice_table = $('.datatable-invoice');

  // Invoice datatable
  // --------------------------------------------------------------------
  if (dt_invoice_table.length) {
    var dt_invoice = dt_invoice_table.DataTable({
      ajax: assetsPath + 'json/invoice-list.json', // JSON file to add data
      columns: [
        // columns according to JSON
        { data: '' },
        { data: 'invoice_id' },
        { data: 'invoice_status' },
        { data: 'total' },
        { data: 'issued_date' },
        { data: 'action' }
      ],
      columnDefs: [
        {
          // For Responsive
          className: 'control',
          responsivePriority: 2,
          targets: 0,
          render: function (data, type, full, meta) {
            return '';
          }
        },
        {
          // Invoice ID
          targets: 1,
          render: function (data, type, full, meta) {
            var $invoice_id = full['invoice_id'];
            // Creates full output for row
            var $row_output = '<a href="app-invoice-preview.html"><span>#' + $invoice_id + '</span></a>';
            return $row_output;
          }
        },
        {
          // Invoice status
          targets: 2,
          render: function (data, type, full, meta) {
            var $invoice_status = full['invoice_status'],
              $due_date = full['due_date'],
              $balance = full['balance'];
            var roleBadgeObj = {
              Sent: '<span class="badge badge-center d-flex align-items-center justify-content-center rounded-pill bg-label-secondary w-px-30 h-px-30"><i class="ti ti-circle-check ti-xs"></i></span>',
              Draft:
                '<span class="badge badge-center d-flex align-items-center justify-content-center rounded-pill bg-label-primary w-px-30 h-px-30"><i class="ti ti-device-floppy ti-xs"></i></span>',
              'Past Due':
                '<span class="badge badge-center d-flex align-items-center justify-content-center rounded-pill bg-label-danger w-px-30 h-px-30"><i class="ti ti-info-circle ti-xs"></i></span>',
              'Partial Payment':
                '<span class="badge badge-center d-flex align-items-center justify-content-center rounded-pill bg-label-success w-px-30 h-px-30"><i class="ti ti-circle-half-2 ti-xs"></i></span>',
              Paid: '<span class="badge badge-center d-flex align-items-center justify-content-center rounded-pill bg-label-warning w-px-30 h-px-30"><i class="ti ti-chart-pie ti-xs"></i></span>',
              Downloaded:
                '<span class="badge badge-center d-flex align-items-center justify-content-center rounded-pill bg-label-info w-px-30 h-px-30"><i class="ti ti-arrow-down-circle ti-xs"></i></span>'
            };
            return (
              "<span class='d-inline-block' data-bs-toggle='tooltip' data-bs-html='true' title='<span>" +
              $invoice_status +
              '<br> <span class="fw-medium">Balance:</span> ' +
              $balance +
              '<br> <span class="fw-medium">Due Date:</span> ' +
              $due_date +
              "</span>'>" +
              roleBadgeObj[$invoice_status] +
              '</span>'
            );
          }
        },
        {
          // Total Invoice Amount
          targets: 3,
          render: function (data, type, full, meta) {
            var $total = full['total'];
            return '$' + $total;
          }
        },
        {
          // Actions
          targets: -1,
          title: 'Actions',
          orderable: false,
          render: function (data, type, full, meta) {
            return (
              '<div class="d-flex align-items-center">' +
              '<a href="javascript:;" class="btn btn-icon btn-text-secondary waves-effect waves-light rounded-pill delete-record" data-bs-toggle="tooltip" title="Delete record"><i class="ti ti-trash ti-md"></i></a>' +
              '<a href="app-invoice-preview.html" class="btn btn-icon btn-text-secondary waves-effect waves-light rounded-pill" data-bs-toggle="tooltip" title="Preview"><i class="ti ti-eye ti-md"></i></a>' +
              '<div class="d-inline-block">' +
              '<a href="javascript:;" class="btn btn-sm btn-icon dropdown-toggle hide-arrow btn btn-icon btn-text-secondary waves-effect waves-light rounded-pill" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical ti-md"></i></a>' +
              '<ul class="dropdown-menu dropdown-menu-end m-0">' +
              '<li><a href="javascript:;" class="dropdown-item">Details</a></li>' +
              '<li><a href="javascript:;" class="dropdown-item">Archive</a></li>' +
              '</ul>' +
              '</div>' +
              '</div>'
            );
          }
        }
      ],
      order: [[1, 'desc']],
      dom:
        '<"row mx-6"' +
        '<"col-sm-6 col-12 d-flex align-items-center justify-content-center justify-content-sm-start mt-6 mt-sm-0"<"invoice-head-label">>' +
        '<"col-sm-6 col-12 d-flex justify-content-center justify-content-md-end align-items-baseline"<"dt-action-buttons d-flex justify-content-center flex-md-row align-items-baseline gap-2"lB>>' +
        '>t' +
        '<"row mx-4"' +
        '<"col-sm-12 col-xxl-6 text-center text-xxl-start pb-md-2 pb-xxl-0"i>' +
        '<"col-sm-12 col-xxl-6 d-md-flex justify-content-xxl-end justify-content-center"p>' +
        '>',
      language: {
        sLengthMenu: 'Show _MENU_',
        search: '',
        searchPlaceholder: 'Search Invoice',
        paginate: {
          next: '<i class="ti ti-chevron-right ti-sm"></i>',
          previous: '<i class="ti ti-chevron-left ti-sm"></i>'
        }
      },
      // Buttons with Dropdown
      buttons: [
        {
          extend: 'collection',
          className: 'btn btn-label-secondary dropdown-toggle float-sm-end mb-3 mb-sm-0 waves-effect waves-light',
          text: '<i class="ti ti-upload ti-xs me-2"></i>Export',
          buttons: [
            {
              extend: 'print',
              text: '<i class="ti ti-printer me-2" ></i>Print',
              className: 'dropdown-item',
              exportOptions: { columns: [1, 2, 3, 4] }
            },
            {
              extend: 'csv',
              text: '<i class="ti ti-file-text me-2" ></i>Csv',
              className: 'dropdown-item',
              exportOptions: { columns: [1, 2, 3, 4] }
            },
            {
              extend: 'excel',
              text: '<i class="ti ti-file-spreadsheet me-2"></i>Excel',
              className: 'dropdown-item',
              exportOptions: { columns: [1, 2, 3, 4] }
            },
            {
              extend: 'pdf',
              text: '<i class="ti ti-file-description me-2"></i>Pdf',
              className: 'dropdown-item',
              exportOptions: { columns: [1, 2, 3, 4] }
            },
            {
              extend: 'copy',
              text: '<i class="ti ti-copy me-2" ></i>Copy',
              className: 'dropdown-item',
              exportOptions: { columns: [1, 2, 3, 4] }
            }
          ]
        }
      ],
      // For responsive popup
      responsive: {
        details: {
          display: $.fn.dataTable.Responsive.display.modal({
            header: function (row) {
              var data = row.data();
              return 'Details of ' + data['full_name'];
            }
          }),
          type: 'column',
          renderer: function (api, rowIdx, columns) {
            var data = $.map(columns, function (col, i) {
              return col.title !== '' // ? Do not show row in modal popup if title is blank (for check box)
                ? '<tr data-dt-row="' +
                    col.rowIndex +
                    '" data-dt-column="' +
                    col.columnIndex +
                    '">' +
                    '<td>' +
                    col.title +
                    ':' +
                    '</td> ' +
                    '<td>' +
                    col.data +
                    '</td>' +
                    '</tr>'
                : '';
            }).join('');

            return data ? $('<table class="table"/><tbody />').append(data) : false;
          }
        }
      }
    });
    $('div.invoice-head-label').html('<h5 class="card-title mb-0">Invoice List</h5>');
  }
  // On each datatable draw, initialize tooltip
  dt_invoice_table.on('draw.dt', function () {
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
      return new bootstrap.Tooltip(tooltipTriggerEl, {
        boundary: document.body
      });
    });
  });

  // Delete Record
  $('.datatable-invoice tbody').on('click', '.delete-record', function () {
    dt_invoice.row($(this).parents('tr')).remove().draw();
  });
  // Filter form control to default size
  // ? setTimeout used for multilingual table initialization
  setTimeout(() => {
    $('.dataTables_filter .form-control').removeClass('form-control-sm');
    $('.dataTables_length .form-select').removeClass('form-select-sm');
  }, 300);
});
