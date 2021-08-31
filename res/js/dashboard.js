const config = {
    type: 'line',
    data,
    options: {
        legend: {
            display: false
        },
        tooltips: {
            callbacks: {
                label: function (tooltipItem) {
                    return tooltipItem.yLabel;
                }
            }
        },
        aspectRatio: 2,
        responsive: true,
        pointRadius: 5,
        pointHoverRadius: 5,
        color: '#313486',
    }
};

var myChart = new Chart(
    document.getElementById('myChart'),
    config
);