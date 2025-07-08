<template>
  <div class=" row mt-2">
    
    <CorruptionRiskToolbar :title="this.RName"></CorruptionRiskToolbar>

    <!-- <div class="card-header">
      <h3 class="card-title">
        <b>{{ this.RName }}</b>
      </h3>
      <div class="card-tools">
        <button
          class="btn btn-info btn-sm"
          @click="GoBack"
        >
          <i class="fas fa-angle-double-left"></i>
          Close
        </button>
      </div>
    </div> -->
    <!-- /.card-header -->


        
  
       
    <div class="card-body p-0">
      <div>
        <form @submit.prevent="updateAnalzeRisk()">

          <div class="modal-body">
            
            <div class="form-row">
              <nav class="nav nav-tabs">

                <a
                  href="#"
                  class="nav-item nav-link"
                  @click.prevent="showLevelOne"
                >Risk Methods</a>
                <a
                  href="#"
                  class="nav-item nav-link"
                  @click.prevent="showCurrentControls"
                >Current Controls</a>
                <a
                  href="#"
                  class="nav-item nav-link"
                  @click.prevent="showRiskEffects"
                >Risk Impacts</a>

                <a
                  href="#"
                  class="nav-item nav-link"
                  @click.prevent="showResidualRiskLevel"
                >Risk Level</a>

                <a
                  href="#"
                  class="nav-item nav-link"
                  @click.prevent="showTreatment"
                >Corruption Prevention Strategy</a>
              </nav>
            </div>

            <RiskMethods v-if="showlevelone"></RiskMethods>
            <CurrentControl v-if="showcontrols"></CurrentControl>
            <RiskCause v-if="showcauses"></RiskCause>
            <RiskImpact v-if="showeffects"></RiskImpact>

            <!-- start:Inherent Consequence Scale -->
            <div
              class="card form-row"
              v-if="showrisklevels"
            >
            
              <!-- begin:card -->
              <div class="card mb-5 mt-2">

                <!-- begin:card-header -->
                <div class="card-header">
                  <h3 class="card-title">Inherent Consequence Scale</h3>
                </div>
                <!-- end:card-header -->

              </div>
              <!-- end:card-->


              <!-- Inherent Likelihood Scale -->
              <div class="card form-group mt-1">

                  <!--begin::Input group-->
                  <div class="card mb-5 p-8 m-1"  >
            
                    <!-- <div class="card-header"> -->
                      <span class="pb-3" style="font-size:medium">Inherent Likelihood Scale</span>
                    <!-- </div> -->
                    <!-- end:card-header -->

                    <!--end::Select-->
                    <select
                      class="form-control"
                      v-model="form.InherentLikelihoodScale"
                      name="CategoryID"
                      :class="{
                        'is-invalid': form.errors.has('InherentLikelihoodScale'),
                      }"
                    >
                      <option
                        v-for="val in likelihoodscales"
                        :value="val.id"
                        :key="val.id"
                      >
                        {{ val.Base + "-" + val.Name }}
                      </option>
                    </select>
                    <has-error
                      :form="form"
                      field="InherentLikelihoodScale"
                    ></has-error>
                    <!--end::Select-->

                  </div>
                  <!--end::Input group-->


              </div>



              <!--begin::Row-->
              <div class="row card p-12 m-1">

                <table class="table  table-hover table-sm col-md-12">

                <!-- <table class="table table-bordered table-hover table-sm  mt-2"> -->
                  <!-- <thead class="thead-light">
                    <tr>
                      <td colspan="2"><b>Inherent Consequence Scale</b></td>
                    </tr>
                    <tr>
                      <th>Name</th>
                      <th></th>
                    </tr>
                  </thead> -->

                  <tbody>
                    <tr
                      v-for="mode in scalesgroup"
                      :key="mode.id"
                    >
                      <td>{{ mode.item.Name }}</td>
                      <td>
                        <select
                          class="form-control"
                          v-model="mode.i_t_m_1_id"
                          name="CategoryID"
                        >
                          <option
                            v-for="val in mode.item.itm1"
                            :value="val.id"
                            :key="val.id"
                          >
                            {{ val.Base + "-" + val.Name }}
                          </option>
                        </select>
                      </td>
                    </tr>
                  </tbody>

                </table>

              </div>


              <!-- <div class="form-group col-md-4 mt-1">
                <label>Inherent Likelihood Scale</label>
                <select
                  class="form-control"
                  v-model="form.InherentLikelihoodScale"
                  name="CategoryID"
                  :class="{
                    'is-invalid': form.errors.has('InherentLikelihoodScale'),
                  }"
                >
                  <option
                    v-for="val in likelihoodscales"
                    :value="val.id"
                    :key="val.id"
                  >
                    {{ val.Base + "-" + val.Name }}
                  </option>
                </select>
                <has-error
                  :form="form"
                  field="InherentLikelihoodScale"
                ></has-error>
              </div> -->


            </div>
            <!-- end: Inherent Consequence Scale -->

            <!-- start:Residual Consequence Scale -->
            <div
              class="form-row"
              v-if="showresidualrisklevel"
            >


              <!-- begin:card -->
              <div class="card mb-5 mt-2">

                <!-- begin:card-header -->
                <div class="card-header">
                  <h3 class="card-title">Residual Consequence Scale</h3>
                </div>
                <!-- end:card-header -->

              </div>
              <!-- end:card-->


              <!-- Residual Likelihood Scale -->
              <div class="card form-group mt-1">

                  <!--begin::Input group-->
                  <div class="card mb-5 p-8 m-1"  >
            
                    <!-- <div class="card-header"> -->
                      <span class="pb-3" style="font-size:medium">Residual Likelihood Scale</span>
                    <!-- </div> -->
                    <!-- end:card-header -->

                    <!--end::Select-->
                    <select
                      class="form-control"
                      v-model="form.ResidualLikelihoodScale"
                      name="CategoryID"
                      :class="{
                        'is-invalid': form.errors.has('ResidualLikelihoodScale'),
                      }"
                    >
                      <option
                        v-for="val in likelihoodscales"
                        :value="val.id"
                        :key="val.id"
                      >
                        {{ val.Base + "-" + val.Name }}
                      </option>
                    </select>
                    <has-error
                      :form="form"
                      field="ResidualLikelihoodScale"
                    ></has-error>
                    <!--end::Select-->

                  </div>
                  <!--end::Input group-->


              </div>


              <!--begin::Row-->
              <div class="row card p-12 m-1">

                <table class="table  table-hover table-sm col-md-12">

                  <tbody>
                    <tr
                      v-for="mode in scalesgroupResidual"
                      :key="mode.id"
                    >
                      <td>{{ mode.item.Name }}</td>
                      <td>
                        <select
                          class="form-control"
                          v-model="mode.i_t_m_1_id"
                          name="CategoryID"
                        >
                          <option
                            v-for="val in mode.item.itm1"
                            :value="val.id"
                            :key="val.id"
                          >
                            {{ val.Base + "-" + val.Name }}
                          </option>
                        </select>
                      </td>
                    </tr>
                  </tbody>
                  
                </table>
                <!--begin::Col-->
            
              </div>
              <!--end::Row-->



              <!-- <div class="form-group col-md-6 mt-1">

                <table class="table table-bordered table-hover table-sm col-md-12 mt-2">
                  <thead class="thead-light"> -->
                    <!-- <tr>
                      <td colspan="2"><b>Residual Consequence Scale</b></td>
                    </tr> -->
                    <!-- <tr>
                      <th>Name</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr
                      v-for="mode in scalesgroupResidual"
                      :key="mode.id"
                    >
                      <td>{{ mode.item.Name }}</td>
                      <td>
                        <select
                          class="form-control"
                          v-model="mode.i_t_m_1_id"
                          name="CategoryID"
                        >
                          <option
                            v-for="val in mode.item.itm1"
                            :value="val.id"
                            :key="val.id"
                          >
                            {{ val.Base + "-" + val.Name }}
                          </option>
                        </select>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div> -->

