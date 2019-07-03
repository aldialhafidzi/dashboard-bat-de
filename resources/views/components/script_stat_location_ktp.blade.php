<script>
    (function(jQuery) {


    var total_district = [];
        total_district[0] = '{{ $top_district[0]['count'] }}';
        total_district[1] = '{{ $top_district[1]['count'] }}';
        total_district[2] = '{{ $top_district[2]['count'] }}';
        total_district[3] = '{{ $top_district[3]['count'] }}';
        total_district[4] = '{{ $top_district[4]['count'] }}';
    
    var name_district   = [];
        name_district[0] = '{{ $top_district[0]['name'] }}';
        name_district[1] = '{{ $top_district[1]['name'] }}';
        name_district[2] = '{{ $top_district[2]['name'] }}';
        name_district[3] = '{{ $top_district[3]['name'] }}';
        name_district[4] = '{{ $top_district[4]['name'] }}';
        

                var ctx = document.getElementById( "team-chart-consumer-location-ktp" );
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