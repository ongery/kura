<template>
    <!-- Total risk -->
    <div class="col-sm-4 col-xs-12 col-xl-4 mb-5">
        <div class="card">
            <div class="card-title d-flex flex-column">   
                <div class="d-flex align-items-center">
                    <h1  class="fs-4 fw-bold text-hover-success text-gray-600"  style="font-size: 18px;margin-left:25px; margin-top:35px;">Risk Events</h1>
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
        name: 'RiskEvents',
        components: {
            Bar,
        },
        data() {
            return {
                chartKey: 0,  // Add a key for forcing re-render
                RELabels: [],
                REDatas: [],
                REBgColors: [],
                
                chartData: {
                    labels: [],
                    datasets: [
                        {
                            label: 'Risk Events',
                            backgroundColor: [],
                            data: [],
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
            loadREVisualization() {
                const token = this.getAuthToken()
                axios.get('/api/visualization/risk-events', {
                    withCredentials: true,
                    headers: {
                        Authorization: `Bearer ${token}`
                    }
                })
                .then(res => {
                    if (res.data.ResultCode == 1200) {
                        const graphData = res.data.ResponseData;
                        this.RELabels = graphData.labels;
                        this.REDatas = graphData.datas;
                        this.REBgColors = graphData.bgColors;

                        // Update chartData to reflect the dynamic values
                        this.chartData.labels = this.RELabels;
                        this.chartData.datasets[0].data = this.REDatas;
                        this.chartData.datasets[0].backgroundColor = this.REBgColors;
                        this.chartData.datasets[0].borderColor = this.REBgColors;
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
            },
        },
        created() {
            this.loadREVisualization();
        },
    };
</script>
<style scoped>
    .chart-container canvas {
        height: 25vh !important;
    }
</style>