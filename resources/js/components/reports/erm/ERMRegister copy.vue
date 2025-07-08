<template>
  <div>
    <div class="row mt-2">
      <div class="col-md-12">

        <RiskToolbar :title="'ERM Register'"></RiskToolbar>


        <div class="card">
          <!-- <div class="card-header">
            <h3 class="card-title">ERM Register</h3>
            <div class="card-tools">
              <a
                href="/export/erm/register"
                target="_blank"
                class="btn btn-success btn-sm"
              >
                <i
                  class="fa fa-download"
                  aria-hidden="true"
                >Export to Excel</i>
              </a>
            </div>
          </div> -->

          <!-- /.card-header -->

          <div class="card-body table-responsive p-0">
            <table class="table table-hover  table-sm">
              <thead class="thead-light">
                <tr>
                  <th>Main Risk</th>
                  <th>I.R</th>
                  <th>R.R</th>
                  <th>Risk Event</th>
                  <th>Risk Source</th>
                  <th>Risk Impacts</th>
                  <th style="text-align:center">I.R</th>
                  <th>Current Controls</th>
                  <th style="text-align:center">R.R</th>
                  <th>K.C.I</th>
                  <th>K.R.I</th>
                  <th>Treatment Plans</th>
                </tr>
              </thead>
              <tbody>

                <tr
                  v-for="mode in this.reports"
                  :key="mode.id"
                >

                  <td>
                    {{ mode.MainRiskName }}

                  </td>

                  <td>
                    {{ mode.InherentValue }}

                  </td>

                  <td>
                    {{ mode.ResidualValue }}

                  </td>

                  <td>
                    {{ mode.RiskName }}

                  </td>

                  <td>
                    {{mode.RiskSource}}
                  </td>

                  <td>
                    {{mode.RiskImpact}}
                  </td>

                  <td>
                    {{mode.InherentValue1}}
                  </td>

                  <td>
                    {{mode.ControlItems}}
                  </td>

                  <td>
                    {{mode.ResidualValue1}}
                  </td>

                  <td>
                    {{mode.KCIitems}}
                  </td>

                  <td>
                    {{mode.KRIitems}}
                  </td>

                  <td>
                    {{mode.TreatmentsPlans}}
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

import RiskToolbar from './components/RiskToolbar.vue'

export default {

  data() {
    return {
      reports: []
    }
  },
  components:{RiskToolbar},
  methods: {
    summaryReport() {
      axios
        .get('/api/reports/erm-register')
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
