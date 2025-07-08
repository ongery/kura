<template>
    <div>
        <div class="row mt-2">
            <div class="col-md-12">
                <RiskToolbar :title="'Action Register'"></RiskToolbar>

                <div>
                    <ActionRegContent :reports="reports"></ActionRegContent>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
// import RiskToolbar from './components/RiskToolbar.vue'
import RiskToolbar from './components/items/RiskToolbar.vue'

import ActionOverview from './components/Action/ActionOverview.vue'
import ActionRegContent from './components/Action/ActionRegContent.vue'

export default {
    data() {
        return {
            reports: []
        }
    },
    methods: {
        getAuthToken() {
            return localStorage.getItem('authToken')
        },
        summaryReport() {
            const token = this.getAuthToken()
            axios
                .get('/api/reports/action-register', {
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
        manageHistory() {
            const token = this.getAuthToken()
            axios.post(
                '/api/manage-logs',
                {
                    page_name: 'Action Register',
                    log: 'User visited to the Action Register'
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
    components: { RiskToolbar, ActionRegContent, ActionOverview },
    created() {
        this.summaryReport()
        this.manageHistory()
    }
}
</script>
