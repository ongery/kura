<template>
  <div>
    <div class="row mt-2">
      
      <RiskToolbar :title="'Incident Register'" ></RiskToolbar>

       
      <div class="col-md-12">

     
        <div class="card">
         
          <div class="card-body table-responsive p-0">
            <table class="table table-hover  table-sm">
              <thead class="thead-light">
                <tr>
                  <th>Name</th>
                  <th>Description</th>
                  <th>Date Incidence Reported</th>
                  <th>Date Incidence Occurred</th>
                  <th>Related Risk Event</th>
                  <th>Action</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>

                <tr
                  v-for="mode in this.reports"
                  :key="mode.id"
                >

                  <td>
                    {{ mode.Title }}

                  </td>

                  <td>
                    {{mode.Description}}
                  </td>

                  <td>
                    {{mode.IncidentReportOn}}
                  </td>

                  <td>
                    {{mode.IncidentDate}}
                  </td>

                  <td>

                  </td>

                  
                  <td>

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
export default {
  data() {
    return {
      reports: []
    }
  },
  methods: {
    summaryReport() {
      axios
        .get('/api/reports/incident-register')
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
