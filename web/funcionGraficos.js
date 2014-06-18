function generarGraficoTE(labora , tiempo, tiempoAn, tiempoIn){
var categories = labora.split(" ");
var tiem=tiempo.split(" ");
// palabras = ["Hola", "Mundo,", "soy", "una", "cadena", "de", "texto!"];
//var categories = [ palabras[1], 'Firefox', 'Chrome', 'Safari', 'opera' ];
var name='Laboratorios';
var data=[];
for (var i = 0; i < tiem.length; i++) {
    res=parseFloat(tiem[i]);
    data[i]=res;
};

 
var colors = Highcharts.getOptions().colors, categories, name, data;
            

        var chart = $('#container-1').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'Tiempo de envio'
            },
 
            xAxis: {
                categories: categories
            },
            yAxis: {
                title: {
                    text: 'Dias'
                }
            },
            plotOptions: {
                column: {
                    cursor: 'pointer',
                    point: {
                        events: {
                            click: function() {
                                var drilldown = this.drilldown;
                                if (drilldown) { // drill down
                                    setChart(drilldown.name, drilldown.categories, drilldown.data, drilldown.color);
                                } else { // restore
                                    setChart(name, categories, data);
                                }
                            }
                        }
                    },
                    dataLabels: {
                        enabled: true,
                        color: colors[3],
                        x: 4,
                        y: 10,
                        style: {
                            fontWeight: 'bold'
                        },
                        formatter: function() {
                            return this.y +'%';
                        }
                    }
                }
            },
            
            series: [{
                name: name,
                data: data,
                color: '#2E64FE'
            }]
        });
//tiempo de analisis
var tiem2=tiempoAn.split(" ");
var data2=[];
for (var i = 0; i < tiem2.length; i++) {
    res=parseFloat(tiem2[i]);
    data2[i]=res;
};
var colors = Highcharts.getOptions().colors, categories, name, data2;
        var chart = $('#container-2').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'Tiempo de Analisis'
            },
 
            xAxis: {
                categories: categories
            },
            yAxis: {
                title: {
                    text: 'Dias'
                }
            },
            plotOptions: {
                column: {
                    cursor: 'pointer',
                    point: {
                        events: {
                            click: function() {
                                var drilldown = this.drilldown;
                                if (drilldown) { // drill down
                                    setChart(drilldown.name, drilldown.categories, drilldown.data, drilldown.color);
                                } else { // restore
                                    setChart(name, categories, data2);
                                }
                            }
                        }
                    },
                    dataLabels: {
                        enabled: true,
                        color: colors[3],
                        x: 4,
                        y: 10,
                        style: {
                            fontWeight: 'bold'
                        },
                        formatter: function() {
                            return this.y +'%';
                        }
                    }
                }
            },
            
            series: [{
                name: name,
                data: data2,
                color: '#2E64FE'
            }]
        });
//tiempo de ingreso
var tiem3=tiempoIn.split(" ");
var data3=[];
for (var i = 0; i < tiem3.length; i++) {
    res=parseFloat(tiem3[i]);
    data3[i]=res;
};
var colors = Highcharts.getOptions().colors, categories, name, data3;
        var chart = $('#container-3').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'Tiempo de ingreso'
            },
 
            xAxis: {
                categories: categories
            },
            yAxis: {
                title: {
                    text: 'Dias'
                }
            },
            plotOptions: {
                column: {
                    cursor: 'pointer',
                    point: {
                        events: {
                            click: function() {
                                var drilldown = this.drilldown;
                                if (drilldown) { // drill down
                                    setChart(drilldown.name, drilldown.categories, drilldown.data, drilldown.color);
                                } else { // restore
                                    setChart(name, categories, data3);
                                }
                            }
                        }
                    },
                    dataLabels: {
                        enabled: true,
                        color: colors[3],
                        x: 4,
                        y: 10,
                        style: {
                            fontWeight: 'bold'
                        },
                        formatter: function() {
                            return this.y +'%';
                        }
                    }
                }
            },
            
            series: [{
                name: name,
                data: data3,
                color: '#2E64FE'
            }]
        })

        
}