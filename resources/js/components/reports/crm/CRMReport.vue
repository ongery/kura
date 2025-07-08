<template>
  <div>
    <div class="row mt-2">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">CRM REPORT</h3>
            <div class="card-tools">
              <a
                href="/export/crm/report"
                target="_blank"
                class="btn btn-success btn-sm"
              >
                <i
                  class="fa fa-download"
                  aria-hidden="true"
                >Export to Excel</i>
              </a>
            </div>
          </div>

          <!-- /.card-header -->

          <div class="card-body table-responsive p-0">
            <table class="table table-bordered  table-sm">
              <thead class="thead-light">
                <tr>
                  <th rowspan="2">Corruption
                    Prone Area
                  </th>
                  <th colspan="2">Coruption Risk Areas</th>
                  <th rowspan="2">Corruption Prevention Strategies</th>
                  <th rowspan="2">Activities</th>
                  <th rowspan="2">Person</th>
                  <th rowspan="2">Budget</th>
                  <th rowspan="2">Time Frame</th>
                </tr>
                <tr>
                  <th>Risks</th>
                  <th>Causes</th>
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
                    {{ mode.RiskName }}

                  </td>
                  <td></td>
                  <td>
                    {{mode.TreatmentsPlans}}
                  </td>
                  <td>
                    {{mode.Activity}}
                  </td>
                  <td></td>
                  <td>{{mode.Budget}}</td>
                  <td>{{mode.TimeFrame}}</td>
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
export default {
  data() {
    return {
      reports: []
    }
  },
  methods: {
    summaryReport() {
      axios
        .get('/api/reports/crm-register')
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
