<template>
  <div class="card row mt-2">
    <div class="card-header">
      <h3 class="card-title">Report New Risk</h3>
      <div class="card-tools">
        <button
          class="btn btn-success btn-sm"
          @click="allPotentialRisks"
        >
          All Potential Risks
        </button>
      </div>
    </div>

    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
      <div>
        <form @submit.prevent="createRisk()">
          <div class="modal-body">
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for>Date Identified</label>
                <datepicker
                  :bootstrap-styling="true"
                  v-model="form.DateIdentified"
                  :disabledDates="state.disabledDates"
                  :class="{
                                        'is-invalid': form.errors.has(
                                            'DateIdentified'
                                        )
                                    }"
                  name="fromWhen"
                >
                  <div
                    slot="beforeCalendarHeader"
                    class="calender-header"
                    style="text-align: center; color: red"
                  ></div>
                </datepicker>
              </div>

              <div class="form-group col-md-8">
                <label for>Potential Risk</label>
                <input
                  v-model="form.Name"
                  type="text"
                  placeholder="Name"
                  name="Name"
                  class="form-control"
                  :class="{
                                        'is-invalid': form.errors.has('Name')
                                    }"
                />
              </div>
            </div>
            <div class="form-row">
              <nav class="nav nav-tabs">
                <a
                  href="#"
                  class="nav-item nav-link"
                  @click.prevent="showRiskCauses"
                >Risk Sources</a>
                <a
                  href="#"
                  class="nav-item nav-link"
                  @click.prevent="showRiskEffects"
                >Risk Impacts</a>
                <a
                  href="#"
                  class="nav-item nav-link"
                  @click.prevent="showRiskCollectiveActions"
                >Corrective Action(s)</a>
              </nav>
            </div>
            <div
              class="form-row"
              v-if="showcauses"
            >
              <table class="table table-bordered table-hover table-sm col-md-6 mt-2">
                <thead class="thead-light">
                  <tr>
                    <th>Risk Sources</th>
                    <th>Name</th>
                  </tr>
                </thead>
                <tbody>
                  <tr
                    v-for="mode in riskcauses"
                    :key="mode.id"
                  >
                    <td>
                      <input
                        type="checkbox"
                        :value="mode.id"
                        @change="CountChecked()"
                        v-model="form.selectedCauses"
                      />
                    </td>
                    <td>{{ mode.Name }}</td>
                  </tr>
                </tbody>
              </table>

              <div class="form-group col-md-6">
                <label for>Risk Causes Description</label>
                <textarea
                  rows="2"
                  v-model="form.RiskCauseDescription"
                  placeholder="Risk Causes Description"
                  class="form-control"
                  :class="{
                                        'is-invalid': form.errors.has(
                                            'RiskCauseDescription'
                                        )
                                    }"
                ></textarea>
                <has-error
                  :form="form"
                  field="RiskCauseDescription"
                ></has-error>
              </div>
            </div>
            <div
              class="form-row"
              v-if="showeffects"
            >
              <table class="table table-bordered table-hover table-sm col-md-6 mt-2">
                <thead class="thead-light">
                  <tr>
                    <th>Risk Impacts</th>
                    <th>Name</th>
                  </tr>
                </thead>

                <tbody>
                  <tr
                    v-for="mode in riskeffects"
                    :key="mode.id"
                  >
                    <td>
                      <input
                        type="checkbox"
                        :value="mode.id"
                        @change="CountChecked()"
                        v-model="form.selectedImpacts"
                      />
                    </td>
                    <td>{{ mode.Name }}</td>
                  </tr>
                </tbody>
              </table>

              <div class="form-group col-md-6">
                <label for>Risk Effects Description</label>
                <textarea
                  rows="2"
                  v-model="form.RiskEffectsDescription"
                  placeholder="Description"
                  class="form-control"
                  :class="{
                                        'is-invalid': form.errors.has(
                                            'RiskEffectsDescription'
                                        )
                                    }"
                ></textarea>
                <has-error
                  :form="form"
                  field="RiskEffectsDescription"
                ></has-error>
              </div>
            </div>
            <div
              class="form-row"
              v-if="showactions"
            >
              <table class="table table-bordered table-hover table-sm col-md-6 mt-2">
                <thead class="thead-light">
                  <tr>
                    <th>Corrective Actions</th>
                    <th>Name</th>
                  </tr>
                </thead>
                <tbody>
                  <tr
                    v-for="mode in controlitems"
                    :key="mode.id"
                  >
                    <td>
                      <input
                        type="checkbox"
                        :value="mode.id"
                        @change="CountChecked()"
                        v-model="form.selectedActions"
                      />
                    </td>
                    <td>{{ mode.Name }}</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>

          <div class="modal-footer">
            <button
              type="submit"
              class="btn btn-success"
            >
              Save
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>
<script>
import Datepicker from 'vuejs-datepicker'
import moment from 'moment'
export default {
  data() {
    return {
      reports: {},

      showcauses: false,
      showactions: false,
      showeffects: false,
      alldata: {},
      effectsl: {},
      riskcauses: {},
      riskeffects: {},
      controlitems: {},
      form: new Form({
        id: '',
        Name: '',
        ObjType: 12,
        DateIdentified: '',
        RiskCauseDescription: '',
        RiskEffectsDescription: '',
        selectedCauses: [],
        selectedImpacts: [],
        selectedActions: []
      }),
      state: {
        disabledDates: {
          from: new Date()
        }
      }
    }
  },
  components: {
    Datepicker
  },
  methods: {
    loadCausesEffects() {
      axios
        .get('/api/getCausesEffects')
        .then((res) => {
          if (res.data.ResultCode == 1200) {
            this.riskcauses = res.data.ResponseData.causes
            this.riskeffects = res.data.ResponseData.effects
            this.controlitems = res.data.ResponseData.controlitems
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
    showRiskCauses() {
      this.showcauses = true
      this.showactions = false
      this.showeffects = false
    },
    showRiskEffects() {
      this.showcauses = false
      this.showactions = false
      this.showeffects = true
    },
    showRiskCollectiveActions() {
      this.showcauses = false
      this.showactions = true
      this.showeffects = false
    },

    /**
     * Creating Risk
     */
    createRisk() {
      this.form.DateIdentified = moment(this.form.DateIdentified).format('YYYY-MM-DD HH:mm')
      this.$Progress.start()
      this.form
        .post('/api/risks')
        .then((res) => {
          if (res.data.ResultCode == 1200) {
            this.form.reset()
            swal.fire('Created!', 'Risk Successfully Created.', 'success')
            this.$Progress.finish()
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

    allPotentialRisks() {
      this.$router.push({ name: 'AllPotentialRisks' })
    }
  },
  created() {
    this.showcauses = true
    this.loadCausesEffects()
  }
}
</script>
