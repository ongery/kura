<template>

    <div class="card">
        <!-- <div class="card-header">
          <h3 class="card-title">Key Risk Indicators Register</h3>
          <div class="card-tools">
            <a
              href="/export/kri/register"
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


</template>

<script>

export default {

    name:'KeyRiskIndicatorsRegisterContent',
    props:['reports'],

}



</script>