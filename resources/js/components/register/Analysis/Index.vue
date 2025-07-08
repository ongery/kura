<template>
    <div>
        <RiskAnalysisToolbar :title="'Risks 1'"></RiskAnalysisToolbar>

        <div class="mt-2">
            <IndexRiskAnalysisContent></IndexRiskAnalysisContent>
        </div>
    </div>
</template>

<script>
import RiskAnalysisToolbar from '../components/RiskAnalysisToolbar'
import IndexRiskAnalysisContent from '../components/content/IndexRiskAnalysisContent.vue'

export default {
    data() {
        return {
            editmode: false,
            categories: {},
            alldata: {},
            counter: 1,
            businessunits: {},
            form: new Form({
                id: '',
                ObjType: 11,
                Name: '',
                BunitID: ''
            })
        }
    },
    components: { RiskAnalysisToolbar, IndexRiskAnalysisContent },
    methods: {
        getAuthToken() { return localStorage.getItem('authToken'); },
        getResults(page = 1) {
            const token = this.getAuthToken();
            axios.get('/api/category?page=' + page, {
                params: {
                    ObjType: this.form.ObjType
                },
                withCredentials: true,
                headers: {
                    'Authorization': `Bearer ${token}`
                }
            })
            .then(response => {
                this.categories = response.data
            })
        },
        loadData() {
            const token = this.getAuthToken();
            axios.get('/api/risks', {
                params: {
                    ObjType: this.form.ObjType,
                    BunitID: this.form.BunitID
                },
                withCredentials: true,
                headers: {
                    'Authorization': `Bearer ${token}`
                }
            })
            .then(res => {
                if (res.data.ResultCode == 1200) {
                    this.alldata = res.data.ResponseData.data
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
        deleteRoute(id) {
            swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then(result => {
                // Send request to the server
                if (result.value) {
                    const token = this.getAuthToken();
                    this.form.delete('/api/category/' + id, {
                        withCredentials: true,
                        headers: {
                            'Authorization': `Bearer ${token}`
                        }
                    })
                    .then(() => {
                        swal.fire('Deleted!', 'Your file has been deleted.', 'success')
                        Fire.$emit('AfterCreate')
                    })
                    .catch(() => {
                        swal.fire('Failed!', 'Something when wrong', 'warning')
                    })
                }
            })
        },
        moreDetails(id) {
            localStorage.clear()
            localStorage.setItem('risk_id', id)
            this.$router.push({ name: 'AnalyseRiskProfile' })
        },
        newAnalysis() {
            this.$router.push({ name: 'AnalyseRiskNew' })
        },

        loadBusinessUnits() {
            const token = this.getAuthToken();
            axios.get('/api/businessunits', {
                params: {
                    ObjType: this.form.BUObjType
                },
                withCredentials: true,
                headers: {
                    'Authorization': `Bearer ${token}`
                }
            })
            .then(res => {
                if (res.data.ResultCode == 1200) {
                    this.businessunits = res.data.ResponseData.data
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
        this.loadBusinessUnits()
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
