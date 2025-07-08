<template>
  <div class="card">
    <div class="card-header">
      <h3 class="card-title"> Details</h3>
      <div class="card-tools">
        <button
          class="btn btn-info btn-sm"
          @click="GoBack"
        >
          <i class="fas fa-angle-double-left"></i>
          Back
        </button>
      </div>
    </div>
    <div class="card-body ">
      <form @submit.prevent="createData()">
        <div class="modal-body">
          <div class="form-row">

            <div class="form-group col-md-6">
              <label for>Name</label>
              <textarea
                rows="2"
                v-model="this.kris.Name"
                placeholder="Name"
                readonly
                class="form-control"
              ></textarea>
              <has-error
                :form="form"
                field="description"
              ></has-error>
            </div>

            <div class="form-group col-md-6">
              <label for>Description</label>
              <textarea
                rows="2"
                v-model="form.description"
                placeholder="Description"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('message') }"
              ></textarea>
              <has-error
                :form="form"
                field="description"
              ></has-error>
            </div>
          </div>
          <hr>
          <div class="form-row">
            <div
              class="form-group col-md-12"
              v-if="this.form.isCompliance == 0"
            >
              <label for>Number Value</label>
              <input
                v-model="form.Value"
                type="number"
                name="name"
                @keyup="valueChanged()"
                :style="{ 'background-color':bgColor }"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('Value') }"
              />
              <has-error
                :form="form"
                field="Name"
              ></has-error>
              </br>
              <p>Lowe Limit : {{this.kris.LowerLimit}} - Green/Amber Crossover : {{this.kris.GreenAmber}}-

                Amber/Red Crossover : {{this.kris.AmberRed}} - Upper Limit : {{this.kris.UpperLimit}}
              </p>
            </div>
            <div
              class="form-group col-md-12"
              v-if="this.form.isCompliance == 1"
            >
              <label for>Value</label>
              <select
                type="number"
                v-model="form.Value"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('Statuss') }"
              >
                <option value="0">Yes</option>
                <option value="1">No</option>
              </select>
            </div>
            <div class="form-group col-md-12">
              <label for>Description</label>
              <textarea
                rows="3"
                v-model="form.desc"
                placeholder="Description"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('message') }"
              ></textarea>
              <has-error
                :form="form"
                field="description"
              ></has-error>
            </div>
          </div>
        </div>
        <div class="modal-footer">

          <button
            type="submit"
            class="btn btn-primary"
          >
            Save
          </button>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      id: null,
      showincome: false,
      editmode: false,
      projects: {},
      kris: {},
      bgColor: '',
      form: new Form({
        id: '',
        Name: '',
        description: '',
        Weight: '',
        Frequency: '',
        StartDate: '',
        ExpiredDate: '',
        DataType: '',
        Value: '',
        desc: ''
      })
    }
  },
  methods: {
    loadDetails() {
      axios.get('/api/kris-compliance/' + localStorage.kricompliance_id).then((res) => {
        this.kris = res.data.ResponseData
        this.form.Value = res.data.ResponseData.kri1.Value
        this.form.desc = res.data.ResponseData.kri1.desc
        this.form.description = res.data.ResponseData.description
      })
    },
    createData() {
      this.$Progress.start()
      this.form
        .post('/api/record-kris-compliance')
        .then((res) => {
          if (res.data.ResultCode == 1200) {
            $('#addNew').modal('hide')
            Fire.$emit('AfterCreate')
            toast.fire({
              type: 'success',
              title: 'Created successfully'
            })
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
    valueChanged() {
      if (this.form.Value <= this.kris.GreenAmber) {
        this.bgColor = 'green'
      }

      if (this.form.Value > this.kris.GreenAmber && this.form.Value <= this.kris.AmberRed) {
        this.bgColor = 'yellow'
      }

      if (this.form.Value > this.kris.AmberRed) {
        this.bgColor = 'red'
      }
    },
    GoBack() {
      this.$router.back()
    }
  },
  created() {
    this.form.id = localStorage.kricompliance_id
    this.form.isCompliance = localStorage.isCompliance
    this.loadDetails()
    this.valueChanged()
  }
}
</script>
