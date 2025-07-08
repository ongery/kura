<template>
  <!--begin::Card widget 17-->
  <div class="card card-flush h-md-50 mb-xl-4 m-5">
    <!--begin::Header-->
    <div class="card-header pt-5">
        <!--begin::Title-->
        <div class="card-title d-flex flex-column">   
            <!--begin::Info--> 
            <div class="d-flex align-items-center">
                <!--begin::Title-->
                <span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">High Risk</span> 
                <!--end::Title-->
            </div>
            <!--end::Info--> 

            <!--begin::Subtitle-->
            <span class="text-gray-400 pt-1 fw-semibold fs-6">Risk Report</span>
            <!--end::Subtitle--> 
        </div>
        <!--end::Title-->      
    </div>
    <!--end::Header-->

    <!--begin::Card body-->
    <div class="card-body pt-2 pb-4 d-flex flex-wrap align-items-center">
        <!--begin::Chart-->
        <div class="d-flex flex-center me-5 pt-2">
            <div 
                id="kt_card_widget_4_chart" 
                style="min-width:90px; min-height: 90px" 
                data-kt-size="85" 
                data-kt-line="11">
            </div>
        </div>
        <!--end::Chart-->
        

        <div class="d-flex flex-column flex-wrap align-items-center">

            
            <!--begin::Stats-->
            <div class="fw-bolder text-gray-700 pr-1 pb-3 fs-2hx ">{{ risk }}</div>
            <!--end::Stats-->


            <!--begin::Label-->
            <div class="text-gray-500 flex-grow-1">High Risk</div>
            <!--end::Label-->

        </div>
      
    </div>
    <!--end::Card body-->
</div>
<!--end::Card widget 17-->
        
    
</template>

<script>


export default {
  data() {
    return {
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
//   components: {
    // Doughtnut,
    // OverviewRiskDash
//   },
  computed: {
    myStyles() {
      return {
        height: 20
      }
    }
  },
  methods: {
    summaryReport() {
      // axios
        // .get('/api/dashboards/risk')
        // .then((res) => {
          // require('./DataRiskJson.js')

       
          // console(" GET : (DataRiskJsonString) Data -> "+ DataRiskJsonString)
          // console(" GET : (jsonString) Data -> "+ jsonString)
          // let res = DataRiskJsonString;

          let jsonString = JSON.stringify(DataRiskJsonString)
          let res = JSON.parse(jsonString)
          if (res.data.ResultCode == 1200) {
            this.reports = res.data.ResponseData
            this.summaryReports = res.data.ResponseData.summaryReports
            localStorage.clear()
            localStorage.setItem('totalRisks', res.data.ResponseData.summaryReports.totalRisks)
          } else {
            console.log(res.data.ResultDesc)
            toast.fire({
              type: 'error',
              title: res.data.ResultDesc
            })
          }
        // })
        // .catch((e) => {
          // this.$Progress.fail()
          // toast.fire({
            // type: 'error',
            // title: 'Operation not successfull' + '\n' + e.response.data.message
          // })
        // })
    }
  }, 
  // mounted() {  
  //   console(" GET : (DataRiskJsonString) Data -> "+ DataRiskJsonString)
  //   console(" GET : (jsonString) Data -> "+ this.jsonString)
  // },
  created() {
    this.summaryReport()
  }
}
</script>