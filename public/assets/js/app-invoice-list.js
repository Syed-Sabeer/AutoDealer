/**
 * App Invoice List (jquery)
 */

'use strict';

$(function () {
  // Variable declaration for table
  var dt_invoice_table = $('.invoice-list-table');

  // Invoice datatable
  if (dt_invoice_table.length) {
    var dt_invoice = dt_invoice_table.DataTable({
      ajax: assetsPath + 'json/invoice-list.json', // JSON file to add data
      columns: [
        // columns according to JSON
        { data: 'invoice_id' },
        { data: 'invoice_id' },
        { data: 'invoice_id' },
        { data: 'invoice_status' },
        { data: 'issued_date' },
        { data: 'client_name' },
        { data: 'total' },
        { data: 'balance' },
        { data: 'invoice_status' },
        { data: 'action' }
      ],
      columnDefs: [
        {
          // For Responsive
          className: 'control',
          responsivePriority: 2,
          searchable: false,
          targets: 0,
          render: function (data, type, full, meta) {
            return '';
          }
        },
        {
          // For Checkboxes
          targets: 1,
          orderable: false,
          checkboxes: {
            selectAllRender: '<input type="checkbox" class="form-check-input">'
          },
          render: function () {
            return '<input type="checkbox" class="dt-checkboxes form-check-input" >';
          },
          searchable: false
        },
        {
          // Invoice ID
          targets: 2,
          render: function (data, type, full, meta) {
            var $invoice_id = full['invoice_id'];
            // Creates full output for row
            var $row_output = '<a href="app-invoice-preview.html">#' + $invoice_id + '</a>';
            return $row_output;
          }
        },
        {
          // Invoice status
          targets: 3,
          render: function (data, type, full, meta) {
            var $invoice_status = full['invoice_status'],
              $due_date = full['due_date'],
              $balance = full['balance'];
            var roleBadgeObj = {
              Sent: '<span class="badge badge-center rounded-pill bg-label-secondary w-px-30 h-px-30 d-flex align-items-center justify-content-center"><i class="ti ti-circle-check ti-xs"></i></span>',
              Draft:
                '<span class="badge badge-center rounded-pill bg-label-primary w-px-30 h-px-30 d-flex align-items-center justify-content-center"><i class="ti ti-device-floppy ti-xs"></i></span>',
              'Past Due':
                '<span class="badge badge-center rounded-pill bg-label-danger w-px-30 h-px-30 d-flex align-items-center justify-content-center"><i class="ti ti-info-circle ti-xs"></i></span>',
              'Partial Payment':
                '<span class="badge badge-center rounded-pill bg-label-success w-px-30 h-px-30 d-flex align-items-center justify-content-center"><i class="ti ti-circle-half-2 ti-xs"></i></span>',
              Paid: '<span class="badge badge-center rounded-pill bg-label-warning w-px-30 h-px-30 d-flex align-items-center justify-content-center"><i class="ti ti-chart-pie ti-xs"></i></span>',
              Downloaded:
                '<span class="badge badge-center rounded-pill bg-label-info w-px-30 h-px-30 d-flex align-items-center justify-content-center"><i class="ti ti-arrow-down-circle ti-xs"></i></span>'
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
          // Client name and Service
          targets: 4,
          responsivePriority: 4,
          render: function (data, type, full, meta) {
            var $name = full['client_name'],
              $service = full['service'],
              $image = full['avatar_image'],
              $rand_num = Math.floor(Math.random() * 11) + 1,
              $user_img = $rand_num + '.png';
            if ($image === true) {
              // For Avatar image
              var $output =
                '<img src="' + assetsPath + 'img/avatars/' + $user_img + '" alt="Avatar" class="rounded-circle">';
            } else {
              // For Avatar badge
              var stateNum = Math.floor(Math.random() * 6),
                states = ['success', 'danger', 'warning', 'info', 'primary', 'secondary'],
                $state = states[stateNum],
                $name = full['client_name'],
                $initials = $name.match(/\b\w/g) || [];
              $initials = (($initials.shift() || '') + ($initials.pop() || '')).toUpperCase();
              $output = '<span class="avatar-initial rounded-circle bg-label-' + $state + '">' + $initials + '</span>';
            }
            // Creates full output for row
            var $row_output =
              '<div class="d-flex justify-content-start align-items-center">' +
              '<div class="avatar-wrapper">' +
              '<div class="avatar avatar-sm me-3">' +
              $output +
              '</div>' +
              '</div>' +
              '<div class="d-flex flex-column">' +
              '<a href="pages-profile-user.html" class="text-heading text-truncate"><span class="fw-medium">' +
              $name +
              '</span></a>' +
              '<small class="text-truncate">' +
              $service +
              '</small>' +
              '</div>' +
              '</div>';
            return $row_output;
          }
        },
        {
          // Total Invoice Amount
          targets: 5,
          render: function (data, type, full, meta) {
            var $total = full['total'];
            return '<span class="d-none">' + $total + '</span>$' + $total;
          }
        },
        {
          // Due Date
          targets: 6,
          render: function (data, type, full, meta) {
            var $due_date = new Date(full['due_date']);
            // Creates full output for row
            var $row_output =
              '<span class="d-none">' +
              moment($due_date).format('YYYYMMDD') +
              '</span>' +
              moment($due_date).format('DD MMM YYYY');
            $due_date;
            return $row_output;
          }
        },
        {
          // Client Balance/Status
          targets: 7,
          orderable: false,
          render: function (data, type, full, meta) {
            var $balance = full['balance'];
            if ($balance === 0) {
              var $badge_class = 'bg-label-success';
              return '<span class="badge ' + $badge_class + '" text-capitalized> Paid </span>';
            } else {
              return (
                '<span class="d-none">' + $balance + '</span>' + '<span class="text-heading">' + $balance + '</span>'
              );
            }
          }
        },
        {
          targets: 8,
          visible: false
        },
        {
          // Actions
          targets: -1,
          title: 'Actions',
          searchable: false,
          orderable: false,
          render: function (data, type, full, meta) {
            return (
              '<div class="d-flex align-items-center">' +
              '<a href="javascript:;" data-bs-toggle="tooltip" class="btn btn-icon btn-text-secondary waves-effect waves-light rounded-pill" data-bs-placement="top" title="Delete"><i class="ti ti-trash mx-2 ti-md"></i></a>' +
              '<a href="app-invoice-preview.html" data-bs-toggle="tooltip" class="btn btn-icon btn-text-secondary waves-effect waves-light rounded-pill" data-bs-placement="top" title="Preview Invoice"><i class="ti ti-eye mx-2 ti-md"></i></a>' +
              '<div class="dropdown">' +
              '<a href="javascript:;" class="btn dropdown-toggle hide-arrow btn btn-icon btn-text-secondary waves-effect waves-light rounded-pill p-0" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical ti-md"></i></a>' +
              '<div class="dropdown-menu dropdown-menu-end">' +
              '<a href="javascript:;" class="dropdown-item">Download</a>' +
              '<a href="app-invoice-edit.html" class="dropdown-item">Edit</a>' +
              '<a href="javascript:;" class="dropdown-item">Duplicate</a>' +
              '</div>' +
              '</div>'
            );
          }
        }
      ],
      order: [[2, 'desc']],
      dom:
        '<"row mx-1"' +
        '<"col-12 col-md-6 d-flex align-items-center justify-content-center justify-content-md-start gap-2"l<"dt-action-buttons text-xl-end text-lg-start text-md-end text-start"B>>' +
        '<"col-12 col-md-6 d-flex align-items-center justify-content-end flex-column flex-md-row pe-5 gap-md-4 mt-n6 mt-md-0"f<"invoice_status mb-6 mb-md-0">>' +
        '>t' +
        '<"row mx-1"' +
        '<"col-sm-12 col-md-6"i>' +
        '<"col-sm-12 col-md-6"p>' +
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
          text: '<i class="ti ti-plus ti-xs me-md-2"></i><span class="d-md-inline-block d-none">Create Invoice</span>',
          className: 'btn btn-primary waves-effect waves-light',
          action: function (e, dt, button, config) {
            window.location = 'app-invoice-add.html';
          }
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
      },
      initComplete: function () {
        // Adding role filter once table initialized
        this.api()
          .columns(8)
          .every(function () {
            var column = this;
            var select = $(
              '<select id="UserRole" class="form-select"><option value=""> Invoice Status </option></select>'
            )
              .appendTo('.invoice_status')
              .on('change', function () {
                var val = $.fn.dataTable.util.escapeRegex($(this).val());
                column.search(val ? '^' + val + '$' : '', true, false).draw();
              });

            column
              .data()
              .unique()
              .sort()
              .each(function (d, j) {
                select.append('<option value="' + d + '" class="text-capitalize">' + d + '</option>');
              });
          });
      }
    });
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
  $('.invoice-list-table tbody').on('click', '.delete-record', function () {
    dt_invoice.row($(this).parents('tr')).remove().draw();
  });

  // Filter form control to default size
  // ? setTimeout used for multilingual table initialization
  setTimeout(() => {
    $('.dataTables_filter .form-control').removeClass('form-control-sm');
    $('.dataTables_length .form-select').removeClass('form-select-sm');
  }, 300);
});
