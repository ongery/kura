<template>
    <div>
        <div class="row mt-2">
            <div class="col-md-12">
                <RiskToolbar :title="'Key Control Indicators Register'"></RiskToolbar>
                <KeyControlIndicatorRegContent :reports="reports"></KeyControlIndicatorRegContent>
            </div>
        </div>
    </div>
</template>
<script>
import TotalDought from '../../../charts/kri-reports/KCIDoughnut'
import RiskToolbar from './components/items/RiskToolbar.vue'

import KeyControlIndicatorOverview from './components/KeyControlIndicator/KeyControlIndicatorOverview.vue'
import KeyControlIndicatorRegContent from './components/KeyControlIndicator/KeyControlIndicatorRegContent.vue'

export default {
    data() {
        return {
            reports: [],
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
            chartDataKCI: {
                datasets: [
                    {
                        borderWidth: 1,
                        borderColor: ['rgba(75, 192, 192, 1)'],
                        backgroundColor: ['rgba(67, 153, 104, 0.8)'],
                        data: [1000]
                    }
                ],
                labels: ['# KCI']
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
                labels: ['RED KCIs']
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
                labels: ['Green KCIs']
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
                labels: ['Un-Attested']
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
        KeyControlIndicatorOverview,
        KeyControlIndicatorRegContent
    },
    methods: {
        getAuthToken() {
            return localStorage.getItem('authToken')
        },
        summaryReport() {
            const token = this.getAuthToken()
            axios
                .get('/api/reports/kci-register', {
                    withCredentials: true,
                    headers: {
                        Authorization: `Bearer ${token}`
                    }
                })
                .then(res => {
                    if (res.data.ResultCode == 1200) {
                        this.reports = res.data.ResponseData
                    } else {
                        console.log(res.data.ResultDesc)
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
            const token = this.getAuthToken()
            axios
                .get('/api/reports/kci-register-summary', {
                    withCredentials: true,
                    headers: {
                        Authorization: `Bearer ${token}`
                    }
                })
                .then(res => {
                    if (res.data.ResultCode == 1200) {
                        localStorage.removeItem('kciSummary')
                        localStorage.setItem('kciSummary', JSON.stringify(res.data.ResponseData))
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
            const token = this.getAuthToken()
            axios.post(
                '/api/manage-logs',
                {
                    page_name: 'Key Control Indicators Register',
                    log: 'User visited to the Key Control Indicators Register'
                },
                {
                    withCredentials: true,
                    headers: {
                        Authorization: `Bearer ${token}`
                    }
                }
            )
        }
    },
    created() {
        this.summaryReport()
        this.loadKRIRegisterSummary()
        this.manageHistory()
    }
}
</script>
