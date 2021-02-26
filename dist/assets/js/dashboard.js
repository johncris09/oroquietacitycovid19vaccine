"use strict";
const primary = '#6993FF';
const success = '#1BC5BD';
const info    = '#8950FC';
const warning = '#FFA800';
const danger  = '#F64E60';
var options, chart;

// Class definition
var RecordChart = function () {
    var _init = function () {

        const apexChart = "#record-chart"; 

        $(document).on('click', '.filter-by', function(e){
            e.preventDefault();
            // console.info(1)
            $('#record-chart').html('')
            record_chart($(this).data('fileterBy')); 
        })

        $(document).on('submit', 'form#record-date-range-form', function(e){
            e.preventDefault();
            $('#record-chart').html('')

            var data_range = $(this).serializeArray();
            var arr        = [];
            $(data_range).each(function () {
                arr.push(this.value)
            })
            
            record_chart(arr);  
        })

        $(document).on('click', '#reset', function(e){

            $('#record-chart').html('')
            var data_range = $('form#record-date-range-form input');
            $(data_range).each(function () {
                $(this).val('')
            })

            record_chart();
        })

        


        function record_chart(filter_by = 'this month'){
            $.ajax({
                url   : BASE_URL + 'dashboard/record_chart',
                method  : 'post',
                dataType: "json",
                data    : {
                    filter_by: filter_by
                },
                beforeSend: function () {
                    KTApp.block('#record-chart', {
                        overlayColor: '#000000',
                        state       : 'primary',
                        message     : 'Processing...'
                    });
                },
                complete: function () {
                    KTApp.unblock('#record-chart');
                },
                success: function (data) {
                    console.info(data)
                    $('#range').html(data.range);
                    var options = {
                        series: [
                            {
                                name: 'Record',
                                data: data.data
                            }
                        ],
                        chart: {
                            type  : 'bar',
                            height: 400
                        },
                        plotOptions: {
                            bar: {
                                horizontal : false,
                                columnWidth: '55%',
                                endingShape: 'rounded'
                            },
                        },
                        dataLabels: {
                            enabled: false
                        },
                        stroke: {
                            show  : true,
                            width : 2,
                            colors: ['transparent']
                        },
                        xaxis: {
                            categories: data.categories
                        },
                        title: {
                            text : data.range,
                            align: 'center',
                            // offsetX: 110
                        },
                        yaxis: {
                            title: {
                                text: "# of Record"
                            }
                        },
                        fill: {
                            opacity: 1
                        },
                        tooltip: {
                            y: {
                                formatter: function (val) {
                                    return val
                                }
                            }
                        },
                        colors: [warning, success ,primary]
                    };

                    var chart = new ApexCharts(document.querySelector(apexChart), options);
                    chart.render();
                },
                error: function (xhr, status, error) {
                    // error here...   
                    console.info(xhr.responseText);
                }
            });
        }

        record_chart();
        

    };

    return {
        // Init
        init: function () {
            _init();
        },
    };
}();


var GenderStatistic = function () {
    var _init = function () {
        const apexChart = "#gender-statistic";
        

        $.ajax({
                url   : BASE_URL + 'dashboard/gender_statistic',
                method  : 'post',
                dataType: "json",
                beforeSend: function () {
                    KTApp.block('#gender-statistic', {
                        overlayColor: '#000000',
                        state       : 'primary',
                        message     : 'Processing...'
                    });
                },
                complete: function () {
                    KTApp.unblock('#gender-statistic');
                },
                success: function (data) {
                    console.info(data)
                    var options = {
                        series: data.data,
                        chart: {
                            width: 400,
                            type: 'pie',
                        },
                        labels: ['Male', 'Female'],
                        responsive: [{
                            breakpoint: 480,
                            options: {
                                chart: {
                                    width: 200
                                },
                                legend: {
                                    position: 'bottom'
                                }
                            }
                        }],
                        colors: [success, info]
                    };

                    var chart = new ApexCharts(document.querySelector(apexChart), options);
                    chart.render();

                },
                error: function (xhr, status, error) {
                    // error here...   
                    console.info(xhr.responseText);
                    
                }
            });

        

    };

    return {
        // Init
        init: function () {
            _init();
        },
    };
}();


var AgeStatistic = function () {
    var _init = function () {
        const apexChart = "#age-statistic";
        

        $.ajax({
                url   : BASE_URL + 'dashboard/age_statistic',
                method  : 'post',
                dataType: "json",
                beforeSend: function () {
                    KTApp.block('#age-statistic', {
                        overlayColor: '#000000',
                        state       : 'primary',
                        message     : 'Processing...'
                    });
                },
                complete: function () {
                    KTApp.unblock('#age-statistic');
                },
                success: function (data) {
                    var options = {
                        series: data.data,
                        chart: {
                            width: 400,
                            type: 'pie',
                        },
                        labels: ['18 - 25 yrs. old', '26 - 35 yrs. old', '36 - 59 yrs. old', '60 yrs. old Above'],
                        responsive: [{
                            breakpoint: 400,
                            options: {
                                chart: {
                                    width: 200
                                },
                                legend: {
                                    position: 'bottom'
                                }
                            }
                        }],
                        colors: [primary, warning, danger, info]
                    };

                    var chart = new ApexCharts(document.querySelector(apexChart), options);
                    chart.render();

                },
                error: function (xhr, status, error) {
                    // error here...   
                    console.info(xhr.responseText);
                    
                }
            });

        

    };

    return {
        // Init
        init: function () {
            _init();
        },
    };
}();



// Class Initialization
jQuery(document).ready(function () {
    RecordChart.init();
    GenderStatistic.init();
    AgeStatistic.init();

});
