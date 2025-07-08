<template>
  <div>
    <div class="row mt-2">

      
      <div class="col-md-12">

        <RiskToolbar :title="'QMS Register'"></RiskToolbar>


        <div class="card">
          <!-- <div class="card-header">
            <h3 class="card-title">QMS Register</h3>
            <div class="card-tools">
              <a
                href="/qms_register_export"
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

              <tbody
                v-for="mode1 in this.reports"
                :key="mode1.id"
              >

                <th
                  colspan="7"
                  class="bg-primary"
                >
                  {{mode1.Name}}
                </th>

                <tr>
                  <th>Procedure #</th>
                  <th>Title</th>

                  <th>Risk Event</th>
                  <th style="text-align:center">I.R</th>
                  <th style="text-align:center">R.R</th>
                  <th>Opportunites</th>
                </tr>
                <tr
                  v-for="mode in mode1.procedureData"
                  :key="mode.id"
                >

                  <td>
                    {{ mode.ProcedureNo }}

                  </td>

                  <td>
                    {{ mode.ProcedureTitle }}

                  </td>

                  <td>
                    {{ mode.RiskName }}

                  </td>

                  <td>
                    {{mode.InherentValue}}
                  </td>

                  <td>
                    {{mode.ResidualValue}}
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
        .get('/api/reports/qms-register')
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
