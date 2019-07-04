
<script>
    (function(jQuery) {
        var total_district = [];
        var name_district   = [];

        @if ( $data_chart != null || $data_chart != '')
            total_district[0] = '{{ $data_chart[0]->total }}';
            total_district[1] = '{{ $data_chart[1]->total }}';
            total_district[2] = '{{ $data_chart[2]->total }}';
            total_district[3] = '{{ $data_chart[3]->total }}';
            total_district[4] = '{{ $data_chart[4]->total }}';

            name_district[0] = '{{ $data_chart[0]->district }}';
            name_district[1] = '{{ $data_chart[1]->district }}';
            name_district[2] = '{{ $data_chart[2]->district }}';
            name_district[3] = '{{ $data_chart[3]->district }}';
            name_district[4] = '{{ $data_chart[4]->district }}';
        @else
            for (let index = 0; index <= 4; index++) {total_district [index]=0;name_district[index]='' ;}
        @endif
    
                var ctx = document.getElementById( "team-chart-consumer-location-ncp" );
                  ctx.height = 150;
                  var myChart = new Chart( ctx, {
                      type: 'line',
                      data: {
                          labels: [name_district[0], name_district[1], name_district[2], name_district[3], name_district[4]],
                          type: 'line',
                          defaultFontFamily: 'Montserrat',
                          datasets: [ {
                              data: [total_district[0], total_district[1], total_district[2], total_district[3], total_district[4]],
                              label: "Expense",
                              backgroundColor: 'rgba(0,103,255,.15)',
                              borderColor: 'rgba(0,103,255,0.5)',
                              borderWidth: 3.5,
                              pointStyle: 'circle',
                              pointRadius: 5,
                              pointBorderColor: 'transparent',
                              pointBackgroundColor: 'rgba(0,103,255,0.5)',
                                  }, ]
                      },
                      options: {
                          responsive: true,
                          tooltips: {
                              mode: 'index',
                              titleFontSize: 12,
                              titleFontColor: '#000',
                              bodyFontColor: '#000',
                              backgroundColor: '#fff',
                              titleFontFamily: 'Montserrat',
                              bodyFontFamily: 'Montserrat',
                              cornerRadius: 3,
                              intersect: false,
                          },
                          legend: {
                              display: false,
                              position: 'top',
                              labels: {
                                  usePointStyle: true,
                                  fontFamily: 'Montserrat',
                              },
                          },
                          scales: {
                              xAxes: [ {
                                  display: true,
                                  gridLines: {
                                      display: false,
                                      drawBorder: false
                                  },
                                  scaleLabel: {
                                      display: false,
                                      labelString: 'Month'
                                  }
                                      } ],
                              yAxes: [ {
                                  display: true,
                                  gridLines: {
                                      display: false,
                                      drawBorder: false
                                  },
                                  scaleLabel: {
                                      display: true,
                                      labelString: 'Value'
                                  }
                                      } ]
                          },
                          title: {
                              display: false,
                          }
                      }
                  } );


                  var ctx = document.getElementById( "team-chart-consumer-location-ncp-district" );
                  ctx.height = 150;
                  var myChart = new Chart( ctx, {
                      type: 'line',
                      data: {
                          labels: [name_district[0], name_district[1], name_district[2], name_district[3], name_district[4]],
                          type: 'line',
                          defaultFontFamily: 'Montserrat',
                          datasets: [ {
                              data: [total_district[0], total_district[1], total_district[2], total_district[3], total_district[4]],
                              label: "Expense",
                              backgroundColor: 'rgba(0,103,255,.15)',
                              borderColor: 'rgba(0,103,255,0.5)',
                              borderWidth: 3.5,
                              pointStyle: 'circle',
                              pointRadius: 5,
                              pointBorderColor: 'transparent',
                              pointBackgroundColor: 'rgba(0,103,255,0.5)',
                                  }, ]
                      },
                      options: {
                          responsive: true,
                          tooltips: {
                              mode: 'index',
                              titleFontSize: 12,
                              titleFontColor: '#000',
                              bodyFontColor: '#000',
                              backgroundColor: '#fff',
                              titleFontFamily: 'Montserrat',
                              bodyFontFamily: 'Montserrat',
                              cornerRadius: 3,
                              intersect: false,
                          },
                          legend: {
                              display: false,
                              position: 'top',
                              labels: {
                                  usePointStyle: true,
                                  fontFamily: 'Montserrat',
                              },
                          },
                          scales: {
                              xAxes: [ {
                                  display: true,
                                  gridLines: {
                                      display: false,
                                      drawBorder: false
                                  },
                                  scaleLabel: {
                                      display: false,
                                      labelString: 'Month'
                                  }
                                      } ],
                              yAxes: [ {
                                  display: true,
                                  gridLines: {
                                      display: false,
                                      drawBorder: false
                                  },
                                  scaleLabel: {
                                      display: true,
                                      labelString: 'Value'
                                  }
                                      } ]
                          },
                          title: {
                              display: false,
                          }
                      }
                  } );


                })(jQuery);

</script>