<template>
  <div>
    <div class="row mt-2">

    
      <div class="col-md-12">

        <RiskToolbar :title="'Action Register'"></RiskToolbar>


        <div class="card">
          <!-- <div class="card-header">
            <h3 class="card-title">Action Register</h3>
            <div class="card-tools">
              <a
                href="/export/action/register"
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
                v-for="mode1 in reports"
                :key="mode1.id"
              >

                <th
                  colspan="5"
                  class="bg-primary"
                >
                  {{mode1.Name}}
                </th>

                <tr>
                  <th>RE Name</th>
                  <th style="text-align:center">Treatment Plan</th>
                  <th>Category</th>
                  <th>Ranking</th>
                  <th>Status</th>
                </tr>

                <tr
                  v-for="mode in mode1.actionData"
                  :key="mode.id"
                >

                  <td>
                    {{ mode.RiskName }}

                  </td>

                  <td>
                    {{mode.TreatmentPlan}}
                  </td>

                  <td>
                    {{mode.Category}}
                  </td>

                  <td>
                    {{mode.Ranking}}
                  </td>

                  <td
                    :class="{
                'bg-success': mode.color === 'bg-success',
                 'bg-danger': mode.color === 'bg-danger',
                  'bg-warning': mode.color === 'bg-warning',
                   'bg-blue': mode.color === 'bg-blue',
                    'bg-yellow': mode.color === 'bg-yellow',
                    'bg-white': mode.color === 'bg-white',
                     'bg-bg-warning': mode.color === 'bg-warning',

                  }"
                    style="text-align:center"
                  >
                    {{mode.Status}}
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

// import RiskToolbar from './components/RiskToolbar.vue'
import RiskToolbar from './components/items/RiskToolbar.vue'

import ActionOverview from './components/Action/ActionOverview.vue'
import ActionRegContent from './components/Action/ActionRegContent.vue'


export default {
  data() {
    return {
      reports: []
    }
  },
  methods: {
    summaryReport() {
      axios
        .get('/api/reports/action-register')
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
  components:{RiskToolbar, ActionRegContent, ActionOverview},
  created() {
    this.summaryReport()
  }
}
</script>
