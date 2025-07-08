<template>
    <div>
        <div class="row">
            <RiskOverview :summaryReports="summaryReports" :totalRiskCal="this.totalCalRisk"></RiskOverview>
        </div>

        <div class="row mt-5">
            <div class="col">
                <SliderItemDashboard  :reports="reports" :reportsErm="this.reportsErm"></SliderItemDashboard>
            </div>
        </div>
    </div>
</template>

<script>
    import 'vue-toastification/dist/index.css'
    import Doughtnut from '../../charts/Doughnut'
    import DataRiskJsonString from '../../data/DataRiskJson.js'
    // import OverviewRiskDash from './components/OverviewRiskDash.vue'
    import RiskOverview from './components/RiskOverview.vue' 
    import RiskContent from './components/RiskContent.vue' 

    import {RiskVueEventBus} from './components/service/RiskVueEventBus'
    import RiskTableViewDashboard from './components/items/RiskTableViewDashboard.vue'
    import SliderItemDashboard from './components/items/SliderItemDashboard.vue'
    import CardOverviewLowRiskDash from './components/items/CardOverviewLowRiskDash.vue'

    export default {
        name:'Dashboard',
        data() {
            return {
                reportsErm : [],
                selectedDataErm : {},
                InherentValueErm  : "",
                ResidualValueErm : "", 
      
                totalCalRisk:'0',
                editmode: false,
                categories: {},
                alldata: {},
                counter: 1,
                businessunits: {},
                reports: [],
                summaryReports: {},
                form: new Form({
                    id: '',
                    ObjType: 11,
                    Name: '',
                    BunitID: ''
                })
            }
        },
        components: {
            Doughtnut,
            RiskOverview,
            RiskContent,
            RiskTableViewDashboard,
            SliderItemDashboard,
            CardOverviewLowRiskDash
        },
        computed: {
            myStyles() {
                return {
                    height: 20
                }
            }
        },
        watch: {
            totalCalRisk(newVal) {
                this.totalCalRisk = newVal;
                localStorage.setItem('totalRiskCalculated', ""+this.totalCalRisk)
            }
        },
        methods: {
            getAuthToken() { return localStorage.getItem('authToken'); },
            summaryReport() {
                const token = this.getAuthToken();
                axios.get('/api/dashboards/risk', {
                    withCredentials: true,
                    headers: {
                        'Authorization': `Bearer ${token}`
                    }
                }).then((res) => {
                    if (res.data.ResultCode == 1200) {
                        this.summaryReports = res.data.ResponseData.summaryReports;
                        
                        // Init val onLoading
                        this.totalCalRisk = parseInt(this.summaryReports.totalRedRisks) + parseInt(this.summaryReports.totalMediumRisks) + parseInt(this.summaryReports.totalGreenRisks);

                        // RiskVueEventBus.$emit('totalRiskCalculated', totalCalRisk);
                        localStorage.setItem('totalRiskCalculated', ""+this.totalCalRisk)

                        Fire.$emit('totalRiskCalculated', this.totalCalRisk);

                        // set report data
                        this.reports = res.data.ResponseData;
                    } 
                    else {
                        toast.fire({
                            type: 'error',
                            title: res.data.ResultDesc
                        })
                    }
                })
                .catch((e) => {
                    this.$Progress.fail()
                    toast.fire({
                        type: 'error',
                        title: 'Operation not successfull' + '\n' + e.response.data.message
                    });
                });
            },
            summaryReportErm() {
                const token = this.getAuthToken();
                axios.get('/api/dashboards/erm', {
                    withCredentials: true,
                    headers: {
                        'Authorization': `Bearer ${token}`
                    }
                }).then((res) => {
                    if (res.data.ResultCode == 1200) {
                        this.reportsErm = res.data.ResponseData;
                        this.selectedDataErm = res.data.ResponseData[0];
                        this.InherentValueErm  = res.data.ResponseData[0].InherentValue;
                        this.ResidualValueErm = res.data.ResponseData[0].ResidualValue; 
                    } 
                    else {
                        toast.fire({
                            type: 'error',
                            title: res.data.ResultDesc
                        });
                    }
                })
                .catch((e) => {
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
                    'page_name': 'dashboard',
                    'log': 'user visited to the Dashboard'
                }, {
                    withCredentials: true,
                    headers: {
                        'Authorization': `Bearer ${token}`
                    }
                })
            }
        },
        created() {
            // Call data
            this.summaryReport();

            // Get ERM
            this.summaryReportErm();

            this.manageHistory();
        }
    }
</script>
