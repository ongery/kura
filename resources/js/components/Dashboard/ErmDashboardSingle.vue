<template>


<!-- <ErmOverview></ErmOverview> -->

  <div>

    <!-- <h3 class="mt-2">
      <small class="text-muted">ERM Dashboard</small>
    </h3> -->

    <div class="app-toolbar py-3">
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
                            <h1 class="page-heading d-flex text-dark text-white-400 fw-bold fs-3 flex-column"> ERM Dashboard </h1>
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
                                            ERM Dashboard
                                        </a>
                                    </div>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
    </div>  


    <hr class="mt-2 mb-3" />

    <div class=" mt-2">
      <table class="table table-bordered table-hover table-sm">
        <thead class="thead-light">

          <tr>
            <th rowspan="2">Main Risk</th>
            <th
              rowspan="2"
              style="text-align:center; width:2%;"
            >I.R</th>
            <th
              rowspan="2"
              style="text-align:center; width:2%;"
            >R.R</th>
            <th
              rowspan="2"
              style="text-align:center"
            >Risk Level 1</th>
            <th
              rowspan="2"
              style="text-align:center; width:2%;"
            >I.R</th>
            <th
              rowspan="2"
              style="text-align:center; width:2%;"
            >R.R</th>
            <th
              colspan="2"
              style="text-align:center;"
            >K.C.I</th>
            <th
              colspan="2"
              style="text-align:center;"
            >K.R.I</th>
            <th
              colspan="2"
              style="text-align:center;"
            >Treatment</th>
          </tr>
          <tr>
            <th style="
              text-align:center;
              width:2%">Total KCI</th>
            <th style="text-align:center; width:2%">Red KCI</th>
            <th style="text-align:center; width:2%">Total KRIs</th>
            <th style="text-align:center; width:2%">Red KRIs</th>
            <th style="text-align:center; width:2%">Not-Started Overdue</th>
            <th style="text-align:center; width:2%">WIP-Overdue</th>
          </tr>

        </thead>
        <tbody
          v-for="mode in reports"
          :key="mode.id"
        >

          <tr class="bg-primary">
            <td>
              {{mode.RiskName}}
            </td>
            <!--- INHERENT VALUE -->
            <td
              style="background-color:#ec0d0d"
              v-if="mode.InherentValue >= 15"
            >{{ mode.InherentValue }}</td>

            <td
              style="background-color:#ffbf00"
              v-else-if="mode.InherentValue > 4"
            >{{ mode.InherentValue }}</td>

            <td
              style="background-color:#09f17d"
              v-else="mode.InherentValue =< 4"
            >{{ mode.InherentValue }}</td>

            <!--- END  INHERENT VALUE -->
            <!--- RESIDUAL VALUE -->

            <td
              style="background-color:#ec0d0d"
              v-if="mode.ResidualValue >= 15"
            >{{ mode.ResidualValue }}</td>

            <td
              style="background-color:#ffbf00"
              v-else-if="mode.ResidualValue > 4"
            >{{ mode.ResidualValue }}</td>

            <td
              style="background-color:#09f17d"
              v-else="mode.ResidualValue =< 4"
            >{{ mode.ResidualValue }}</td>
            <!--- END RESIDUAL VALUE -->
            <td colspan="10">

            </td>
          </tr>

          <tr
            v-for="mode1 in mode.riskData"
            :key="mode1.id"
          >

            <td colspan="3"></td>
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
            >10</td>
            <td style="text-align:center;background-color:#ffc107">{{mode1.NotStartedOverdue}}</td>
            <td
              class="bg-danger"
              style="text-align:center"
            >45</td>

          </tr>

        </tbody>
      </table>
    </div>
    <!-- /.card -->
  </div>
</template>
<script>
import 'vue-toastification/dist/index.css'
import CommitChart from '../../charts/CommitChart'
import Doughtnut from '../../charts/Doughnut'
// import DataERMJsonString from '../../data/DataERMJson.js'
import ErmOverview from './components/ErmOverview.vue'

export default {
  data() {
    return {
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
    ErmOverview
  },
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
        .get('api/dashboards/erm')
        .then((res) => {
          // let jsonString = JSON.stringify(DataERMJsonString)
          // let res = JSON.parse(jsonString)
          console.log(" GET : ERM DASH :: (jsonString) Data -> CODE"+res.data.ResultCode +"DATA >>> "+ JSON.stringify(res))
          if (res.data.ResultCode == 1200) {
            this.reports = res.data.ResponseData
            console.log("if --> GET : ERM DASH :" +res.data.ResponseData)
          } else {
            console.log("else --> GET : ERM DASH : error :" +res.data.ResultDesc)
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
  //   console(" GET : (DataERMJsonString) Data -> "+ DataERMJsonString)
  //   console(" GET : (jsonString) Data -> "+ this.jsonString)
  // },
  created() {
    this.summaryReport()
  }
}
</script>
