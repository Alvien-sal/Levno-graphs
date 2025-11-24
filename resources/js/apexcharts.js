import ApexCharts from "apexcharts";

window.renderApexChart = function (chartId, options) {
    const chart = new ApexCharts(document.querySelector("#" + chartId), options);
    chart.render();
}
