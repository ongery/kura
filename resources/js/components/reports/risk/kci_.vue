<template>
  <div>
    <div class="row mt-2">
      
      
      <div>
            <RiskToolbar :title="'Key Control Indicators Register'" ></RiskToolbar>
          </div>
          
      <div class="col-md-12">
        
        
       

        <div class="card">
          
          <!-- /.card-header -->

          <div class="row mb-2">
            <div class="col-md-3 mt-2">
              <TotalDought
                style="min-height: 150px; height: 150px; max-height: 150px; max-width: 100%;"
                :chartdata="chartData"
                :options="chartOptions"
              >
              </TotalDought>
            </div>

            <div class="col-md-2 mt-2">
              <TotalDought
                style="min-height: 150px; height: 150px; max-height: 150px; max-width: 100%;"
                :chartdata="chartDataKCI"
                :options="chartOptions"
              >
              </TotalDought>
            </div>
            <div class="col-md-2 mt-2 mrl-1">
              <TotalDought
                style="min-height: 150px; height: 150px; max-height: 150px; max-width: 100%;"
                :chartdata="chartDataRed"
                :options="chartOptions"
              >
              </TotalDought>
            </div>
            <div class="col-md-2 mt-2">
              <TotalDought
                style="min-height: 150px; height: 150px; max-height: 150px; max-width: 100%;"
                :chartdata="chartDataGreen"
                :options="chartOptions"
              >
              </TotalDought>
            </div>
            <div class="col-md-2 mt-2">
              <TotalDought
                style="min-height: 150px; height: 150px; max-height: 150px; max-width: 100%;"
                :chartdata="chartDataGray"
                :options="chartOptions"
              >
              </TotalDought>
            </div>

          </div>

          <div class="card-body table-responsive p-0">
            <table class="table table-hover  table-sm">
              <thead class="thead-light">

              </thead>
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
                  <th>KCI</th>
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

                  <td>
                    {{mode.ResidualValue}}
                  </td>

                  <td>
                    {{mode.KRIitems}}
                  </td>

                  <td>
                    {{mode.Frequency}}
                  </td>

                  <td>
                    {{mode.Responsibility}}
                  </td>

                  <td>
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
import TotalDought from '../../../charts/kri-reports/KCIDoughnut'
export default {
  data() {
    return {
      reports: [],
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
      chartDataKCI: {
        datasets: [
          {
            borderWidth: 1,
            borderColor: ['rgba(75, 192, 192, 1)'],
            backgroundColor: ['rgba(67, 153, 104, 0.8)'],
            data: [1000]
          }
        ],
        labels: ['# KCI']
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
        labels: ['RED KCIs']
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
        labels: ['Green KCIs']
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
        labels: ['Un-Attested']
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
    summaryReport() {
      axios
        .get('/api/reports/kci-register')
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
    },
    loadKRIRegisterSummary() {
      axios
        .get('/api/reports/kci-register-summary')
        .then((res) => {
          if (res.data.ResultCode == 1200) {
            localStorage.removeItem('kciSummary')
            localStorage.setItem('kciSummary', JSON.stringify(res.data.ResponseData))
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
    this.summaryReport()
    this.loadKRIRegisterSummary()
  }
}
</script>