<!-- 
              <div class="form-group col-md-4 mt-1">
                <label>Residual Likelihood Scale</label>
                <select
                  class="form-control"
                  v-model="form.ResidualLikelihoodScale"
                  name="CategoryID"
                  :class="{
                    'is-invalid': form.errors.has('ResidualLikelihoodScale'),
                  }"
                >
                  <option
                    v-for="val in likelihoodscales"
                    :value="val.id"
                    :key="val.id"
                  >
                    {{ val.Base + "-" + val.Name }}
                  </option>
                </select>
                <has-error
                  :form="form"
                  field="ResidualLikelihoodScale"
                ></has-error>
              </div> -->

            </div>
            <!-- end:Residual Consequence Scale -->

            <CreateAction v-if="showtreatment"></CreateAction>

          </div>

          <div class="modal-footer mt-5">
            <button
              type="submit"
              class="btn btn-success"
            >Update</button>
          </div>
        </form>
      </div>
    </div>
    
  </div>
</template>
<script>
import Datepicker from 'vuejs-datepicker'
import CreateAction from './Actionindex.vue'
import RiskMethods from './RiskProfile/RiskMethods'
import RiskCause from './RiskProfile/RiskCauses'
import RiskImpact from './RiskProfile/RiskImpacts'
import CurrentControl from './RiskProfile/CurrentControl'
import KRIs from './RiskProfile/kris'
import Compliance from './RiskProfile/compliance'
import CorruptionRiskToolbar from './components/CorruptionRiskToolbar.vue'
export default {
  data() {
    return {
      riskcauses: {},
      showlevelone: false,
      showcauses: false,
      showcontrols: false,
      showeffects: false,
      showtreatment: false,
      showrisklevels: false,
      showresidualrisklevel: false,
      showkris: false,
      showcompliance: false,
      alldata: {},
      riskevents: {},
      riskcauses: {},
      riskeffects: {},
      risk: {},
      likelihoodscales: {},
      consequencescale: {},
      scalesgroup: {},
      scalesgroupResidual: {},
      controlitems: {},
      alltreament: {},
      BName: '',
      RName: '',
      form: new Form({
        id: '',
        Name: '',
        o_i_t_m_id: '',
        ObjType: 12,
        DateIdentified: '',
        RiskCauseDescription: '',
        RiskEffectsDescription: '',
        RiskStatus: '',
        created_at: '',
        Status: '',
        isSelected: '',

        InherentLikelihoodScale: '',
        ResidualLikelihoodScale: '',
        ResidualConsequenceScale: '',
        scalesgroup: {},
        scalesgroupResidual: {}
      }),
      state: {
        disabledDates: {
          from: new Date()
        }
      }
    }
  },
  components: {
    Datepicker,
    RiskCause,
    RiskImpact,
    CurrentControl,
    RiskMethods,
    KRIs,
    Compliance,
    CreateAction,
    CorruptionRiskToolbar
  },
  methods: {
    CountChecked(mode) {
      var isSelected = mode.isSelected
      axios
        .get('/api/syncRelationship', {
          params: {
            RiskID: localStorage.risk_id,
            ItemID: mode.id,
            isSelected: isSelected,
            ObjType: mode.ObjType
          }
        })
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
    loadCausesEffects() {
      axios
        .get('/api/getCausesEffects', {
          params: {
            RiskID: localStorage.risk_id
          }
        })
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
    loadLikelihoodScale() {
      axios
        .get('/api/likeLihoodScale')
        .then((res) => {
          if (res.data.ResultCode == 1200) {
            this.likelihoodscales = res.data.ResponseData
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
    updateAnalzeRisk() {
      this.form.scalesgroup = this.scalesgroup
      this.form.scalesgroupResidual = this.scalesgroupResidual
      this.$Progress.start()
      this.form
        .post('/api/updateAnalzeRisk')
        .then(() => {
          $('#addNew').modal('hide')
          swal.fire('Updated!', 'Information has been updated.', 'success')
          this.$Progress.finish()
          Fire.$emit('AfterCreate')
        })
        .catch(() => {
          this.$Progress.fail()
        })
    },
    loadConsequenceScale() {
      axios
        .get('/api/loadConsequenceScale')
        .then((res) => {
          if (res.data.ResultCode == 1200) {
            this.consequencescale = res.data.ResponseData
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
    showLevelOne() {
      this.showlevelone = true
      this.showcauses = false
      this.showcontrols = false
      this.showeffects = false
      this.showrisklevels = false
      this.showresidualrisklevel = false
      this.showtreatment = false
      this.showkris = false
      this.showcompliance = false
    },
    showRiskCauses() {//goes nowhere
      this.showlevelone = false
      this.showcauses = true
      this.showcontrols = false
      this.showeffects = false
      this.showrisklevels = false
      this.showresidualrisklevel = false
      this.showtreatment = false
      this.showkris = false
      this.showcompliance = false
    },
    showRiskEffects() {
      this.showlevelone = false
      this.showcauses = false
      this.showcontrols = false
      this.showeffects = true
      this.showrisklevels = false
      this.showresidualrisklevel = false
      this.showtreatment = false
      this.showkris = false
      this.showcompliance = false
    },
    showCurrentControls() {
      this.showlevelone = false
      this.showcauses = false
      this.showcontrols = true
      this.showeffects = false
      this.showrisklevels = false
      this.showresidualrisklevel = false
      this.showtreatment = false
      this.showkris = false
      this.showcompliance = false
    },
    showRiskLevel() {
      this.showlevelone = false
      this.showcauses = false
      this.showcontrols = false
      this.showeffects = false
      this.showrisklevels = true
      this.showresidualrisklevel = false
      this.showtreatment = false
      this.showkris = false
      this.showcompliance = false
    },
    showResidualRiskLevel() {
      this.showlevelone = false
      this.showcauses = false
      this.showcontrols = false
      this.showeffects = false
      this.showrisklevels = false
      this.showresidualrisklevel = true
      this.showtreatment = false
      this.showkris = false
      this.showcompliance = false
    },
    showTreatment() {
      this.showlevelone = false
      this.showcauses = false
      this.showcontrols = false
      this.showeffects = false
      this.showrisklevels = false
      this.showresidualrisklevel = false
      this.showtreatment = true
      this.showkris = false
      this.showcompliance = false
    },

    showKRIs() {
      this.showlevelone = false
      this.showcauses = false
      this.showcontrols = false
      this.showeffects = false
      this.showrisklevels = false
      this.showresidualrisklevel = false
      this.showtreatment = false
      this.showkris = true
      this.showcompliance = false
    },
    showCompliance() {
      this.showlevelone = false
      this.showcauses = false
      this.showcontrols = false
      this.showeffects = false
      this.showrisklevels = false
      this.showresidualrisklevel = false
      this.showtreatment = false
      this.showkris = false
      this.showcompliance = true
    },
    showMitigation() {},
    loadRisk() {
      axios.get('/api/risks/' + localStorage.risk_id).then((res) => {
        this.form.fill(res.data.ResponseData)
        this.RName = res.data.ResponseData.item.Name
        this.scalesgroup = res.data.ResponseData.scalesgroup
        this.scalesgroupResidual = res.data.ResponseData.scalesgroupresidual
      })
    },

    newModal() {
      this.editmode = false
      this.form.reset()
      $('#addNew').modal('show')
    },
    loadRiskEvents() {
      axios
        .get('/api/risklibrarysetup', {
          params: {
            ObjType: 22
          }
        })
        .then((res) => {
          if (res.data.ResultCode == 1200) {
            this.riskevents = res.data.ResponseData.data
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
    GoBack() {
      this.$router.back()
    }
  },
  created() {
    this.showcauses = true
    this.loadCausesEffects()
    this.loadRisk()
    this.loadLikelihoodScale()
    this.loadConsequenceScale()
    this.showTreatment()
    this.loadRiskEvents(),
      Fire.$on('AfterCreate', () => {
        this.loadRisk()
      })
  }
}
</script>
