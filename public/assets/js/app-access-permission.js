/**
 * App user list (jquery)
 */

'use strict';

$(function () {
  var dataTablePermissions = $('.datatables-permissions'),
    dt_permission,
    userList = 'app-user-list.html';

  // Users List datatable
  if (dataTablePermissions.length) {
    dt_permission = dataTablePermissions.DataTable({
      ajax: assetsPath + 'json/permissions-list.json', // JSON file to add data
      columns: [
        // columns according to JSON
        { data: '' },
        { data: 'id' },
        { data: 'name' },
        { data: 'assigned_to' },
        { data: 'created_date' },
        { data: '' }
      ],
      columnDefs: [
        {
          // For Responsive
          className: 'control',
          orderable: false,
          searchable: false,
          responsivePriority: 2,
          targets: 0,
          render: function (data, type, full, meta) {
            return '';
          }
        },
        {
          targets: 1,
          searchable: false,
          visible: false
        },
        {
          // Name
          targets: 2,
          render: function (data, type, full, meta) {
            var $name = full['name'];
            return '<span class="text-nowrap text-heading">' + $name + '</span>';
          }
        },
        {
          // User Role
          targets: 3,
          orderable: false,
          render: function (data, type, full, meta) {
            var $assignedTo = full['assigned_to'],
              $output = '';
            var roleBadgeObj = {
              Admin: '<a href="' + userList + '"><span class="badge me-4 bg-label-primary">Administrator</span></a>',
              Manager: '<a href="' + userList + '"><span class="badge me-4 bg-label-warning">Manager</span></a>',
              Users: '<a href="' + userList + '"><span class="badge me-4 bg-label-success">Users</span></a>',
              Support: '<a href="' + userList + '"><span class="badge me-4 bg-label-info">Support</span></a>',
              Restricted:
                '<a href="' + userList + '"><span class="badge me-4 bg-label-danger">Restricted User</span></a>'
            };
            for (var i = 0; i < $assignedTo.length; i++) {
              var val = $assignedTo[i];
              $output += roleBadgeObj[val];
            }
            return '<span class="text-nowrap">' + $output + '</span>';
          }
        },
        {
          // remove ordering from Name
          targets: 4,
          orderable: false,
          render: function (data, type, full, meta) {
            var $date = full['created_date'];
            return '<span class="text-nowrap">' + $date + '</span>';
          }
        },
        {
          // Actions
          targets: -1,
          searchable: false,
          title: 'Actions',
          orderable: false,
          render: function (data, type, full, meta) {
            return (
              '<div class="d-flex align-items-center">' +
              '<span class="text-nowrap"><button class="btn btn-icon btn-text-secondary waves-effect waves-light rounded-pill me-1" data-bs-target="#editPermissionModal" data-bs-toggle="modal" data-bs-dismiss="modal"><i class="ti ti-edit ti-md"></i></button>' +
              '<a href="javascript:;" class="btn btn-icon btn-text-secondary waves-effect waves-light rounded-pill dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical ti-md mx-1"></i></a>' +
              '<div class="dropdown-menu dropdown-menu-end m-0">' +
              '<a href="javascript:;"" class="dropdown-item">Edit</a>' +
              '<a href="javascript:;" class="dropdown-item">Suspend</a>' +
              '</div>' +
              '</div>'
            );
          }
        }
      ],
      order: [[1, 'asc']],
      dom:
        '<"row mx-1"' +
        '<"col-sm-12 col-md-3" l>' +
        '<"col-sm-12 col-md-9"<"dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-md-end justify-content-center flex-wrap"<"me-4 mt-n6 mt-md-0"f>B>>' +
        '>t' +
        '<"row"' +
        '<"col-sm-12 col-md-6"i>' +
        '<"col-sm-12 col-md-6"p>' +
        '>',
      language: {
        sLengthMenu: 'Show _MENU_',
        search: '',
        searchPlaceholder: 'Search Permissions',
        paginate: {
          next: '<i class="ti ti-chevron-right ti-sm"></i>',
          previous: '<i class="ti ti-chevron-left ti-sm"></i>'
        }
      },
      // Buttons with Dropdown
      buttons: [
        {
          text: '<i class="ti ti-plus ti-xs me-0 me-sm-2"></i><span class="d-none d-sm-inline-block">Add Permission</span>',
          className: 'add-new btn btn-primary mb-6 mb-md-0 waves-effect waves-light',
          attr: {
            'data-bs-toggle': 'modal',
            'data-bs-target': '#addPermissionModal'
          },
          init: function (api, node, config) {
            $(node).removeClass('btn-secondary');
          }
        }
      ],
      // For responsive popup
      responsive: {
        details: {
          display: $.fn.dataTable.Responsive.display.modal({
            header: function (row) {
              var data = row.data();
              return 'Details of ' + data['name'];
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
          .columns(3)
          .every(function () {
            var column = this;
            var select = $(
              '<select id="UserRole" class="form-select text-capitalize"><option value=""> Select Role </option></select>'
            )
              .appendTo('.user_role')
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

  // Delete Record
  $('.datatables-permissions tbody').on('click', '.delete-record', function () {
    dt_permission.row($(this).parents('tr')).remove().draw();
  });

  // Filter form control to default size
  // ? setTimeout used for multilingual table initialization
  setTimeout(() => {
    $('.dataTables_filter .form-control').removeClass('form-control-sm');
    $('.dataTables_length .form-select').removeClass('form-select-sm');
    $('.dataTables_info').addClass('ms-n1');
    $('.dataTables_paginate').addClass('me-n1');
  }, 300);
});
