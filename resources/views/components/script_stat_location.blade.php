<script>

(function(jQuery) {
    
    var total_loc_regency   = [];
    var total_loc_district  = [];
    var name_loc_regency    = [];
    var name_loc_district   = [];

    @if ( $top_regency != null )
        total_loc_regency[0] = '{{ $top_regency[0]->total }}';
        total_loc_regency[1] = '{{ $top_regency[1]->total }}';
        total_loc_regency[2] = '{{ $top_regency[2]->total }}';
        total_loc_regency[3] = '{{ $top_regency[3]->total }}';
        total_loc_regency[4] = '{{ $top_regency[4]->total }}';
        
        name_loc_regency[0] = '{{ $top_regency[0]->regency }}';
        name_loc_regency[1] = '{{ $top_regency[1]->regency }}';
        name_loc_regency[2] = '{{ $top_regency[2]->regency }}';
        name_loc_regency[3] = '{{ $top_regency[3]->regency }}';
        name_loc_regency[4] = '{{ $top_regency[4]->regency }}';
    @else
        for (let index = 0; index <= 4; index++) {total_loc_regency [index] = 0;name_loc_regency[index] = '';}
    @endif


    @if ( $top_district != [] )
        total_loc_district[0] = '{{ $top_district[0]->total }}';
        total_loc_district[1] = '{{ $top_district[1]->total }}';
        total_loc_district[2] = '{{ $top_district[2]->total }}';
        total_loc_district[3] = '{{ $top_district[3]->total }}';
        total_loc_district[4] = '{{ $top_district[4]->total }}';
        
        name_loc_district[0] = '{{ $top_district[0]->regency }}';
        name_loc_district[1] = '{{ $top_district[1]->regency }}';
        name_loc_district[2] = '{{ $top_district[2]->regency }}';
        name_loc_district[3] = '{{ $top_district[3]->regency }}';
        name_loc_district[4] = '{{ $top_district[4]->regency }}';
    @else
        for (let index = 0; index <= 4; index++) { total_loc_district [index]=0; name_loc_district[index]='' ; }
    @endif

                  

                var ctx = document.getElementById( "team-chart" );
                  ctx.height = 150;
                  var myChart = new Chart( ctx, {
                      type: 'line',
                      data: {
                          labels: [name_loc_regency[0], name_loc_regency[1], name_loc_regency[2], name_loc_regency[3], name_loc_regency[4]],
                          type: 'line',
                          defaultFontFamily: 'Montserrat',
                          datasets: [ {
                              data: [total_loc_regency[0], total_loc_regency[1], total_loc_regency[2], total_loc_regency[3], total_loc_regency[4]],
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

                //    

                var ctx = document.getElementById( "team-chart" );
                  ctx.height = 150;
                  var myChart = new Chart( ctx, {
                      type: 'line',
                      data: {
                          labels: [name_loc_regency[0], name_loc_regency[1], name_loc_regency[2], name_loc_regency[3], name_loc_regency[4]],
                          type: 'line',
                          defaultFontFamily: 'Montserrat',
                          datasets: [ {
                              data: [total_loc_regency[0], total_loc_regency[1], total_loc_regency[2], total_loc_regency[3], total_loc_regency[4]],
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
                          labels: [name_loc_district[0], name_loc_district[1], name_loc_district[2], name_loc_district[3], name_loc_district[4]],
                          type: 'line',
                          defaultFontFamily: 'Montserrat',
                          datasets: [ {
                              data: [total_loc_district[0], total_loc_district[1], total_loc_district[2], total_loc_district[3], total_loc_district[4]],
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