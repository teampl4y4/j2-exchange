$(function () {
    var data = [

        {label: 'Total', data: [[1,100], [2,100], [3,100], [4,100], [5,100], [6,100], [7,100], [8,100]], color: '#ccc'},
        {label: 'Used', data: [[1,90], [2,30], [3,27], [4,60], [5,80], [6,27], [7,99], [8,1]], color: 'green'}
    ];

    var stack = 0, bars = true, lines = false, steps = false;

    $.plot($("#stackedBar"), data, {
        series: {
            stack: stack,
            lines: { show: lines, fill: true, steps: steps },
            bars: { show: bars, barWidth: 0.6 }
        }
        , yaxis: { min: 0, max: 100 }
        , xaxis: { show: false }
    });
});