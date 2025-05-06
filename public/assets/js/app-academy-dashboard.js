/**
 * Academy Dashboard charts and datatable
 */

'use strict';

// Hour pie chart

(function () {
  let labelColor, headingColor, borderColor;

  if (isDarkStyle) {
    labelColor = config.colors_dark.textMuted;
    headingColor = config.colors_dark.headingColor;
    borderColor = config.colors_dark.borderColor;
  } else {
    labelColor = config.colors.textMuted;
    headingColor = config.colors.headingColor;
    borderColor = config.colors.borderColor;
  }

  // Donut Chart Colors
  const chartColors = {
    donut: {
      series1: '#209F59',
      series2: '#24B364',
      series3: config.colors.success,
      series4: '#53D28C',
      series5: '#7EDDA9',
      series6: '#A9E9C5'
    }
  };

  const leadsReportChartEl = document.querySelector('#leadsReportChart'),
    leadsReportChartConfig = {
      chart: {
        height: 170,
        width: 150,
        parentHeightOffset: 0,
        type: 'donut'
      },
      labels: ['36h', '56h', '16h', '32h', '56h', '16h'],
      series: [23, 35, 10, 20, 35, 23],
      colors: [
        chartColors.donut.series1,
        chartColors.donut.series2,
        chartColors.donut.series3,
        chartColors.donut.series4,
        chartColors.donut.series5,
        chartColors.donut.series6
      ],
      stroke: {
        width: 0
      },
      dataLabels: {
        enabled: false,
        formatter: function (val, opt) {
          return parseInt(val) + '%';
        }
      },
      legend: {
        show: false
      },
      tooltip: {
        theme: false
      },
      grid: {
        padding: {
          top: 0
        }
      },
      plotOptions: {
        pie: {
          donut: {
            size: '70%',
            labels: {
              show: true,
              value: {
                fontSize: '1.125rem',
                fontFamily: 'Public Sans',
                color: headingColor,
                fontWeight: 500,
                offsetY: -20,
                formatter: function (val) {
                  return parseInt(val) + '%';
                }
              },
              name: {
                offsetY: 20,
                fontFamily: 'Public Sans'
              },
              total: {
                show: true,
                fontSize: '.9375rem',
                label: 'Total',
                color: labelColor,
                formatter: function (w) {
                  return '231h';
                }
              }
            }
          }
        }
      }
    };
  if (typeof leadsReportChartEl !== undefined && leadsReportChartEl !== null) {
    const leadsReportChart = new ApexCharts(leadsReportChartEl, leadsReportChartConfig);
    leadsReportChart.render();
  }

  // datatbale bar chart

  const horizontalBarChartEl = document.querySelector('#horizontalBarChart'),
    horizontalBarChartConfig = {
      chart: {
        height: 320,
        type: 'bar',
        toolbar: {
          show: false
        }
      },
      plotOptions: {
        bar: {
          horizontal: true,
          barHeight: '70%',
          distributed: true,
          startingShape: 'rounded',
          borderRadius: 7
        }
      },
      grid: {
        strokeDashArray: 10,
        borderColor: borderColor,
        xaxis: {
          lines: {
            show: true
          }
        },
        yaxis: {
          lines: {
            show: false
          }
        },
        padding: {
          top: -35,
          bottom: -12
        }
      },

      colors: [
        config.colors.primary,
        config.colors.info,
        config.colors.success,
        config.colors.secondary,
        config.colors.danger,
        config.colors.warning
      ],
      fill: {
        opacity: [1, 1, 1, 1, 1, 1]
      },
      dataLabels: {
        enabled: true,
        style: {
          colors: ['#fff'],
          fontWeight: 400,
          fontSize: '13px',
          fontFamily: 'Public Sans'
        },
        formatter: function (val, opts) {
          return horizontalBarChartConfig.labels[opts.dataPointIndex];
        },
        offsetX: 0,
        dropShadow: {
          enabled: false
        }
      },
      labels: ['UI Design', 'UX Design', 'Music', 'Animation', 'React', 'SEO'],
      series: [
        {
          data: [35, 20, 14, 12, 10, 9]
        }
      ],

      xaxis: {
        categories: ['6', '5', '4', '3', '2', '1'],
        axisBorder: {
          show: false
        },
        axisTicks: {
          show: false
        },
        labels: {
          style: {
            colors: labelColor,
            fontSize: '13px',
            fontFamily: 'Public Sans'
          },
          formatter: function (val) {
            return `${val}%`;
          }
        }
      },
      yaxis: {
        max: 35,
        labels: {
          style: {
            colors: [labelColor],
            fontFamily: 'Public Sans',
            fontSize: '13px'
          }
        }
      },
      tooltip: {
        enabled: true,
        style: {
          fontSize: '12px'
        },
        onDatasetHover: {
          highlightDataSeries: false
        },
        custom: function ({ series, seriesIndex, dataPointIndex, w }) {
          return '<div class="px-3 py-2">' + '<span>' + series[seriesIndex][dataPointIndex] + '%</span>' + '</div>';
        }
      },
      legend: {
        show: false
      }
    };
  if (typeof horizontalBarChartEl !== undefined && horizontalBarChartEl !== null) {
    const horizontalBarChart = new ApexCharts(horizontalBarChartEl, horizontalBarChartConfig);
    horizontalBarChart.render();
  }

  //radial Barchart

  // Radial bar chart functions
  function radialBarChart(color, value, show) {
    const radialBarChartOpt = {
      chart: {
        height: show == 'true' ? 58 : 48,
        width: show == 'true' ? 58 : 38,
        type: 'radialBar'
      },
      plotOptions: {
        radialBar: {
          hollow: {
            size: show == 'true' ? '50%' : '25%'
          },
          dataLabels: {
            show: show == 'true' ? true : false,
            value: {
              offsetY: -10,
              fontSize: '15px',
              fontWeight: 500,
              fontFamily: 'Public Sans',
              color: headingColor
            }
          },
          track: {
            background: config.colors_label.secondary
          }
        }
      },
      stroke: {
        lineCap: 'round'
      },
      colors: [color],
      grid: {
        padding: {
          top: show == 'true' ? -12 : -15,
          bottom: show == 'true' ? -17 : -15,
          left: show == 'true' ? -17 : -5,
          right: -15
        }
      },
      series: [value],
      labels: show == 'true' ? [''] : ['Progress']
    };
    return radialBarChartOpt;
  }

  const chartProgressList = document.querySelectorAll('.chart-progress');
  if (chartProgressList) {
    chartProgressList.forEach(function (chartProgressEl) {
      const color = config.colors[chartProgressEl.dataset.color],
        series = chartProgressEl.dataset.series;
      const progress_variant = chartProgressEl.dataset.progress_variant;
      const optionsBundle = radialBarChart(color, series, progress_variant);
      const chart = new ApexCharts(chartProgressEl, optionsBundle);
      chart.render();
    });
  }

  // datatable

  // Variable declaration for table
  var dt_academy_course = $('.datatables-academy-course'),
    logoObj = {
      angular: '<span class="badge bg-label-danger rounded p-1_5"><i class="ti ti-brand-angular ti-28px"></i></span>',
      figma: '<span class="badge bg-label-warning rounded p-1_5"><i class="ti ti-brand-figma ti-28px"></i></span>',
      react: '<span class="badge bg-label-info rounded p-1_5"><i class="ti ti-brand-react-native ti-28px"></i></span>',
      art: '<span class="badge bg-label-success rounded p-1_5"><i class="ti ti-color-swatch ti-28px"></i></span>',
      fundamentals: '<span class="badge bg-label-primary rounded p-1_5"><i class="ti ti-diamond ti-28px"></i></span>'
    };

  // orders datatable
  if (dt_academy_course.length) {
    var dt_course = dt_academy_course.DataTable({
      ajax: assetsPath + 'json/app-academy-dashboard.json', // JSON file to add data
      columns: [
        // columns according to JSON
        { data: '' },
        { data: 'id' },
        { data: 'course name' },
        { data: 'time' },
        { data: 'progress' },
        { data: 'status' }
      ],
      columnDefs: [
        {
          // For Responsive
          className: 'control',
          searchable: false,
          orderable: false,
          responsivePriority: 2,
          targets: 0,
          render: function (data, type, full, meta) {
            return '';
          }
        },
        {
          // For Checkboxes
          targets: 1,
          orderable: false,
          searchable: false,
          checkboxes: true,
          render: function () {
            return '<input type="checkbox" class="dt-checkboxes form-check-input">';
          },
          checkboxes: {
            selectAllRender: '<input type="checkbox" class="form-check-input">'
          }
        },
        {
          // order number
          targets: 2,
          responsivePriority: 2,
          render: function (data, type, full, meta) {
            var $logo = full['logo'];
            var $course = full['course'];
            var $user = full['user'];
            var $image = full['image'];
            if ($image) {
              // For Avatar image
              var $output =
                '<img src="' + assetsPath + 'img/avatars/' + $image + '" alt="Avatar" class="rounded-circle">';
            } else {
              // For Avatar badge
              var stateNum = Math.floor(Math.random() * 6);
              var states = ['success', 'danger', 'warning', 'info', 'dark', 'primary', 'secondary'];
              var $state = states[stateNum],
                $name = full['user'],
                $initials = $name.match(/\b\w/g) || [];
              $initials = (($initials.shift() || '') + ($initials.pop() || '')).toUpperCase();
              $output = '<span class="avatar-initial rounded-circle bg-label-' + $state + '">' + $initials + '</span>';
            }
            // Creates full output for row
            var $row_output =
              '<div class="d-flex align-items-center">' +
              '<span class="me-4">' +
              logoObj[$logo] +
              '</span>' +
              '<div>' +
              '<a class="text-heading text-truncate fw-medium mb-2 text-wrap" href="app-academy-course-details.html">' +
              $course +
              '</a>' +
              '<div class="d-flex align-items-center mt-1">' +
              '<div class="avatar-wrapper me-2">' +
              '<div class="avatar avatar-xs">' +
              $output +
              '</div>' +
              '</div>' +
              '<small class="text-nowrap text-heading">' +
              $user +
              '</small>' +
              '</div>' +
              '</div>' +
              '</div>';
            return $row_output;
          }
        },
        {
          targets: 3,
          responsivePriority: 3,
          render: function (data, type, full, meta) {
            var duration = moment.duration(data);
            var Hs = Math.floor(duration.asHours());
            var minutes = Math.floor(duration.asMinutes()) - Hs * 60;
            var formattedTime = Hs + 'h ' + minutes + 'm';
            return '<span class="fw-medium text-nowrap text-heading">' + formattedTime + '</span>';
          }
        },
        {
          // progress
          targets: 4,
          render: function (data, type, full, meta) {
            var $status_number = full['status'];
            var $average_number = full['number'];

            return (
              '<div class="d-flex align-items-center gap-3">' +
              '<p class="fw-medium mb-0 text-heading">' +
              $status_number +
              '</p>' +
              '<div class="progress w-100" style="height: 8px;">' +
              '<div class="progress-bar" style="width: ' +
              $status_number +
              '" aria-valuenow="' +
              $status_number +
              '" aria-valuemin="0" aria-valuemax="100"></div>' +
              '</div>' +
              '<small>' +
              $average_number +
              '</small></div>'
            );
          }
        },
        {
          // status
          targets: 5,
          render: function (data, type, full, meta) {
            var $user_number = full['user_number'];
            var $note = full['note'];
            var $view = full['view'];

            return (
              '<div class="d-flex align-items-center justify-content-between">' +
              '<div class="w-px-50 d-flex align-items-center">' +
              '<i class="ti ti-users ti-lg me-2 text-primary"></i><span>' +
              $user_number +
              '</span></div>' +
              '<div class="w-px-50 d-flex align-items-center">' +
              '<i class="ti ti-book ti-lg me-2 text-info"></i><span>' +
              $note +
              '</span></div>' +
              '<div class="w-px-50 d-flex align-items-center">' +
              '<i class="ti ti-video ti-lg me-2 text-danger"></i><span>' +
              $view +
              '</span></div>' +
              '</div>'
            );
          }
        }
      ],
      order: [[2, 'desc']],
      dom:
        '<"card-header py-sm-0"<"head-label text-center">f' +
        '>t' +
        '<"row mx-md-4 flex-column flex-md-row align-items-center"' +
        '<"col-sm-6 col-12 text-center text-md-start pb-2 pb-xl-0 px-0"i>' +
        '<"col-sm-6 col-12 d-flex justify-content-center justify-content-md-end px-0"p>' +
        '>',
      lengthMenu: [5],
      language: {
        sLengthMenu: '_MENU_',
        search: '',
        searchPlaceholder: 'Search Course',
        paginate: {
          next: '<i class="ti ti-chevron-right ti-sm"></i>',
          previous: '<i class="ti ti-chevron-left ti-sm"></i>'
        }
      },
      // Buttons with Dropdown

      // For responsive popup
      responsive: {
        details: {
          display: $.fn.dataTable.Responsive.display.modal({
            header: function (row) {
              var data = row.data();
              return 'Details of ' + data['order'];
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
    $('div.head-label').html('<h5 class="card-title mb-0 text-nowrap">Course you are taking</h5>');
  }

  // Delete Record
  $('.datatables-orders tbody').on('click', '.delete-record', function () {
    dt_course.row($(this).parents('tr')).remove().draw();
  });

  // Filter form control to default size
  // ? setTimeout used for multilingual table initialization
  setTimeout(() => {
    $('.dataTables_filter .form-control').removeClass('form-control-sm');
    $('.dataTables_length .form-select').removeClass('form-select-sm');
  }, 300);
})();
