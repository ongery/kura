<template>
    <div>
        <div class="row mt-2">
            <div class="col-md-12">
                <RiskToolbar :title="'ERM Register'"></RiskToolbar>

                <div>
                    <ErmRegContent :reports="reports"></ErmRegContent>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import RiskToolbar from './components/RiskToolbar.vue'
import ErmRegContent from './components/ErmRegContent'

export default {
    data() {
        return {
            reports: []
        }
    },
    components: { RiskToolbar, ErmRegContent },
    methods: {
        getAuthToken() { return localStorage.getItem('authToken'); },
        summaryReport() {
            axios
                .get('/api/reports/erm-register')
                .then(res => {
                    if (res.data.ResultCode == 1200) {
                        this.reports = res.data.ResponseData
                        console.log('console.log :: Reports (ERM Reg)' + JSON.stringify(this.reports))
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
            const token = this.getAuthToken();
            axios.post(
                '/api/manage-logs',
                {
                    page_name: 'ERM Register',
                    log: 'User visited to the ERM Register'
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
