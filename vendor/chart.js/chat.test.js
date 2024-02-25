const xValues = ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'];
const yValues = [7000, 800, 1000, 9000, 1000, 7000, 800, 1000, 9000, 1000, 10, 1234];

new Chart("myChart", {
  type: "line",
  data: {
    labels: xValues,
    datasets: [{
      fill: true,
      lineTension: 0,
      backgroundColor: "pink",
      borderColor: "blue",
      data: yValues,
      borderWidth: 1
    }]
  },
  options: {
    legend: { display: false },
    scales: {
      xAxes: [{ ticks: { min: 1, max: 12 } }],
      yAxes: [{ ticks: { min: 0, max: 10000 } }],
    }
  }
});




var xValuess = ["khav", "rith", "thida", "laty", "thona"];
var yValuess = [55, 49, 44, 24, 15];
var barColors = [
  "#b91d47",
  "#00aba9",
  "#2b5797",
  "#e8c3b9",
  "#1e7145"
];

new Chart("myPie", {
  type: "doughnut",
  data: {
    labels: xValuess,
    datasets: [{
      backgroundColor: barColors,
      data: yValuess
    }]
  },
  options: {
    title: {
      display: true,
      // text: "World Wide Wine Production 2018"
    }
  }
});
