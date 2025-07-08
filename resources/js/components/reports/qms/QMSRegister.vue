<template>
    <div>
        <div class="row mt-2">
            <div class="col-md-12">
                <RiskToolbar :title="'QMS Register'"></RiskToolbar>

                <div>
                    <RiskQmsRegContent :reports="reports"></RiskQmsRegContent>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import RiskToolbar from './components/RiskToolbar.vue'
import RiskQmsRegContent from './components/RiskQmsRegContent.vue'

export default {
    data() {
        return {
            reports: []
        }
    },
    components: { RiskToolbar, RiskQmsRegContent },
    methods: {
        getAuthToken() {
            return localStorage.getItem('authToken')
        },
        summaryReport() {
            axios
                .get('/api/reports/qms-register')
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
        manageHistory() {
            const token = this.getAuthToken()
            axios.post(
                '/api/manage-logs',
                {
                    page_name: 'QMS Register',
                    log: 'User visited to the QMS Register'
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
