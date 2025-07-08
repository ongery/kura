<template>
    <!-- Total risk -->
    <div class="col-sm-4 col-xs-12 col-xl-4 mb-5">
        <div class="card">
            <div class="card-title d-flex flex-column">   
                <div class="d-flex align-items-center">
                    <h1  class="fs-4 fw-bold text-hover-success text-gray-600"  style="font-size: 18px;margin-left:25px; margin-top:35px;">Residual Risk Assessment</h1>
                </div>
            </div>

            <div class="card-body pt-2 d-flex align-items-center">
                <div class="w-100">
                    <div class="chart-container" data-kt-size="105" data-kt-line="15">
                        <!-- data-kt-percent="100"> -->
                        <Bar :data="chartData" :options="chartOptions" />
                    </div>
                            
                    <!-- <div v-if="this.totalCalculated >= 10" class="fw-bolder text-gray-800 text-white-500" style="margin-left: -78px; font-size: 40px;" data-kt-countup="true" :data-kt-countup-value="this.totalCalculated">{{
                            this.totalCalculated
                        }}
                    </div>

                    <div v-else class="fw-bolder text-gray-800 text-white-500" style="margin-left: -66px; font-size: 40px;" data-kt-countup="true" :data-kt-countup-value="this.totalCalculated">{{
                        this.totalCalculated 
                    }}</div> -->
                </div>
                <!--end::Chart-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card widget 4-->
    </div>
</template>

<script>
    import { Bar } from 'vue-chartjs';
    import { Chart as ChartJS, Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale } from 'chart.js';
    import {RiskVueEventBus} from '../service/RiskVueEventBus';

    // Register the components you need from chart.js
    ChartJS.register(Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale);

    export default {
        name: 'ResidualRiskAssessment',
        components: {
            Bar,
        },
        props: ['summaryReports', 'totalRiskCal'],
        data() {
            return {
                totalCalculated: '',
                chartData: {
                    labels: ['Test 1', 'Test 2', 'Test 3', 'Test 4', 'Test 5', 'Test 6', 'Test 7'], // Dummy labels
                    datasets: [
                        {
                            label: 'Residual Risk Assessment',
                            backgroundColor: '#0b659a', // Colors will be set dynamically
                            data: [278, 171, 71, 225, 315, 105, 189], // Dummy data
                        },
                    ],
                },
                chartOptions: {
                    indexAxis: 'x',
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                        },
                        x: {
                            beginAtZero: true,
                        },
                    },
                },
            };
        },
        watch: {
            totalCalculated(newVal) {
                console.log("watch >> TotalRisk >> (totalCalculated@TotalRisk): " + newVal);
                this.updateChart(newVal);
            },
        },
        methods: {
            setTotalRiskValFromEmit(data) {
                if (data) {
                    this.chartData.labels = data.labels || [];
                    this.chartData.datasets[0].data = data.values || [];
                    // Generate random colors for each bar
                    this.chartData.datasets[0].backgroundColor = data.labels.map(() => this.getRandomColor());
                }
            },
            getRandomColor() {
                const letters = '0123456789ABCDEF';
                let color = '#';
                for (let i = 0; i < 6; i++) {
                    color += letters[Math.floor(Math.random() * 16)];
                }
                return color;
            },
        },
        created() {
            Fire.$on('totalRiskCalculated', this.setTotalRiskValFromEmit);
        },
        beforeDestroy() {
            // Clean up event listener
            Fire.$off('totalRiskCalculated', this.setTotalRiskValFromEmit);
        },
    };
</script>
<style scoped>
    .chart-container canvas {
        height: 25vh !important;
    }
</style>