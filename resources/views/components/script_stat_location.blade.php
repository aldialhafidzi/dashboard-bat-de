<script>

(function(jQuery) {

                    var total_loc = [];
                    total_loc[0] = '{{ $top_5_location[0]->total }}';
                    total_loc[1] = '{{ $top_5_location[1]->total }}';
                    total_loc[2] = '{{ $top_5_location[2]->total }}';
                    total_loc[3] = '{{ $top_5_location[3]->total }}';
                    total_loc[4] = '{{ $top_5_location[4]->total }}';

                    var name_loc = [];
                    name_loc[0] = '{{ $top_5_location[0]->regency }}';
                    name_loc[1] = '{{ $top_5_location[1]->regency }}';
                    name_loc[2] = '{{ $top_5_location[2]->regency }}';
                    name_loc[3] = '{{ $top_5_location[3]->regency }}';
                    name_loc[4] = '{{ $top_5_location[4]->regency }}';

                var ctx = document.getElementById( "team-chart" );
                  ctx.height = 150;
                  var myChart = new Chart( ctx, {
                      type: 'line',
                      data: {
                          labels: [name_loc[0], name_loc[1], name_loc[2], name_loc[3], name_loc[4]],
                          type: 'line',
                          defaultFontFamily: 'Montserrat',
                          datasets: [ {
                              data: [total_loc[0], total_loc[1], total_loc[2], total_loc[3], total_loc[4]],
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


                  

                  var ctx = document.getElementById( "team-chart-2" );
                  ctx.height = 150;
                  var myChart = new Chart( ctx, {
                      type: 'line',
                      data: {
                          labels: [name_loc[0], name_loc[1], name_loc[2], name_loc[3], name_loc[4]],
                          type: 'line',
                          defaultFontFamily: 'Montserrat',
                          datasets: [ {
                              data: [total_loc[0], total_loc[1], total_loc[2], total_loc[3], total_loc[4]],
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