<script>
( function ( $ ) {
    "use strict";

    // Counter Number
    $('.count').each(function () {
        $(this).prop('Counter',0).animate({
            Counter: $(this).text()
        }, {
            duration: 3000,
            easing: 'swing',
            step: function (now) {
                $(this).text(Math.ceil(now));
            }
        });
    });

    var data_total_cust = [];
    data_total_cust[0] = '{{ $top_5_dashboard[0]->total_customer }}';
    data_total_cust[1] = '{{ $top_5_dashboard[1]->total_customer }}';
    data_total_cust[2] = '{{ $top_5_dashboard[2]->total_customer }}';
    data_total_cust[3] = '{{ $top_5_dashboard[3]->total_customer }}';
    data_total_cust[4] = '{{ $top_5_dashboard[4]->total_customer }}';

    var data_newCust = [];
    data_newCust[0] = '{{ $top_5_dashboard[0]->new_customer }}';
    data_newCust[1] = '{{ $top_5_dashboard[1]->new_customer }}';
    data_newCust[2] = '{{ $top_5_dashboard[2]->new_customer }}';
    data_newCust[3] = '{{ $top_5_dashboard[3]->new_customer }}';
    data_newCust[4] = '{{ $top_5_dashboard[4]->new_customer }}';

    var data_male_cust = [];
    data_male_cust[0] = '{{ $top_5_dashboard[0]->male_customer }}';
    data_male_cust[1] = '{{ $top_5_dashboard[1]->male_customer }}';
    data_male_cust[2] = '{{ $top_5_dashboard[2]->male_customer }}';
    data_male_cust[3] = '{{ $top_5_dashboard[3]->male_customer }}';
    data_male_cust[4] = '{{ $top_5_dashboard[4]->male_customer }}';

    var data_female_cust = [];
    data_female_cust[0] = '{{ $top_5_dashboard[0]->female_customer }}';
    data_female_cust[1] = '{{ $top_5_dashboard[1]->female_customer }}';
    data_female_cust[2] = '{{ $top_5_dashboard[2]->female_customer }}';
    data_female_cust[3] = '{{ $top_5_dashboard[3]->female_customer }}';
    data_female_cust[4] = '{{ $top_5_dashboard[4]->female_customer }}';

    var dataCreated_at = [];
    dataCreated_at[0] = '{{ $top_5_dashboard[0]->created_at }}';
    dataCreated_at[1] = '{{ $top_5_dashboard[1]->created_at }}';
    dataCreated_at[2] = '{{ $top_5_dashboard[2]->created_at }}';
    dataCreated_at[3] = '{{ $top_5_dashboard[3]->created_at }}';
    dataCreated_at[4] = '{{ $top_5_dashboard[4]->created_at }}';

    //WidgetChart 1
    var ctx = document.getElementById( "widgetChart1" );
    ctx.height = 150;
    var myChart = new Chart( ctx, {
        type: 'line',
        data: {
            labels: [dataCreated_at[0], dataCreated_at[1], dataCreated_at[2], dataCreated_at[3], dataCreated_at[4]],
            type: 'line',
            datasets: [ {
                data: [data_total_cust[0], data_total_cust[1], data_total_cust[2], data_total_cust[3], data_total_cust[4]],
                label: 'Dataset',
                backgroundColor: 'transparent',
                borderColor: 'rgba(255,255,255,.55)',
            }, ]
        },
        options: {

            maintainAspectRatio: false,
            legend: {
                display: false
            },
            responsive: true,
            scales: {
                xAxes: [ {
                    gridLines: {
                        color: 'transparent',
                        zeroLineColor: 'transparent'
                    },
                    ticks: {
                        fontSize: 2,
                        fontColor: 'transparent'
                    }
                } ],
                yAxes: [ {
                    display:false,
                    ticks: {
                        display: false,
                    }
                } ]
            },
            title: {
                display: false,
            },
            elements: {
                line: {
                    borderWidth: 1
                },
                point: {
                    radius: 4,
                    hitRadius: 10,
                    hoverRadius: 4
                }
            }
        }
    } );


    //WidgetChart 2
    var ctx = document.getElementById( "widgetChart2" );
    ctx.height = 150;
    var myChart = new Chart( ctx, {
        type: 'line',
        data: {
            labels: [dataCreated_at[0], dataCreated_at[1], dataCreated_at[2], dataCreated_at[3], dataCreated_at[4]],
            type: 'line',
            datasets: [ {
                data: [data_male_cust[0], data_male_cust[1], data_male_cust[2], data_male_cust[3], data_male_cust[4]],
                label: 'Dataset',
                backgroundColor: '#63c2de',
                borderColor: 'rgba(255,255,255,.55)',
            }, ]
        },
        options: {

            maintainAspectRatio: false,
            legend: {
                display: false
            },
            responsive: true,
            scales: {
                xAxes: [ {
                    gridLines: {
                        color: 'transparent',
                        zeroLineColor: 'transparent'
                    },
                    ticks: {
                        fontSize: 2,
                        fontColor: 'transparent'
                    }
                } ],
                yAxes: [ {
                    display:false,
                    ticks: {
                        display: false,
                    }
                } ]
            },
            title: {
                display: false,
            },
            elements: {
                line: {
                    tension: 0.00001,
                    borderWidth: 1
                },
                point: {
                    radius: 4,
                    hitRadius: 10,
                    hoverRadius: 4
                }
            }
        }
    } );



    //WidgetChart 3
    var ctx = document.getElementById( "widgetChart3" );
    ctx.height = 70;
    var myChart = new Chart( ctx, {
        type: 'line',
        data: {
            labels: [dataCreated_at[0], dataCreated_at[1], dataCreated_at[2], dataCreated_at[3], dataCreated_at[4]],
            type: 'line',
            datasets: [ {
                data: [data_female_cust[0], data_female_cust[1], data_female_cust[2], data_female_cust[3], data_female_cust[4]],
                label: 'Dataset',
                backgroundColor: 'rgba(255,255,255,.2)',
                borderColor: 'rgba(255,255,255,.55)',
            }, ]
        },
        options: {

            maintainAspectRatio: true,
            legend: {
                display: false
            },
            responsive: true,
            scales: {
                xAxes: [ {
                    gridLines: {
                        color: 'transparent',
                        zeroLineColor: 'transparent'
                    },
                    ticks: {
                        fontSize: 2,
                        fontColor: 'transparent'
                    }
                } ],
                yAxes: [ {
                    display:false,
                    ticks: {
                        display: false,
                    }
                } ]
            },
            title: {
                display: false,
            },
            elements: {
                line: {
                    borderWidth: 2
                },
                point: {
                    radius: 0,
                    hitRadius: 10,
                    hoverRadius: 4
                }
            }
        }
    } );


    

    //WidgetChart 4
    var ctx = document.getElementById( "widgetChart4" );
    ctx.height = 70;
    var myChart = new Chart( ctx, {
        type: 'bar',
        data: {
            labels: [dataCreated_at[0], dataCreated_at[1], dataCreated_at[2], dataCreated_at[3], dataCreated_at[4]],
            datasets: [
                {
                    label: "My First dataset",
                    data: [data_newCust[0], data_newCust[1], data_newCust[2], data_newCust[3], data_newCust[4]],
                    borderColor: "rgba(0, 123, 255, 0.9)",
                    //borderWidth: "0",
                    backgroundColor: "rgba(255,255,255,.3)"
                }
            ]
        },
        options: {
              maintainAspectRatio: true,
              legend: {
                display: false
            },
            scales: {
                xAxes: [{
                  display: false,
                  categoryPercentage: 1,
                  barPercentage: 0.5
                }],
                yAxes: [ {
                    display: false
                } ]
            }
        }
    } );


    var ctx = document.getElementById( "doughutChart" );
            ctx.height = 150;
            var myChart = new Chart( ctx, {
                type: 'doughnut',
                data: {
                    datasets: [ {
                        data: [80, 20 ],
                        backgroundColor: [
                                            "rgba(99, 193, 222, 0.973)",
                                            "rgba(248, 107, 107, 0.979)"
                                        ],
                        hoverBackgroundColor: [
                                            "rgba(99, 193, 222, 0.7)",
                                            "rgba(248, 107, 107, 0.7)"
                                        ]

                                    } ],
                    labels: [
                                    "Male",
                                    "Female"
                                ]
                },
                options: {
                    responsive: true
                }
            } );

} )( jQuery );
</script>