<template>
  <div>

    <RiskRegContent :reports="reports"></RiskRegContent>

    <div class="card">
        
        <div class="card-body table-responsive p-0">
          <table class="table table-hover  table-sm">
            <!-- <thead class="thead-light">

            </thead> -->
            <tbody
              v-for="mode1 in reports"
              :key="mode1.id"
            >

              <th
                colspan="10"
                class="bg-primary"
              >
                {{mode1.Name}}
              </th>

              <tr class="thead-light">
                <th>Risk Event</th>
                <th>Risk Source</th>
                <th>Risk Impacts</th>
                <th style="text-align:center">I.R</th>
                <th>Current Controls</th>
                <th style="text-align:center">R.R</th>
                <th>key Control Indicators</th>
                <th>Key Risk Indicators</th>
                <th>Treatment Plans</th>
              </tr>
              <tr
                v-for="mode in mode1.riskRegisterData"
                :key="mode.id"
              >

                <td>
                  {{ mode.RiskName }}

                </td>

                <td>
                  {{mode.RiskSource}}
                </td>

                <td>
                  {{mode.RiskImpact}}
                </td>

                <td
                  style="background-color:#ec0d0d"
                  v-if="mode.InherentValue > 15"
                >{{ mode.InherentValue }}</td>

                <td
                  style="background-color:#ffbf00"
                  v-else-if="mode.InherentValue > 4"
                >{{ mode.InherentValue }}</td>

                <td
                  style="background-color:#09f17d"
                  v-else-if="mode.InherentValue >0 && mode.InherentValue <= 4 "
                >{{ mode.InherentValue }}</td>

                <td v-else>{{  mode.InherentValue}}</td>
                <td>
                  {{mode.ControlItems}}
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
</template>

<script>
  import RiskRegContent from './RiskRegContent.vue';


  export default {
      name:'RiskRegisterContent',
      props:['reports'],
  }

</script>