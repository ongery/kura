<template>
    <div>
        <!-- begin:Row -->
        <div class="row mt-2">
            <!-- begin:col -->
            <div class="col-md-12">
                <RiskToolbar :title="'Key Risk Indicators Register'"></RiskToolbar>
                <!-- <KeyRiskIndicatorOverview></KeyRiskIndicatorOverview> -->

                <!-- <KeyRiskIndicatorsRegisterContent :reports="reports"></KeyRiskIndicatorsRegisterContent> -->
                <KeyRiskIndicatorRegContent :reports="reports"></KeyRiskIndicatorRegContent>
            </div>
            <!-- end:col -->
        </div>
        <!-- end:Row -->
    </div>
</template>

<script>
    import TotalDought from '../../../charts/kri-reports/Doughnut'
    import RiskToolbar from './components/items/RiskToolbar.vue'
    import KeyRiskIndicatorsRegisterContent from './components/KeyRiskIndicator/KeyRiskIndicatorsRegisterContent.vue'
    import KeyRiskIndicatorOverview from './components/KeyRiskIndicator/KeyRiskIndicatorOverview.vue'
    import KeyRiskIndicatorRegContent from './components/KeyRiskIndicator/KeyRiskIndicatorRegContent.vue'

    export default {
        data() {
            return {
                reports: [],
                unmetered: 90,
                chartData: {
                    datasets: [
                        {
                            borderWidth: 1,
                            borderColor: ['rgba(75, 192, 192, 1)'],
                            backgroundColor: ['rgba(67, 153, 104, 0.8)'],
                            data: [1000]
                        }
                    ],
                    labels: ['No. Risks']
                },

                chartDataTotal: {
                    datasets: [
                        {
                            borderWidth: 1,
                            borderColor: ['rgba(75, 192, 192, 1)'],
                            backgroundColor: ['rgba(67, 153, 104, 0.8)'],
                            data: [1000]
                        }
                    ],
                    labels: ['Total KRIs']
                },
                chartDataRed: {
                    datasets: [
                        {
                            borderWidth: 2,
                            borderColor: ['rgba(75, 192, 192, 1)'],
                            backgroundColor: ['rgba(255,0,0, 0.8)'],
                            data: [1000, 30]
                        }
                    ],
                    labels: ['Red']
                },

                chartDataAmber: {
                    datasets: [
                        {
                            borderWidth: 2,
                            borderColor: ['rgba(75, 192, 192, 1)'],
                            backgroundColor: ['rgba(255,191,0,0.8)'],
                            data: [1000, 30]
                        }
                    ],
                    labels: ['Amber KRIs']
                },

                chartDataGreen: {
                    datasets: [
                        {
                            borderWidth: 2,
                            borderColor: ['rgba(75, 192, 192, 1)'],
                            backgroundColor: ['rgba(0,255,0,0.8)'],
                            data: [1000, 30]
                        }
                    ],
                    labels: ['Green KRIs']
                },

                chartDataGray: {
                    datasets: [
                        {
                            borderWidth: 2,
                            borderColor: ['rgba(75, 192, 192, 1)'],
                            backgroundColor: ['rgba(128,128,128,0.8)'],
                            data: [1000, 30]
                        }
                    ],
                    labels: ['Un-metered KRIs']
                },

                chartOptions: {
                    legend: {
                        display: true
                    },
                    responsive: true,
                    maintainAspectRatio: false
                }
            }
        },
        components: {
            TotalDought,
            RiskToolbar,
            KeyRiskIndicatorsRegisterContent,
            KeyRiskIndicatorOverview,
            KeyRiskIndicatorRegContent
        },
        methods: {
            getAuthToken() { return localStorage.getItem('authToken'); },
            loadKRIRegisterData() {
                const token = this.getAuthToken();
                axios.get('/api/reports/kri-register',{
                    withCredentials: true,
                    headers: {
                        'Authorization': `Bearer ${token}`
                    }
                })
                .then(res => {
                    if (res.data.ResultCode == 1200) {
                        this.reports = res.data.ResponseData
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
            loadKRIRegisterSummary() {
                const token = this.getAuthToken();
                axios.get('/api/reports/kri-register-summary', {
                    withCredentials: true,
                    headers: {
                        'Authorization': `Bearer ${token}`
                    }
                })
                .then(res => {
                    if (res.data.ResultCode == 1200) {
                        localStorage.removeItem('kriSummary')
                        localStorage.setItem('kriSummary', JSON.stringify(res.data.ResponseData))
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
            manageHistory() {
                const token = this.getAuthToken();
                axios.post('/api/manage-logs', {
                    'page_name': 'Key Risk Indicators Register',
                    'log': 'User visited to the Key Risk Indicators Register'
                }, {
                    withCredentials: true,
                    headers: {
                        'Authorization': `Bearer ${token}`
                    }
                })
            }
        },
        created() {
            this.loadKRIRegisterData()
            this.loadKRIRegisterSummary()
            this.manageHistory();

        }
    }
</script>

<style scoped>
    .danger {
        background-color: #d6a448;
    }
    .warning {
        background-color: #ffbf00;
    }
    .success {
        background-color: #09f17d;
    }
</style>
