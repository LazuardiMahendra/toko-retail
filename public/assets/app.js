$(document).ready( function(){
    $.ajax({
            url     : "/api/manager/laporan-pendapatan",
            type    : "GET",
            dataType: "JSON",
            success : function(result){
                // console.log(result);
                var data =[];
                data =  result;
                        for(var i=0; i<result.length; i++){
                            data[i] = parseInt(result[i]['total']);
                        }
                        console.log(data);
                if($('#grafik-pendapatan').length){
                    var date = new Date();
                    Highcharts.chart('grafik-pendapatan',{
                        chart:{
                            type: 'column'
                        },
                        title:{
                            text: 'Grafik Pendapatan' + date.getFullYear()
                        },
                        subtitle:{
                            text: 'laracms'
                        },
                        xAxis:{
                            categories:[
                                'Jan', 'Feb', 'Mar', 'April', 'May', 'Jun', 'Jul', 'Aug', 'Sept', 'Oct', 'Nov', 'Des'
                            ],
                            crosshair:true
                        },
                        yAxis:{
                            min: 0,
                            title: {
                                text: 'Jumlah Pendapatan'
                            }
                        },
                        plotOptions:{
                            column : {
                                pointPadding: 0.2,
                                borderWidht: 0
                            }
                        },
                        series:[
                            {
                                name: 'Pendapatan',
                                data: data
                            }
                        ]
                    })
                }
            }
        });
})