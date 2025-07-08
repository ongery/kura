<template>
  <div class="card row mt-2">
    <div class="card-header">
      <h3 class="card-title">
        MAIN RISK ANALYSIS
      </h3>
    </div>

    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
      <div>
        <form @submit.prevent="saveRisk()">
          <div class="modal-body">
            <div class="form-row">

              <div class="form-group col-md-6">
                <label>Risk Event</label>
                <select
                  class="form-control"
                  v-model="form.o_i_t_m_id"
                  name="o_i_t_m_id"
                  :class="{ 'is-invalid': form.errors.has('o_i_t_m_id') }"
                >
                  <option
                    v-for="val in riskevents"
                    :value="val.id"
                    :key="val.id"
                  >
                    {{ val.Name }}
                  </option>
                </select>
                <has-error
                  :form="form"
                  field="o_i_t_m_id"
                ></has-error>
              </div>
            </div>
            <div class="form-row">
              <nav class="nav nav-tabs">
                <a
                  href="#"
                  class="nav-item nav-link"
                  @click.prevent="showRiskCauses"
                >Risks Level 1</a>
                <a
                  href="#"
                  class="nav-item nav-link"
                  @click.prevent="showRiskEffects"
                >Risk Impacts</a>
                <a
                  href="#"
                  class="nav-item nav-link"
                  @click.prevent="showRiskLevel"
                >Inherent Risk Level</a>
                <a
                  href="#"
                  class="nav-item nav-link"
                  @click.prevent="showCurrentControls"
                >Current Controls</a>
                <a
                  href="#"
                  class="nav-item nav-link"
                  @click.prevent="showResidualRiskLevel"
                >Residual Risk Level</a>
                <a
                  href="#"
                  class="nav-item nav-link"
                  @click.prevent="showTreatment"
                >Treatment</a>
              </nav>
            </div>

          </div>

          <div class="modal-footer">
            <button
              type="submit"
              class="btn btn-success"
            >Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>
<script>
import Datepicker from 'vuejs-datepicker'
import CreateAction from './Actionindex.vue'
export default {
  data() {
    return {
      reports: {},
      editmode: true,
      ObjType: 22,
      BName: '',
      riskevents: {},
      form: new Form({
        id: '',
        o_i_t_m_id: '',
        ObjType: 23
      })
    }
  },
  components: {
    Datepicker,
    CreateAction
  },
  methods: {
    loadData() {
      axios
        .get('/api/risklibrarysetup', {
          params: {
            ObjType: this.ObjType
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
    showRiskCauses() {
      toast.fire({
        type: 'error',
        title: 'Select Risk Event and Click Save First'
      })
    },
    showRiskEffects() {
      toast.fire({
        type: 'error',
        title: 'Select Risk Event and Click Save First'
      })
    },
    showCurrentControls() {
      toast.fire({
        type: 'error',
        title: 'Select Risk Event and Click Save First'
      })
    },
    showRiskLevel() {
      toast.fire({
        type: 'error',
        title: 'Select Risk Event and Click Save First'
      })
    },
    showResidualRiskLevel() {
      toast.fire({
        type: 'error',
        title: 'Select Risk Event and Click Save First'
      })
    },
    showTreatment() {
      toast.fire({
        type: 'error',
        title: 'Select Risk Event and Click Save First'
      })
    },
    saveRisk() {
      this.$Progress.start()
      this.form
        .post('/api/risks')
        .then((res) => {
          if (res.data.ResultCode == 1200) {
            this.$Progress.finish()
            swal.fire('Created!', 'Saved Successfully Created.', 'success')
            localStorage.clear()
            localStorage.setItem('risk_id', res.data.ResponseData)
            this.$router.push({ name: 'AnalyseMailRiskProfile' })
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
    }
  },
  created() {
    this.loadData()
  }
}
</script>
