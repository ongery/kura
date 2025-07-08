<template>
    <!-- Total risk -->
    <div class="col-sm-4 col-xs-12 col-xl-4 mb-5">
        <div class="card">
            <div class="card-title d-flex flex-column">   
                <div class="d-flex align-items-center">
                    <h1  class="fs-4 fw-bold text-hover-success text-gray-600"  style="font-size: 18px;margin-left:25px; margin-top:35px;">Risk Status </h1>
                </div>
            </div>

            <div class="card-body pt-2 d-flex align-items-center">
                <div class="w-100">
                    <div class="chart-container" data-kt-size="105" data-kt-line="15">
                        <!-- data-kt-percent="100"> -->
                        <PolarArea :data="chartData" :options="chartOptions" />
                    </div>
                </div>
                <!--end::Chart-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card widget 4-->
    </div>
</template>

<script>
    // import { Pie } from 'vue-chartjs'
    import {RiskVueEventBus} from '../service/RiskVueEventBus';
    import { Chart as ChartJS, Title, Tooltip, Legend, RadialLinearScale, ArcElement } from 'chart.js';
    import { PolarArea } from 'vue-chartjs';

    // Register necessary components for Polar Area chart
    ChartJS.register(Title, Tooltip, Legend, RadialLinearScale, ArcElement);

    export default {
        name: 'RiskStatus',
        components: {
            PolarArea,
        },
        data() {
            return {
            chartData: {
                labels: ['Test 1', 'Test 2', 'Test 3', 'Test 4', 'Test 5'],
                datasets: [
                {
                    label: 'Risk Status',
                    backgroundColor: ['#FF6384', '#36A2EB', '#1b832d', '#FFCE56', '#0b659a'],
                    data: [99, 236, 198, 78, 151],
                },
                ],
            },
            chartOptions: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                r: {
                    angleLines: {
                    display: false,
                    },
                    suggestedMin: 0,
                    suggestedMax: 50,
                },
                },
            },
            };
        },
    };
</script>
<style scoped>
    .chart-container canvas {
        height: 25vh !important;
    }
</style>