<template>
    <!-- Total risk -->
    <div class="col-sm-6 col-xs-12 col-xl-6 mb-5">
        <div class="card">
            <div class="card-title d-flex flex-column">   
                <div class="d-flex align-items-center">
                    <h1  class="fs-4 fw-bold text-hover-success text-gray-600"  style="font-size: 18px;margin-left:25px; margin-top:35px;">Key Risk Indicators Tends </h1>
                </div>
            </div>

            <div class="card-body pt-2 d-flex align-items-center">
                <div class="w-100">
                    <div class="chart-container" data-kt-size="105" data-kt-line="15">
                        <!-- data-kt-percent="100"> -->
                        <!-- <PolarArea :data="chartData" :options="chartOptions" :key="chartKey" /> -->
                        <Doughnut :data="chartData" :options="chartOptions" :key="chartKey" />
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
    import { Doughnut } from 'vue-chartjs';
    import { Chart as ChartJS, Title, Tooltip, Legend, ArcElement } from 'chart.js';

    ChartJS.register(Title, Tooltip, Legend, ArcElement);

    export default {
        name: 'KeyRiskIndicatorsTends',
        components: {
            Doughnut,
        },
        data() {
            return {
                chartKey: 0,  // Add a key for forcing re-render
                kRITLabels: [],
                kRITDatas: [],
                kRITBgColors: [],

                chartData: {
                    labels: [], // These will be set dynamically
                    datasets: [
                        {
                            label: 'Key Risk Indicators Trends',
                            backgroundColor: [],
                            data: [],
                        },
                    ],
                },
                chartOptions: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'top',
                        }
                    }
                },
            };
        },
        methods: {
            getAuthToken() { return localStorage.getItem('authToken') },
            loadKRITVisualization() {
                const token = this.getAuthToken()
                axios.get('/api/visualization/krit', {
                    withCredentials: true,
                    headers: {
                        Authorization: `Bearer ${token}`
                    }
                })
                .then(res => {
                    if (res.data.ResultCode == 1200) {
                        const graphData = res.data.ResponseData;
                        this.kRITLabels = graphData.labels;
                        this.kRITDatas = graphData.datas;
                        this.kRITBgColors = graphData.bgColors;

                        // Update chartData to reflect the dynamic values
                        this.chartData.labels = this.kRITLabels;
                        this.chartData.datasets[0].data = this.kRITDatas;
                        this.chartData.datasets[0].backgroundColor = this.kRITBgColors;
                        this.chartData.datasets[0].borderColor = this.kRITBgColors;
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
            this.loadKRITVisualization();
        },
    };

</script>
<style scoped>
    .chart-container canvas {
        height: 40vh !important;
    }
</style>

