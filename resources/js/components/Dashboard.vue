<template>
  <div>

    <div class="row">

      <div class="col-md-3 mt-2">
        <doughtnut style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></doughtnut>
      </div>

      <div class="col-md-3 mt-2">
        <commit-chart :styles="myStyles"></commit-chart>

      </div>

      <div class="col-lg-2 col-md-6 col-12 mt-5">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
            <h2>100</h2>
            <p>High Risks</p>
          </div>
        </div>
      </div>
      <div class="col-lg-2 col-md-6 col-12 mt-5">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
            <h2>100</h2>
            <p>Medium Risks</p>
          </div>
        </div>
      </div>
      <div class="col-lg-2 col-md-6 col-12 mt-5">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h2>100</h2>
            <p>Low Risks</p>
          </div>
        </div>
      </div>

    </div>

    <hr class="mt-2 mb-3" />
    <div class=" mt-2">
      <table class="table table-bordered table-hover table-sm">
        <thead class="thead-light">

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

        </thead>
        <tbody
          v-for="mode in reports"
          :key="mode.id"
        >
          <th
            colspan="10"
            class="bg-primary"
          >
            {{mode.Name}}
          </th>
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
            >10</td>
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
import CommitChart from '../charts/CommitChart'
import Doughtnut from '../charts/Doughnut'
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
    Doughtnut
  },
  computed: {
    myStyles() {
      return {
        height: 20
      }
    }
  },
  methods: {
    getAuthToken() { return localStorage.getItem('authToken'); },
    summaryReport() {
      const token = this.getAuthToken();
      axios
        .get('/api/dashboards/risk', { 
          withCredentials: true,
          headers: {
              Authorization: `Bearer ${token}`
          }
        })
        .then((res) => {
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
        .catch((e) => {
          this.$Progress.fail()
          toast.fire({
            type: 'error',
            title: 'Operation not successfull' + '\n' + e.response.data.message
          })
        })
    }
  },
  created() {
    this.summaryReport()
  }
}
</script>
