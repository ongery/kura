<template>
    <div>
        <div class="row mt-2">
            <div class="col-md-12">
                <RiskToolbar :title="'Risk Register'"></RiskToolbar>
                <RiskRegContent :reports="reports"></RiskRegContent>
            </div>
        </div>
    </div>
</template>

<script>
import RiskToolbar from './components/items/RiskToolbar.vue'
import RiskRegContent from './components/Risk/RiskRegContent.vue'

export default {
    data() {
        return {
            reports: []
        }
    },
    components: { RiskToolbar, RiskRegContent },
    methods: {
        getAuthToken() {
            return localStorage.getItem('authToken')
        },
        summaryReport() {
            const token = this.getAuthToken()
            axios
                .get('/api/reports/risk-register', {
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
                        toast.fInherentValuee({
                            type: 'error',
                            title: res.data.ResultDesc
                        })
                    }
                })
                .catch(e => {
                    this.$Progress.fail()
                    toast.fInherentValuee({
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
                    page_name: 'Risk Register',
                    log: 'User visited to the Risk Register'
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
        this.manageHistory()
    }
}
</script>
