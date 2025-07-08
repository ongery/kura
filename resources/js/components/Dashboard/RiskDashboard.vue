<template>
  <div>

    <!-- <div class="app-toolbar py-3">
            <div id="kt_app_toolbar_container" class="app-container d-flex flex-stack ">
                <div class="mb-2 mt-4 page-title d-flex flex-column justify-content-start flex-wrap">
                    <div class="d-flex">
                        <div v-if="isMobile" class="btn btn-icon btn-active-icon-primary p-0" style="margin-left: -25px; margin-right: 15px;" id="kt_aside_toggle">
                            <span class="svg-icon svg-icon-2x">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z" fill="black" />
                                    <path opacity="0.3" d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z" fill="black" />
                                </svg>
                            </span>
                        </div>

                        <div>
                            <h1 class="page-heading d-flex text-dark text-white-400 fw-bold fs-3 flex-column"> Risk Dashboard </h1>
                            <ol style="margin-left: -6px;" role="list" class="flex items-center space-x-4 breadcrumb  breadcrumb-separatorless text-gray-400 fw-semibold pt-1">
                                <li>
                                    <div>
                                        <a href="javascript:void(0)" class="text-gray-400 hover:text-gray-500">
                                            <svg class="flex-shrink-0 h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                                            </svg>
                                            <span class="sr-only">Dashboard</span>
                                        </a>
                                    </div>
                                </li>
                                <li class="breadcrumb-item text-muted">
                                    <div class="flex items-center">
                                        <a href="javascript:void(0)" class="text-gray-500 mt-1 fw-semibold fs-6 text-muted ">
                                            Dashboard
                                        </a>
                                    </div>
                                </li>
                                <li class="breadcrumb-item text-muted">
                                    <div class="flex items-center">
                                        -
                                        <a href="javascript:void(0)" class="text-gray-500 mt-1 fw-semibold fs-6 text-muted ml-4 text-hover-success">
                                            Risk Dashboard
                                        </a>
                                    </div>
                                </li>
                            </ol>
                        </div>


                    </div>
                </div>
            </div>
    </div> -->

    <hr class="mt-2 mb-3" />

    <!-- <h3 class="mt-2">
      <small class="text-muted">Risk Dashboard</small>
    </h3> -->

    <!-- Overview row -->
    <div class="row">


      <!-- <OverviewRiskDash/> -->

      <!-- <div class="col-md-3 mt-2">
        <apexchart type="pie" width="400" :options="chartOptions" :series="series"></apexchart>
         <doughtnut
          style="min-height: 150px; height: 150px; max-height: 150px; max-width: 100%;"
          :totalValue="3434"
        ></doughtnut>  
      </div> -->

      <div class="col-lg-3 col-md-6 col-12 mt-5">
        <!-- small box -->
        <div class="small-box bg-light px-8 pt-5 pb-2">
          <div class="inner">
            <h2>{{ this.summaryReports.totalRisks}}</h2>
            <p>Total Risks</p>
          </div>
        </div>
      </div>


      <div class="col-lg-3 col-md-6 col-12 mt-5">
        <!-- small box -->
        <div class="small-box bg-danger px-8 pt-5 pb-2">
          <div class="inner">
            <h2>{{ this.summaryReports.totalRedRisks}}</h2>
            <p>High Risks</p>
          </div>
        </div>
      </div>


      <div class="col-lg-3 col-md-6 col-12 mt-5">
        <!-- small box -->
        <div
          class="small-box px-8 pt-5 pb-2"
          style="background-color:#ffbf00"
        >
          <div class="inner">
            <h2>{{ this.summaryReports.totalMediumRisks}}</h2>
            <p>Medium Risks</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-12 mt-5">
        <!-- small box -->
        <div class="small-box bg-success px-8 pt-5 pb-2">
          <div class="inner">
            <h2>{{ this.summaryReports.totalGreenRisks}}</h2>
            <p>Low Risks</p>
          </div>
        </div>
      </div>

    </div>

    <hr class="mt-2 mb-3" />
    <div class=" mt-2">
      <table class="table table-bordered table-hover table-sm">
        <thead class="thead-light">

        </thead>
        <tbody
          v-for="mode in reports.riskData"
          :key="mode.id"
        >
          <th
            colspan="10"
            class="bg-primary"
          >
            {{mode.Name}}
          </th>

          <tr>
            <th rowspan="2">Risk</th>
            <th
              rowspan="2"
              style="text-align:center; width:2%;"
            >Inherent Value</th>
            <th
              rowspan="2"
              style="text-align:center; width:2%;"
            >Residual Value</th>
            <th
              colspan="2"
              style="text-align:center;"
            >Key Control Indicators</th>
            <th
              colspan="2"
              style="text-align:center;"
            >Key Risk Indicators</th>
            <th
              colspan="2"
              style="text-align:center;"
            >Treatment Plans</th>
            <th
              rowspan="2"
              style="text-align:center;width:2%"
            >Incidents Reported</th>
          </tr>
          <tr>
            <th style="
              text-align:center;
              width:2%">Total Questions</th>
            <th style="text-align:center; width:2%">Non-Compliance</th>
            <th style="text-align:center; width:2%">Total KRIs</th>
            <th style="text-align:center; width:2%">Red KRIs</th>
            <th style="text-align:center; width:2%">Not-Started Overdue</th>
            <th style="text-align:center; width:2%">WIP-Overdue</th>
          </tr>

          <tr
            v-for="mode1 in mode.riskData"
            :key="mode1.id"
          >

            <td>{{mode1.RiskName}}</td>
            <!-- <td style="text-align:center">1</td> -->

            <!--- INHERENT VALUE -->
            <td
              style="background-color:#ec0d0d"
              v-if="mode1.InherentValue >= 15"
            >{{ mode1.InherentValue }}</td>

            <td
              style="background-color:#ffbf00"
              v-else-if="mode1.InherentValue > 4"
            >{{ mode1.InherentValue }}</td>

            <td
              style="background-color:#09f17d"
              v-else="mode1.InherentValue =< 4"
            >{{ mode1.InherentValue }}</td>

            <!--- RESIDUAL VALUE -->

            <td
              style="background-color:#ec0d0d"
              v-if="mode1.ResidualValue >= 15"
            >{{ mode1.ResidualValue }}</td>

            <td
              style="background-color:#ffbf00"
              v-else-if="mode1.ResidualValue > 4"
            >{{ mode1.ResidualValue }}</td>

            <td
              style="background-color:#09f17d"
              v-else="mode1.ResidualValue =< 4"
            >{{ mode1.ResidualValue }}</td>





            <td>{{mode1.TotalQuestions}}</td>
            <td>7</td>

            <td>{{mode1.TotalKRIs}}</td>
            <td
              class="bg-danger"
              style="text-align:center"
            >{{mode1.RedKRIs}}</td>

            <td style="text-align:center;background-color:#ffc107">{{mode1.NotStartedOverdue}}</td>
            
            <td
              class="bg-danger"
              style="text-align:center"
            >45</td>

            <td
              class="table-info"
              style="text-align:center"
            >0</td>

          </tr>

        </tbody>
      </table>
    </div>
    <!-- /.card -->
  </div>
