<template>
    <div>
        <div class="row mt-5">
            <div class="col-sm-3 col-xs-12 col-xl-3 mb-5">
                <div class="card">
                    <div class="card-title d-flex flex-column">
                        <h1 class="fw-bold text-hover-success text-gray-600 text-center w-100 mt-10 fs-2hx" style="margin-bottom: 10%;justify-content: center;display: flex;">
                            <span style="border:1px solid rgb(219, 221, 225); border-radius:100%; padding:10%; width:50px; height:50px; border-radius:50%; display:flex; align-items:center; justify-content:center;"> 10 </span>
                        </h1>

                        <h1  class="fs-3 fw-bold text-hover-success text-gray-600 text-center w-100 mb-7"> Total no. of Identified Risk </h1>
                    </div>
                </div>
            </div>

            <div class="col-sm-3 col-xs-12 col-xl-3 mb-5">
                <div class="card">
                    <div class="card-title d-flex flex-column">
                        <h1 class="fw-bold text-hover-success text-gray-600 text-center w-100 mt-10 fs-2hx" style="margin-bottom: 10%;justify-content: center;display: flex;">
                            <span style="border:1px solid rgb(219, 221, 225); border-radius:100%; padding:10%; width:50px; height:50px; border-radius:50%; display:flex; align-items:center; justify-content:center;"> 3 </span>
                        </h1>

                        <h1  class="fs-3 fw-bold text-hover-success text-gray-600 text-center w-100 mb-7"> Total no. of High Risk </h1>
                    </div>
                </div>
            </div>

            <div class="col-sm-3 col-xs-12 col-xl-3 mb-5">
                <div class="card">
                    <div class="card-title d-flex flex-column">
                        <h1 class="fw-bold text-hover-success text-gray-600 text-center w-100 mt-10 fs-2hx" style="margin-bottom: 10%;justify-content: center;display: flex;">
                            <span style="border:1px solid rgb(219, 221, 225); border-radius:100%; padding:10%; width:50px; height:50px; border-radius:50%; display:flex; align-items:center; justify-content:center;"> 2 </span>
                        </h1>

                        <h1  class="fs-3 fw-bold text-hover-success text-gray-600 text-center w-100 mb-7"> Total no. of Medium Risk </h1>
                    </div>
                </div>
            </div>

            <div class="col-sm-3 col-xs-12 col-xl-3 mb-5">
                <div class="card">
                    <div class="card-title d-flex flex-column">
                        <h1 class="fw-bold text-hover-success text-gray-600 text-center w-100 mt-10 fs-2hx" style="margin-bottom: 10%;justify-content: center;display: flex;">
                            <span style="border:1px solid rgb(219, 221, 225); border-radius:100%; padding:10%; width:50px; height:50px; border-radius:50%; display:flex; align-items:center; justify-content:center;"> 5 </span>
                        </h1>

                        <h1  class="fs-3 fw-bold text-hover-success text-gray-600 text-center w-100 mb-7"> Total no. of Low Risk </h1>
                    </div>
                </div>
            </div>

            <RiskOverview :summaryReports="summaryReports" :totalRiskCal="this.totalCalRisk"></RiskOverview>
        </div>
    </div>
</template>
<script>
    import RiskOverview from './components/RiskOverview.vue';

    export default {
        name: 'RiskDashboard',
        data() {
            return {
                // totalCalRisk: '0',
                // editmode: false,
                // categories: {},
                // alldata: {},
                // counter: 1,
                // businessunits: {},
                // reports: [],
                // summaryReports: {},
                // form: new Form({
                //     id: '',
                //     ObjType: 11,
                //     Name: '',
                //     BunitID: ''
                // })
            }
        },
        components: { RiskOverview },
        // computed: {
        //     myStyles() {
        //         return {
        //             height: 20
        //         }
        //     }
        // },
        // watch: {
        //     totalCalRisk(newVal) {
        //         this.totalCalRisk = newVal
        //         localStorage.setItem('totalRiskCalculated', '' + this.totalCalRisk)
        //     }
        // },
        // methods: {
        //     getAuthToken() {
        //         return localStorage.getItem('authToken')
        //     },

        //     summaryReport() {
        //         const token = this.getAuthToken()
        //         axios.get('/api/dashboards/risk', {
        //             withCredentials: true,
        //             headers: {
        //                 Authorization: `Bearer ${token}`
        //             }
        //         })
        //         .then(res => {
        //             if (res.data.ResultCode == 1200) {
        //                 this.summaryReports = res.data.ResponseData.summaryReports

        //                 // Init val onLoading
        //                 this.totalCalRisk = parseInt(this.summaryReports.totalRedRisks) + parseInt(this.summaryReports.totalMediumRisks) + parseInt(this.summaryReports.totalGreenRisks)

        //                 // RiskVueEventBus.$emit('totalRiskCalculated', totalCalRisk);
        //                 localStorage.setItem('totalRiskCalculated', '' + this.totalCalRisk)

        //                 Fire.$emit('totalRiskCalculated', this.totalCalRisk)

        //                 // set report data
        //                 this.reports = res.data.ResponseData
        //             } else {
        //                 toast.fire({
        //                     type: 'error',
        //                     title: res.data.ResultDesc
        //                 })
        //             }
        //         })
        //         .catch(e => {
        //             this.$Progress.fail()
        //             toast.fire({
        //                 type: 'error',
        //                 title: 'Operation not successfull' + '\n' + e.response.data.message
        //             })
        //         })
        //     }
        // },
        // created() {
        //     this.summaryReport()
        // }
    }
</script>
