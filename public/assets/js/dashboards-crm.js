/**
 * Dashboard CRM
 */

'use strict';
(function () {
  let cardColor, labelColor, headingColor, shadeColor, legendColor, borderColor, barBgColor;
  if (isDarkStyle) {
    cardColor = config.colors_dark.cardColor;
    labelColor = config.colors_dark.textMuted;
    legendColor = config.colors_dark.bodyColor;
    borderColor = config.colors_dark.borderColor;
    headingColor = config.colors_dark.headingColor;
    barBgColor = '#3d4157';
    shadeColor = 'dark';
  } else {
    cardColor = config.colors.cardColor;
    labelColor = config.colors.textMuted;
    legendColor = config.colors.bodyColor;
    borderColor = config.colors.borderColor;
    headingColor = config.colors.headingColor;
    barBgColor = '#efeef0';
    shadeColor = '';
  }

  // Orders last week Bar Chart
  // --------------------------------------------------------------------
  const ordersLastWeekEl = document.querySelector('#ordersLastWeek'),
    ordersLastWeekConfig = {
      chart: {
        height: 75,
        parentHeightOffset: 0,
        type: 'bar',
        toolbar: {
          show: false
        }
      },
      tooltip: {
        enabled: false
      },
      plotOptions: {
        bar: {
          barHeight: '100%',
          columnWidth: '30px',
          startingShape: 'rounded',
          endingShape: 'rounded',
          borderRadius: 4,
          colors: {
            backgroundBarColors: [barBgColor, barBgColor, barBgColor, barBgColor, barBgColor, barBgColor, barBgColor],
            backgroundBarRadius: 4
          }
        }
      },
      colors: [config.colors.primary],
      grid: {
        show: false,
        padding: {
          top: -30,
          left: -16,
          bottom: 0,
          right: -6
        }
      },
      dataLabels: {
        enabled: false
      },
      series: [
        {
          data: [60, 50, 20, 45, 50, 30, 70]
        }
      ],
      legend: {
        show: false
      },
      xaxis: {
        categories: ['M', 'T', 'W', 'T', 'F', 'S', 'S'],
        axisBorder: {
          show: false
        },
        axisTicks: {
          show: false
        },
        labels: {
          show: false
        }
      },
      yaxis: {
        labels: {
          show: false
        }
      },
      responsive: [
        {
          breakpoint: 1441,
          options: {
            plotOptions: {
              bar: {
                columnWidth: '40%',
                borderRadius: 4
              }
            }
          }
        },
        {
          breakpoint: 1368,
          options: {
            plotOptions: {
              bar: {
                columnWidth: '48%'
              }
            }
          }
        },
        {
          breakpoint: 1200,
          options: {
            plotOptions: {
              bar: {
                borderRadius: 6,
                columnWidth: '30%',
                colors: {
                  backgroundBarRadius: 6
                }
              }
            }
          }
        },
        {
          breakpoint: 991,
          options: {
            plotOptions: {
              bar: {
                columnWidth: '35%',
                borderRadius: 6
              }
            }
          }
        },
        {
          breakpoint: 883,
          options: {
            plotOptions: {
              bar: {
                columnWidth: '40%'
              }
            }
          }
        },
        {
          breakpoint: 768,
          options: {
            plotOptions: {
              bar: {
                columnWidth: '25%'
              }
            }
          }
        },
        {
          breakpoint: 576,
          options: {
            plotOptions: {
              bar: {
                borderRadius: 9
              },
              colors: {
                backgroundBarRadius: 9
              }
            }
          }
        },
        {
          breakpoint: 479,
          options: {
            plotOptions: {
              bar: {
                borderRadius: 4,
                columnWidth: '35%'
              },
              colors: {
                backgroundBarRadius: 4
              }
            },
            grid: {
              padding: {
                right: -15,
                left: -15
              }
            }
          }
        },
        {
          breakpoint: 376,
          options: {
            plotOptions: {
              bar: {
                borderRadius: 3
              }
            }
          }
        }
      ]
    };
  if (typeof ordersLastWeekEl !== undefined && ordersLastWeekEl !== null) {
    const ordersLastWeek = new ApexCharts(ordersLastWeekEl, ordersLastWeekConfig);
    ordersLastWeek.render();
  }

  // Sales last year Area Chart
  // --------------------------------------------------------------------
  const salesLastYearEl = document.querySelector('#salesLastYear'),
    salesLastYearConfig = {
      chart: {
        height: 75,
        type: 'area',
        parentHeightOffset: 0,
        toolbar: {
          show: false
        },
        sparkline: {
          enabled: true
        }
      },
      markers: {
        colors: 'transparent',
        strokeColors: 'transparent'
      },
      grid: {
        show: false
      },
      colors: [config.colors.success],
      fill: {
        type: 'gradient',
        gradient: {
          shade: shadeColor,
          shadeIntensity: 0.8,
          opacityFrom: 0.6,
          opacityTo: 0.25
        }
      },
      dataLabels: {
        enabled: false
      },
      stroke: {
        width: 2,
        curve: 'smooth'
      },
      series: [
        {
          data: [200, 55, 400, 250]
        }
      ],
      xaxis: {
        show: true,
        lines: {
          show: false
        },
        labels: {
          show: false
        },
        stroke: {
          width: 0
        },
        axisBorder: {
          show: false
        }
      },
      yaxis: {
        stroke: {
          width: 0
        },
        show: false
      },
      tooltip: {
        enabled: false
      }
    };
  if (typeof salesLastYearEl !== undefined && salesLastYearEl !== null) {
    const salesLastYear = new ApexCharts(salesLastYearEl, salesLastYearConfig);
    salesLastYear.render();
  }

  // Revenue Growth Chart
  // --------------------------------------------------------------------
  const revenueGrowthEl = document.querySelector('#revenueGrowth'),
    revenueGrowthConfig = {
      chart: {
        height: 170,
        type: 'bar',
        parentHeightOffset: 0,
        toolbar: {
          show: false
        }
      },
      plotOptions: {
        bar: {
          barHeight: '80%',
          columnWidth: '30%',
          startingShape: 'rounded',
          endingShape: 'rounded',
          borderRadius: 6,
          distributed: true
        }
      },
      tooltip: {
        enabled: false
      },
      grid: {
        show: false,
        padding: {
          top: -20,
          bottom: -12,
          left: -10,
          right: 0
        }
      },
      colors: [
        config.colors_label.success,
        config.colors_label.success,
        config.colors_label.success,
        config.colors_label.success,
        config.colors.success,
        config.colors_label.success,
        config.colors_label.success
      ],
      dataLabels: {
        enabled: false
      },
      series: [
        {
          data: [25, 40, 55, 70, 85, 70, 55]
        }
      ],
      legend: {
        show: false
      },
      xaxis: {
        categories: ['M', 'T', 'W', 'T', 'F', 'S', 'S'],
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
          }
        }
      },
      yaxis: {
        labels: {
          show: false
        }
      },
      states: {
        hover: {
          filter: {
            type: 'none'
          }
        }
      },
      responsive: [
        {
          breakpoint: 1471,
          options: {
            plotOptions: {
              bar: {
                columnWidth: '50%'
              }
            }
          }
        },
        {
          breakpoint: 1350,
          options: {
            plotOptions: {
              bar: {
                columnWidth: '57%'
              }
            }
          }
        },
        {
          breakpoint: 1032,
          options: {
            plotOptions: {
              bar: {
                columnWidth: '60%'
              }
            }
          }
        },
        {
          breakpoint: 992,
          options: {
            plotOptions: {
              bar: {
                columnWidth: '40%',
                borderRadius: 8
              }
            }
          }
        },
        {
          breakpoint: 855,
          options: {
            plotOptions: {
              bar: {
                columnWidth: '50%',
                borderRadius: 6
              }
            }
          }
        },
        {
          breakpoint: 440,
          options: {
            plotOptions: {
              bar: {
                columnWidth: '40%'
              }
            }
          }
        },
        {
          breakpoint: 381,
          options: {
            plotOptions: {
              bar: {
                columnWidth: '45%'
              }
            }
          }
        }
      ]
    };
  if (typeof revenueGrowthEl !== undefined && revenueGrowthEl !== null) {
    const revenueGrowth = new ApexCharts(revenueGrowthEl, revenueGrowthConfig);
    revenueGrowth.render();
  }

  // Earning Reports Tabs Function
  function EarningReportsBarChart(arrayData, highlightData) {
    const basicColor = config.colors_label.primary,
      highlightColor = config.colors.primary;
    var colorArr = [];

    for (let i = 0; i < arrayData.length; i++) {
      if (i === highlightData) {
        colorArr.push(highlightColor);
      } else {
        colorArr.push(basicColor);
      }
    }

    const earningReportBarChartOpt = {
      chart: {
        height: 231,
        parentHeightOffset: 0,
        type: 'bar',
        toolbar: {
          show: false
        }
      },
      plotOptions: {
        bar: {
          columnWidth: '32%',
          startingShape: 'rounded',
          borderRadius: 6,
          distributed: true,
          dataLabels: {
            position: 'top'
          }
        }
      },
      grid: {
        show: false,
        padding: {
          top: 0,
          bottom: 0,
          left: -10,
          right: -10
        }
      },
      colors: colorArr,
      dataLabels: {
        enabled: true,
        formatter: function (val) {
          return val + 'k';
        },
        offsetY: -30,
        style: {
          fontSize: '15px',
          colors: [headingColor],
          fontWeight: '500',
          fontFamily: 'Public Sans'
        }
      },
      series: [
        {
          data: arrayData
        }
      ],
      legend: {
        show: false
      },
      tooltip: {
        enabled: false
      },
      xaxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
        axisBorder: {
          show: true,
          color: borderColor
        },
        axisTicks: {
          show: false
        },
        labels: {
          style: {
            colors: labelColor,
            fontSize: '13px',
            fontFamily: 'Public Sans'
          }
        }
      },
      yaxis: {
        labels: {
          offsetX: -15,
          formatter: function (val) {
            return parseInt(val / 1) + 'k';
          },
          style: {
            fontSize: '13px',
            colors: labelColor,
            fontFamily: 'Public Sans'
          },
          min: 0,
          max: 60000,
          tickAmount: 6
        }
      },
      responsive: [
        {
          breakpoint: 1441,
          options: {
            plotOptions: {
              bar: {
                columnWidth: '41%'
              }
            }
          }
        },
        {
          breakpoint: 590,
          options: {
            plotOptions: {
              bar: {
                columnWidth: '61%',
                borderRadius: 5
              }
            },
            yaxis: {
              labels: {
                show: false
              }
            },
            grid: {
              padding: {
                right: 0,
                left: -20
              }
            },
            dataLabels: {
              style: {
                fontSize: '12px',
                fontWeight: '400'
              }
            }
          }
        }
      ]
    };
    return earningReportBarChartOpt;
  }
  var chartJson = 'earning-reports-charts.json';
  // Earning Chart JSON data
  var earningReportsChart = $.ajax({
    url: assetsPath + 'json/' + chartJson, //? Use your own search api instead
    dataType: 'json',
    async: false
  }).responseJSON;

  // Earning Reports Tabs Orders
  // --------------------------------------------------------------------
  const earningReportsTabsOrdersEl = document.querySelector('#earningReportsTabsOrders'),
    earningReportsTabsOrdersConfig = EarningReportsBarChart(
      earningReportsChart['data'][0]['chart_data'],
      earningReportsChart['data'][0]['active_option']
    );
  if (typeof earningReportsTabsOrdersEl !== undefined && earningReportsTabsOrdersEl !== null) {
    const earningReportsTabsOrders = new ApexCharts(earningReportsTabsOrdersEl, earningReportsTabsOrdersConfig);
    earningReportsTabsOrders.render();
  }
  // Earning Reports Tabs Sales
  // --------------------------------------------------------------------
  const earningReportsTabsSalesEl = document.querySelector('#earningReportsTabsSales'),
    earningReportsTabsSalesConfig = EarningReportsBarChart(
      earningReportsChart['data'][1]['chart_data'],
      earningReportsChart['data'][1]['active_option']
    );
  if (typeof earningReportsTabsSalesEl !== undefined && earningReportsTabsSalesEl !== null) {
    const earningReportsTabsSales = new ApexCharts(earningReportsTabsSalesEl, earningReportsTabsSalesConfig);
    earningReportsTabsSales.render();
  }
  // Earning Reports Tabs Profit
  // --------------------------------------------------------------------
  const earningReportsTabsProfitEl = document.querySelector('#earningReportsTabsProfit'),
    earningReportsTabsProfitConfig = EarningReportsBarChart(
      earningReportsChart['data'][2]['chart_data'],
      earningReportsChart['data'][2]['active_option']
    );
  if (typeof earningReportsTabsProfitEl !== undefined && earningReportsTabsProfitEl !== null) {
    const earningReportsTabsProfit = new ApexCharts(earningReportsTabsProfitEl, earningReportsTabsProfitConfig);
    earningReportsTabsProfit.render();
  }
  // Earning Reports Tabs Income
  // --------------------------------------------------------------------
  const earningReportsTabsIncomeEl = document.querySelector('#earningReportsTabsIncome'),
    earningReportsTabsIncomeConfig = EarningReportsBarChart(
      earningReportsChart['data'][3]['chart_data'],
      earningReportsChart['data'][3]['active_option']
    );
  if (typeof earningReportsTabsIncomeEl !== undefined && earningReportsTabsIncomeEl !== null) {
    const earningReportsTabsIncome = new ApexCharts(earningReportsTabsIncomeEl, earningReportsTabsIncomeConfig);
    earningReportsTabsIncome.render();
  }

  // Sales Last 6 Months - Radar Chart
  // --------------------------------------------------------------------
  const salesLastMonthEl = document.querySelector('#salesLastMonth'),
    salesLastMonthConfig = {
      series: [
        {
          name: 'Sales',
          data: [32, 27, 27, 30, 25, 25]
        },
        {
          name: 'Visits',
          data: [25, 35, 20, 20, 20, 20]
        }
      ],
      chart: {
        height: 340,
        type: 'radar',
        toolbar: {
          show: false
        }
      },
      plotOptions: {
        radar: {
          polygons: {
            strokeColors: borderColor,
            connectorColors: borderColor
          }
        }
      },
      stroke: {
        show: false,
        width: 0
      },
      legend: {
        show: true,
        fontSize: '13px',
        position: 'bottom',
        labels: {
          colors: legendColor,
          useSeriesColors: false
        },
        markers: {
          height: 12,
          width: 12,
          offsetX: -5
        },
        itemMargin: {
          horizontal: 10
        },
        onItemHover: {
          highlightDataSeries: false
        }
      },
      colors: [config.colors.primary, config.colors.info],
      fill: {
        opacity: [1, 0.85]
      },
      markers: {
        size: 0
      },
      grid: {
        show: false,
        padding: {
          top: 0,
          bottom: -5
        }
      },
      xaxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
        labels: {
          show: true,
          style: {
            colors: [labelColor, labelColor, labelColor, labelColor, labelColor, labelColor],
            fontSize: '13px',
            fontFamily: 'Public Sans'
          }
        }
      },
      yaxis: {
        show: false,
        min: 0,
        max: 40,
        tickAmount: 4
      },
      responsive: [
        {
          breakpoint: 769,
          options: {
            chart: {
              height: 400
            }
          }
        }
      ]
    };
  if (typeof salesLastMonthEl !== undefined && salesLastMonthEl !== null) {
    const salesLastMonth = new ApexCharts(salesLastMonthEl, salesLastMonthConfig);
    salesLastMonth.render();
  }

  // Progress Chart
  // --------------------------------------------------------------------
  // Radial bar chart functions
  function radialBarChart(color, value) {
    const radialBarChartOpt = {
      chart: {
        height: 48,
        width: 38,
        type: 'radialBar'
      },
      plotOptions: {
        radialBar: {
          hollow: {
            size: '25%'
          },
          dataLabels: {
            show: false
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
          top: -15,
          bottom: -15,
          left: -5,
          right: -15
        }
      },
      series: [value],
      labels: ['Progress']
    };
    return radialBarChartOpt;
  }
  // All progress chart
  const chartProgressList = document.querySelectorAll('.chart-progress');
  if (chartProgressList) {
    chartProgressList.forEach(function (chartProgressEl) {
      const color = config.colors[chartProgressEl.dataset.color],
        series = chartProgressEl.dataset.series;
      const optionsBundle = radialBarChart(color, series);
      const chart = new ApexCharts(chartProgressEl, optionsBundle);
      chart.render();
    });
  }

  // Project Status - Line Chart
  // --------------------------------------------------------------------
  const projectStatusEl = document.querySelector('#projectStatusChart'),
    projectStatusConfig = {
      chart: {
        height: 230,
        type: 'area',
        toolbar: false
      },
      markers: {
        strokeColor: 'transparent'
      },
      series: [
        {
          data: [2000, 2000, 4000, 4000, 3050, 3050, 2000, 2000, 3050, 3050, 4700, 4700, 2750, 2750, 5700, 5700]
        }
      ],
      dataLabels: {
        enabled: false
      },
      grid: {
        show: false,
        padding: {
          left: -10,
          right: -5
        }
      },
      stroke: {
        width: 3,
        curve: 'straight'
      },
      colors: [config.colors.warning],
      fill: {
        type: 'gradient',
        gradient: {
          opacityFrom: 0.6,
          opacityTo: 0.15,
          stops: [0, 95, 100]
        }
      },
      xaxis: {
        labels: {
          show: false
        },
        axisBorder: {
          show: false
        },
        axisTicks: {
          show: false
        },
        lines: {
          show: false
        }
      },
      yaxis: {
        labels: {
          show: false
        },
        min: 1000,
        max: 6000,
        tickAmount: 5
      },
      tooltip: {
        enabled: false
      }
    };
  if (typeof projectStatusEl !== undefined && projectStatusEl !== null) {
    const projectStatus = new ApexCharts(projectStatusEl, projectStatusConfig);
    projectStatus.render();
  }
})();
