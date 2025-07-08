<template>
  <div>
    <div class="row mt-2">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Strategic Plan Matrix</h3>
            <div class="card-tools">
              <a
                href="/export/strategic/register"
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
                  <th>Objective</th>
                  <th>KPI</th>
                  <th>Target</th>
                  <th>Initiative</th>
                  <th>Desired Output</th>
                  <th>Responsible</th>
                  <th>Actual Output</th>
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
                    {{ mode.KPI }}

                  </td>

                  <td>
                    {{mode.Target}}
                  </td>
                  <td>{{mode.Initiative}}</td>
                  <td>{{mode.Output}}</td>
                  <td>{{mode.Responsible}}</td>
                  <td>{{mode.ActualOutput}}</td>
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
        .get('/api/reports/strategic-register')
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
