<template>
    <!-- Total risk -->
    <div class="col-sm-6 col-xs-12 col-xl-6 mb-5">
        <div class="card">
            <div class="card-title d-flex flex-column">   
                <div class="d-flex align-items-center">
                    <h1  class="fs-4 fw-bold text-hover-success text-gray-600"  style="font-size: 18px;margin-left:25px; margin-top:35px;">Key Risk Indicators</h1>
                </div>
            </div>

            <div class="card-body pt-2 d-flex align-items-center">
                <div class="w-100">
                    <div class="chart-container" data-kt-size="105" data-kt-line="15">
                        <!-- data-kt-percent="100"> -->
                        <Bar :data="chartData" :options="chartOptions" :key="chartKey" />
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
    import { Bar } from 'vue-chartjs';
    import { Chart as ChartJS, Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale } from 'chart.js';

    // Register the components you need from chart.js
    ChartJS.register(Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale);

    export default {
        name: 'KeyRiskIndicators',
        components: {
            Bar,
        },
        data() {
            return {
                chartKey: 0,  // Add a key for forcing re-render
                kRILabels: [],
                kRIDatas: [],
                kRIBgColors: [],

                chartData: {
                    labels: [], // These will be set dynamically
                    datasets: [
                        {
                            label: 'Key Risk Indicators',
                            backgroundColor: [],
                            data: [], // This will be set dynamically
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
        methods: {
            getAuthToken() { return localStorage.getItem('authToken') },
            loadKRIVisualization() {
                const token = this.getAuthToken()
                axios.get('/api/visualization/kri', {
                    withCredentials: true,
                    headers: {
                        Authorization: `Bearer ${token}`
                    }
                })
                .then(res => {
                    if (res.data.ResultCode == 1200) {
                        const graphData = res.data.ResponseData;
                        this.kRILabels = graphData.labels;
                        this.kRIDatas = graphData.datas;
                        this.kRIBgColors = graphData.bgColors;

                        // Update chartData to reflect the dynamic values
                        this.chartData.labels = this.kRILabels;
                        this.chartData.datasets[0].data = this.kRIDatas;
                        this.chartData.datasets[0].backgroundColor = this.kRIBgColors;
                        this.chartKey += 1;
                    } else {
                        toast.fire({
                            type: 'error',
                            title: res.data.ResultDesc
                        })
                    }
                })
                .catch(e => {
                    this.$Progress.fail()
                    toast.fire({
                        type: 'error',
                        title: 'Operation not successfull' + '\n' + e.response.data.message
                    })
                })
            }
        },
        created() {
            this.loadKRIVisualization(); 
        },
    };
</script>
<style scoped>
    .chart-container canvas {
        height: 40vh !important;
    }
</style>