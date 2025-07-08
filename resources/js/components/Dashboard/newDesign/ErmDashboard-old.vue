<template>
    <div class="card pl-9">
        <div class="card-body">
            <div class="d-flex flex-column flex-xl-row">
                <div class="m-0">
                    <div class="d-print-none border border-dashed border-gray-300 card-rounded h-lg-100 p-9 bg-lighten" style="width: 300px;">
                        <div class="mx-5">
                            <h3 class="fw-bolder text-dark mb-10 mx-0">Main Risk</h3>
                            <div class="mb-12">
                                <div v-for="(mode, index) in reports" :key="mode.id" @click="selectReport(mode, index)" class="d-flex align-items-center mb-7">
                                    <div class="symbol symbol-50px me-5">
                                        <span class="symbol-label bg-light-success">
                                            <span class="svg-icon svg-icon-2x svg-icon-success">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <path opacity="0.3" d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z" fill="black" />
                                                    <path d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z" fill="black" />
                                                </svg>
                                            </span>
                                        </span>
                                    </div>
                                    
                                    <div class="d-flex flex-column">
                                        <a href="#" class="text-gray-800 text-hover-success fs-6 fw-bold">{{ mode.RiskName }}</a>
                                        <span class="text-muted fw-bold">ERM Report</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex-lg-row-fluid  mb-10" style="margin-left: 35px;">
                    <ErmContentview :selectedItems="selectedData" :InherentValue="InherentValue" :ResidualValue="ResidualValue"></ErmContentview>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import 'vue-toastification/dist/index.css'
import CommitChart from '../../charts/CommitChart'
import Doughtnut from '../../charts/Doughnut'
import DataERMJsonString from '../../data/DataERMJson.js'
import ErmOverview from './components/ErmOverview.vue'
import ErmContentview from './components/ErmContentview.vue'

export default {
    data() {
        return {
            InherentValue: '',
            ResidualValue: '',
            selectedData: {},
            editmode: false,
            categories: {},
            alldata: {},
            counter: 1,
            businessunits: {},
            reports: [],
            form: new Form({
                id: '',
                ObjType: 11,
                Name: '',
                BunitID: ''
            })
        }
    },
    components: {
        CommitChart,
        Doughtnut,
        ErmOverview,
        ErmContentview
    },
    computed: {
        myStyles() {
            return {
                height: 20
            }
        }
    },
    methods: {
        getAuthToken() {
            return localStorage.getItem('authToken')
        },
        selectReport(mode, index) {
            // Set the selected task to be displayed in the body
            this.selectedData = mode
            this.InherentValue = mode.InherentValue
            this.ResidualValue = mode.ResidualValue

            console.log('selectReport --> : (InherentValue) == InherentValue >> ' + mode.InherentValue)
            console.log('selectReport --> : (ResidualValue) == ResidualValue >> ' + mode.ResidualValue)
            console.log('selectReport --> : (Data) == ' + JSON.stringify(mode))
        },

        summaryReport() {
            const token = this.getAuthToken()
            axios
                .get('/api/dashboards/erm', {
                    withCredentials: true,
                    headers: {
                        Authorization: `Bearer ${token}`
                    }
                })
                .then(res => {
                    // console.log(" GET : (DataERMJsonString) Data -> "+ DataERMJsonString)

                    // let jsonString = JSON.stringify(DataERMJsonString)
                    // let res = JSON.parse(jsonString)

                    // console.log(" GET  (ERM summaryReport): (res) Data -> "+ res)

                    if (res.data.ResultCode == 1200) {
                        this.reports = res.data.ResponseData
                        this.selectedData = res.data.ResponseData[0]
                        this.InherentValue = res.data.ResponseData[0].InherentValue
                        this.ResidualValue = res.data.ResponseData[0].ResidualValue

                        // console.log("summaryReport -->  Fetched Data : (Data) == "+ JSON.stringify(this.selectedData) )
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
        }
    },
    // mounted() {
    //   console(" GET : (DataERMJsonString) Data -> "+ DataERMJsonString)
    //   console(" GET : (jsonString) Data -> "+ this.jsonString)
    // },
    created() {
        this.summaryReport()
    }
}
</script>
