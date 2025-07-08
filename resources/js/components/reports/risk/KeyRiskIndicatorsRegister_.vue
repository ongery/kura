<template>
  <div>
    <div class="row mt-2">

            <RiskToolbar :title="'Key Risk Indicators Register'"></RiskToolbar>
        

      <div class="col-md-12">

        <div class="card">
        

       
          <div class="row mb-2">
            <div class="col-md-2 mt-2">
              <TotalDought
                style="min-height: 110px; height: 110px; max-height: 110px; max-width: 100%"
                :chartdata="chartData"
                :options="chartOptions"
              >
              </TotalDought>
            </div>
            <div class="col-md-2 mt-2">
              <TotalDought
                style="min-height: 110px; height: 110px; max-height: 110px; max-width: 100%;"
                :chartdata="chartDataTotal"
                :options="chartOptions"
              >
              </TotalDought>
            </div>
            <div class="col-md-2 mt-2">
              <TotalDought
                style="min-height: 110px; height: 110px; max-height: 110px; max-width: 100%;"
                :chartdata="chartDataRed"
                :options="chartOptions"
              >
              </TotalDought>
            </div>
            <div class="col-md-2 mt-2">
              <TotalDought
                style="min-height: 110px; height: 110px; max-height: 110px; max-width: 100%;"
                :chartdata="chartDataAmber"
                :options="chartOptions"
              >
              </TotalDought>
            </div>
            <div class="col-md-2 mt-2">
              <TotalDought
                style="min-height: 110px; height: 110px; max-height: 110px; max-width: 100%;"
                :chartdata="chartDataGreen"
                :options="chartOptions"
                :amount="unmetered"
              >
              </TotalDought>
            </div>
            <div class="col-md-2 mt-2">
              <TotalDought
                style="min-height: 110px; height: 110px; max-height: 110px; max-width: 100%;"
                :chartdata="chartDataGray"
                :options="chartOptions"
              >
              </TotalDought>
            </div>

          </div>
          <div class="card-body table-responsive p-0 ">
            <table class="table table-hover  table-sm">

              <tbody
                v-for="mode1 in reports"
                :key="mode1.id"
              >

                <th
                  colspan="8"
                  class="bg-primary"
                >
                  {{mode1.Name}}
                </th>
                <tr>
                  <th>Risk Event</th>
                  <th style="text-align:center">R.R</th>
                  <th>KRI</th>
                  <th>Frequency</th>
                  <th>Responsibilty</th>
                  <th>Value</th>
                  <th>Actions</th>
                  <th>Status</th>
                </tr>
                <tr
                  v-for="mode in mode1.riskRegisterData"
                  :key="mode.id"
                >

                  <td>
                    {{ mode.RiskName }}

                  </td>

                  <td
                    style="background-color:#ec0d0d"
                    v-if=" mode.ResidualValue >= 15"
                  >{{  mode.ResidualValue }}</td>

                  <td
                    style="background-color:#ffbf00"
                    v-else-if=" mode.ResidualValue > 4"
                  >{{  mode.ResidualValue }}</td>

                  <td
                    style="background-color:#09f17d"
                    v-else-if="mode.ResidualValue >0 && mode.ResidualValue <= 4 "
                  >{{  mode.ResidualValue }}</td>

                  <td v-else>{{  mode.ResidualValue }}</td>
                  <td>
                    {{mode.KRIitems}}
                  </td>

                  <td>
                    {{mode.Frequency}}
                  </td>

                  <td>
                    {{mode.Responsibility}}
                  </td>

                  <td
                    :class="{
                'bg-success': mode.color === 'bg-success',
                 'bg-danger': mode.color === 'bg-danger',
                  'bg-warning': mode.color === 'bg-warning',
                  }"
                    style="text-align:center"
                  >
                    {{mode.Value}}
                  </td>

                  <td>
                    {{mode.actionName}}
                  </td>

                  <td :class="{
                    'bg-success': mode.actionStatus === 'Completed',
                    'bg-blue': mode.actionStatus === 'Not Started (Not Due)',
                    'bg-danger': mode.actionStatus === 'Not Started (Overdue)',
                    'bg-yellow': mode.actionStatus === 'WIP (On Course)',
                    'bg-warning': mode.actionStatus === 'WIP (Overdue)',
                    'bg-gray': mode.actionStatus === 'Deffered',
                    }"
                    style="text-align:center"
                    >
                    {{mode.actionStatus}}
                  </td>

                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <!-- /.card -->
      </div>
    </div>
  </div>
</template>

<script>
import TotalDought from '../../../charts/kri-reports/Doughnut'
export default {
  data() {
    return {
      reports: [],
      unmetered: 90,
      chartData: {
        datasets: [
          {
            borderWidth: 1,
            borderColor: ['rgba(75, 192, 192, 1)'],
            backgroundColor: ['rgba(67, 153, 104, 0.8)'],
            data: [1000]
          }
        ],
        labels: ['No. Risks']
      },

      chartDataTotal: {
        datasets: [
          {
            borderWidth: 1,
            borderColor: ['rgba(75, 192, 192, 1)'],
            backgroundColor: ['rgba(67, 153, 104, 0.8)'],
            data: [1000]
          }
        ],
        labels: ['Total KRIs']
      },
      chartDataRed: {
        datasets: [
          {
            borderWidth: 2,
            borderColor: ['rgba(75, 192, 192, 1)'],
            backgroundColor: ['rgba(255,0,0, 0.8)'],
            data: [1000, 30]
          }
        ],
        labels: ['Red']
      },

      chartDataAmber: {
        datasets: [
          {
            borderWidth: 2,
            borderColor: ['rgba(75, 192, 192, 1)'],
            backgroundColor: ['rgba(255,191,0,0.8)'],
            data: [1000, 30]
          }
        ],
        labels: ['Amber KRIs']
      },

      chartDataGreen: {
        datasets: [
          {
            borderWidth: 2,
            borderColor: ['rgba(75, 192, 192, 1)'],
            backgroundColor: ['rgba(0,255,0,0.8)'],
            data: [1000, 30]
          }
        ],
        labels: ['Green KRIs']
      },

      chartDataGray: {
        datasets: [
          {
            borderWidth: 2,
            borderColor: ['rgba(75, 192, 192, 1)'],
            backgroundColor: ['rgba(128,128,128,0.8)'],
            data: [1000, 30]
          }
        ],
        labels: ['Un-metered KRIs']
      },

      chartOptions: {
        legend: {
          display: true
        },
        responsive: true,
        maintainAspectRatio: false
      }
    }
  },
  components: {
    TotalDought
  },
  methods: {
    loadKRIRegisterData() {
      axios
        .get('/api/reports/kri-register')
        .then((res) => {
          if (res.data.ResultCode == 1200) {
            this.reports = res.data.ResponseData
          } else {
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
    },

    loadKRIRegisterSummary() {
      axios
        .get('/api/reports/kri-register-summary')
        .then((res) => {
          if (res.data.ResultCode == 1200) {
            localStorage.removeItem('kriSummary')
            localStorage.setItem('kriSummary', JSON.stringify(res.data.ResponseData))
          } else {
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
    this.loadKRIRegisterData()
    this.loadKRIRegisterSummary()
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