</template>
<script>
import 'vue-toastification/dist/index.css'
// import Doughtnut from '../../charts/Doughnut'
// import DataRiskJsonString from '../../data/DataRiskJson.js'
// import OverviewRiskDash from './components/OverviewRiskDash.vue'
// import VueApexCharts from "vue3-apexcharts"; // Use "vue-apexcharts" for Vue 2
// import VueApexCharts from "vue-apexcharts";

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
      }),
      series: [44, 55, 13, 43, 22], // Data values for each category
      chartOptions: {
        chart: {
          type: "pie"
        },
        labels: ["Apples", "Oranges", "Bananas", "Grapes", "Mangoes"], // Category names
        responsive: [
          {
            breakpoint: 480,
            options: {
              chart: {
                width: 300
              },
              legend: {
                position: "bottom"
              }
            }
          }
        ]
      }
    }
  },
  // components: {
  //   apexchart: VueApexCharts
  // },
  // components: {
  //   Doughtnut,
  //   OverviewRiskDash
  // },
  computed: {
    myStyles() {
      return {
        height: 20
      }
    }
  },
  methods: {
    summaryReport() {
      axios
        .get('api/dashboards/risk')
        .then((res) => {
          // require('./DataRiskJson.js')
          // console(" GET : (DataRiskJsonString) Data -> "+ DataRiskJsonString)
          // let res = DataRiskJsonString;
          // let jsonString = JSON.stringify(DataRiskJsonString);
          // let res = JSON.parse(jsonString);
          // console.log(" GET : RISK DASH (jsonString) Data -> CODE"+res.data.ResultCode +"DATA >>> "+ JSON.stringify(res));

          if (res.data.ResultCode == 1200) {
            this.reports = res.data.ResponseData
            this.summaryReports = res.data.ResponseData.summaryReports

            console.log("RISK >> DATA : IF ___---> :"+JSON.stringify(res.data.ResponseData.summaryReports));
            localStorage.clear()
            localStorage.setItem('totalRisks', res.data.ResponseData.summaryReports.totalRisks)
          } else {
            console.log(res.data.ResultDesc)
            console.log("RISK >> DATA : ELSE ___---> :"+JSON.stringify(res.data.ResultDesc));

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
          })
        })
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
