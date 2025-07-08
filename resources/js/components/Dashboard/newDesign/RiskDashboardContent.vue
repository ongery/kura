<template>
    <div>
        <div class="row mt-5">
            <div class="col-sm-3 col-xs-12 col-xl-3 mb-5">
                <div class="card">
                    <div class="card-title d-flex flex-column">
                        <h1 class="fw-bold text-hover-success text-gray-600 text-center w-100 mt-10 fs-2hx" style="margin-bottom: 10%;justify-content: center;display: flex;">
                            <span style="border:1px solid rgb(219, 221, 225); border-radius:100%; padding:10%; width:50px; height:50px; border-radius:50%; display:flex; align-items:center; justify-content:center;"> 10 </span>
                        </h1>

                        <h1  class="fs-3 fw-bold text-hover-success text-gray-600 text-center w-100 mb-7"> Total no. of Identified Risk </h1>
                    </div>
                </div>
            </div>

            <div class="col-sm-3 col-xs-12 col-xl-3 mb-5">
                <div class="card">
                    <div class="card-title d-flex flex-column">
                        <h1 class="fw-bold text-hover-success text-gray-600 text-center w-100 mt-10 fs-2hx" style="margin-bottom: 10%;justify-content: center;display: flex;">
                            <span style="border:1px solid rgb(219, 221, 225); border-radius:100%; padding:10%; width:50px; height:50px; border-radius:50%; display:flex; align-items:center; justify-content:center;"> 3 </span>
                        </h1>

                        <h1  class="fs-3 fw-bold text-hover-success text-gray-600 text-center w-100 mb-7"> Total no. of High Risk </h1>
                    </div>
                </div>
            </div>

            <div class="col-sm-3 col-xs-12 col-xl-3 mb-5">
                <div class="card">
                    <div class="card-title d-flex flex-column">
                        <h1 class="fw-bold text-hover-success text-gray-600 text-center w-100 mt-10 fs-2hx" style="margin-bottom: 10%;justify-content: center;display: flex;">
                            <span style="border:1px solid rgb(219, 221, 225); border-radius:100%; padding:10%; width:50px; height:50px; border-radius:50%; display:flex; align-items:center; justify-content:center;"> 2 </span>
                        </h1>

                        <h1  class="fs-3 fw-bold text-hover-success text-gray-600 text-center w-100 mb-7"> Total no. of Medium Risk </h1>
                    </div>
                </div>
            </div>

            <div class="col-sm-3 col-xs-12 col-xl-3 mb-5">
                <div class="card">
                    <div class="card-title d-flex flex-column">
                        <h1 class="fw-bold text-hover-success text-gray-600 text-center w-100 mt-10 fs-2hx" style="margin-bottom: 10%;justify-content: center;display: flex;">
                            <span style="border:1px solid rgb(219, 221, 225); border-radius:100%; padding:10%; width:50px; height:50px; border-radius:50%; display:flex; align-items:center; justify-content:center;"> 5 </span>
                        </h1>

                        <h1  class="fs-3 fw-bold text-hover-success text-gray-600 text-center w-100 mb-7"> Total no. of Low Risk </h1>
                    </div>
                </div>
            </div>

            <!-- <RiskOverview :reports="reports"></RiskOverview> -->
        </div>

        <!-- <RiskOverview :summaryReports="summaryReports" :totalRiskCal="this.totalCalRisk"></RiskOverview> -->
        <div class="col-sm-6 col-xs-12 col-xl-6 mb-5">
            <div class="card">
                <div class="card-body pt-2 d-flex align-items-center">
                    <div class="w-100">
                        <div class="chart-container" data-kt-size="105" data-kt-line="15">
                            <Bar :data="chartData" :options="chartOptions" />
                            <!-- <LineChartComponent :data="chartData" :options="chartOptions" /> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    // BAR CHART FUNCTIONALITY
    import { Bar } from 'vue-chartjs';
    import { Chart as ChartJS, Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale } from 'chart.js';

    ChartJS.register(Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale);

    export default {
        name: 'BarChart',
        components: {
            Bar
        },
        data() {
            return {
                // Data for the bar chart
                chartData: {
                    labels: ['', 'RARE', 'UNLIKELY', 'POSSIBLE', 'LIKELY', 'CERTAINLY'],
                    datasets: [
                        {
                            label: 'Low Count',
                            data: [0, 1, 5, 3, 2, 4], // Low count for each risk level
                            backgroundColor: 'rgba(0, 255, 0, 1)', // Green for Low Count
                            borderColor: 'rgba(0, 255, 0, 1)', // Dark green border
                            borderWidth: 1
                        },
                        {
                            label: 'Medium Count',
                            data: [0, 2, 1, 4, 3, 5], // Medium count for each risk level
                            backgroundColor: 'rgba(255, 255, 0, 1)', // Yellow for Medium Count
                            borderColor: 'rgba(255, 255, 0, 1)', // Dark yellow border
                            borderWidth: 1
                        },
                        {
                            label: 'High Count',
                            data: [0, 2, 1, 5, 3, 4], // High count for each risk level
                            backgroundColor: 'rgba(255, 165, 0, 1)', // Orange for High Count
                            borderColor: 'rgba(255, 165, 0, 1)', // Dark orange border
                            borderWidth: 1
                        },
                        {
                            label: 'Very High Count',
                            data: [0, 3, 2, 1, 4, 5], // High count for each risk level
                            backgroundColor: 'rgba(255, 0, 0, 1)', // Red for High Count
                            borderColor: 'rgba(255, 0, 0, 1)', // Dark red border
                            borderWidth: 1
                        }
                    ]
                },
                // Options for the bar chart
                chartOptions: {
                    indexAxis: 'y',
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        },
                        x: {
                            stacked: true
                        }
                    }
                }
            }
        }
    }

    // LINE CHANGE FUNCTIONALITY
    /*import { Line as LineChartComponent } from 'vue-chartjs';
    import { Chart as ChartJS, Title, Tooltip, Legend, LineElement, CategoryScale, LinearScale, PointElement } from 'chart.js';

    // Register necessary elements for the chart
    ChartJS.register(Title, Tooltip, Legend, LineElement, CategoryScale, LinearScale, PointElement);

    export default {
        name: 'RiskDashboard',
        components: {
            LineChartComponent // Renamed component
        },
        data() {
            return {
            // Data for the line chart
                chartData: {
                    labels: ['', 'RARE', 'UNLIKELY', 'POSSIBLE', 'LIKELY', 'CERTAINLY'], // X-axis labels
                    datasets: [
                        {
                            label: 'Low Count',
                            data: [0, 1, 5, 2, 4, 3], // Low count for each risk level
                            backgroundColor: 'rgba(0, 255, 0, 1)', // Green for Low Count
                            borderColor: 'rgba(0, 255, 0, 1)', // Dark green border
                            borderWidth: 1,
                            fill: false, // Do not fill area under the line
                            tension: 0.4, // Smooth the line
                            pointRadius: 5 // Optional: adjust the size of the points on the line
                        },
                        {
                            label: 'Medium Count',
                            data: [0, 2, 4, 1, 3, 5], // Medium count for each risk level
                            backgroundColor: 'rgba(255, 255, 0, 1)', // Yellow for Medium Count
                            borderColor: 'rgba(255, 255, 0, 1)', // Dark yellow border
                            borderWidth: 1,
                            fill: false, // Do not fill area under the line
                            tension: 0.4, // Smooth the line
                            pointRadius: 5 // Optional: adjust the size of the points on the line
                        },
                        {
                            label: 'High Count',
                            data: [0, 3, 1, 0, 3, 4], // High count for each risk level
                            backgroundColor: 'rgba(255, 165, 0, 1)', // Orange for High Count
                            borderColor: 'rgba(255, 165, 0, 1)', // Dark orange border
                            borderWidth: 1,
                            fill: false, // Do not fill area under the line
                            tension: 0.4, // Smooth the line
                            pointRadius: 5 // Optional: adjust the size of the points on the line
                        },
                        {
                            label: 'Very High Count',
                            data: [0, 4, 3, 4, 4, 2], // High count for each risk level
                            backgroundColor: 'rgba(255, 0, 0, 1)', // Red for High Count
                            borderColor: 'rgba(255, 0, 0, 1)', // Dark red border
                            borderWidth: 1,
                            fill: false, // Do not fill area under the line
                            tension: 0.4, // Smooth the line
                            pointRadius: 5 // Optional: adjust the size of the points on the line
                        }
                    ]
                },
                // Options for the line chart
                chartOptions: {
                    indexAxis: 'x',
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top'
                        },
                        tooltip: {
                            mode: 'index',
                            intersect: false
                        }
                    },
                    scales: {
                        x: {
                            beginAtZero: true
                        },
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            };
        }
    }*/
</script>

<style scoped>
/* Style for the chart container */
.chart-container canvas {
    height: 40vh !important;
}
</style>