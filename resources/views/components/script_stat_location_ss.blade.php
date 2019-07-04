<script>
    (function(jQuery) {
        var total_regency = [];
        var name_regency   = [];

        @if ( $data_chart != null || $data_chart != '')
            total_regency[0] = '{{ $data_chart[0]->total }}';
            total_regency[1] = '{{ $data_chart[1]->total }}';
            total_regency[2] = '{{ $data_chart[2]->total }}';
            total_regency[3] = '{{ $data_chart[3]->total }}';
            total_regency[4] = '{{ $data_chart[4]->total }}';

            name_regency[0] = '{{ $data_chart[0]->regency }}';
            name_regency[1] = '{{ $data_chart[1]->regency }}';
            name_regency[2] = '{{ $data_chart[2]->regency }}';
            name_regency[3] = '{{ $data_chart[3]->regency }}';
            name_regency[4] = '{{ $data_chart[4]->regency }}';
        @else
            for (let index = 0; index <= 4; index++) {total_regency [index]=0;name_regency[index]='' ;}
        @endif
    
                var ctx = document.getElementById( "team-chart-consumer-location-ss" );
                  ctx.height = 150;
                  var myChart = new Chart( ctx, {
                      type: 'line',
                      data: {
                          labels: [name_regency[0], name_regency[1], name_regency[2], name_regency[3], name_regency[4]],
                          type: 'line',
                          defaultFontFamily: 'Montserrat',
                          datasets: [ {
                              data: [total_regency[0], total_regency[1], total_regency[2], total_regency[3], total_regency[4]],
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


                  var ctx = document.getElementById( "team-chart-consumer-location-ss-district" );
                  ctx.height = 150;
                  var myChart = new Chart( ctx, {
                      type: 'line',
                      data: {
                          labels: [name_regency[0], name_regency[1], name_regency[2], name_regency[3], name_regency[4]],
                          type: 'line',
                          defaultFontFamily: 'Montserrat',
                          datasets: [ {
                              data: [total_regency[0], total_regency[1], total_regency[2], total_regency[3], total_regency[4]],
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