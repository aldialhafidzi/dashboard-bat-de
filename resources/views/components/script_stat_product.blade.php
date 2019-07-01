<script>
(function(jQuery) {

                    var data_Pr_name = [];
                    data_Pr_name[0] = '{{ $products[0]->product->p_name }}';
                    data_Pr_name[1] = '{{ $products[1]->product->p_name }}';
                    data_Pr_name[2] = '{{ $products[2]->product->p_name }}';
                    data_Pr_name[3] = '{{ $products[3]->product->p_name }}';
                    data_Pr_name[4] = '{{ $products[4]->product->p_name }}';

                    var data_countPr = [];
                    data_countPr[0] = '{{ $products[0]->jumlah }}';
                    data_countPr[1] = '{{ $products[1]->jumlah }}';
                    data_countPr[2] = '{{ $products[2]->jumlah }}';
                    data_countPr[3] = '{{ $products[3]->jumlah }}';
                    data_countPr[4] = '{{ $products[4]->jumlah }}';

                  var ctx = document.getElementById( "team-chart-product-type" );
                    ctx.height = 200;
                    var myChart = new Chart( ctx, {
                        type: 'line',
                        data: {
                            labels: [data_Pr_name[0], data_Pr_name[1], data_Pr_name[2], data_Pr_name[3], data_Pr_name[4]],
                            type: 'line',
                            defaultFontFamily: 'Montserrat',
                            datasets: [ {
                                data: [data_countPr[0], data_countPr[1], data_countPr[2], data_countPr[3], data_countPr[4]],
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