<template>
  <div>
    <div class="row mt-2">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Create Score Card</h3>
            <div class="card-tools">

              <!-- <button
                class="btn btn-success btn-sm"
                @click="newModal"
              >
                Baseline
                <i class="fas fa-plus"></i>
              </button> -->
              <router-link :to="{ name: 'Planning'}">
                <button class="btn btn-info btn-sm">
                  <i class="fas fa-angle-double-left"></i>
                  Go Back
                </button>
              </router-link>
            </div>
          </div>

          <!-- /.card-header -->
          <div class="card-body">
            <form @submit.prevent="createScoreCard()">
              <div class="modal-body">
                <div class="form-row">

                  <div class="form-group col-md-4">
                    <label>Strategic Pillar</label>
                    <select
                      class="form-control"
                      v-model="form.pillar"
                    >
                      <option
                        v-for="val in pillars"
                        :value="val.id"
                        :key="val.id"
                      >
                        {{ val.title }}
                      </option>
                    </select>
                  </div>

                  <div class="form-group col-md-4">
                    <label>Strategic Objective</label>
                    <select
                      class="form-control"
                      v-model="form.objective"
                    >
                      <option
                        v-for="val in objectives"
                        :value="val.id"
                        :key="val.id"
                      >
                        {{ val.description }}
                      </option>
                    </select>
                  </div>
                  <div class="form-group col-md-4">
                    <label for>Target</label>
                    <input
                      v-model="form.Target"
                      type="text"
                      placeholder="Target"
                      class="form-control"
                      :class="{ 'is-invalid': form.errors.has('Acronym') }"
                    />
                    <has-error
                      :form="form"
                      field="Acronym"
                    ></has-error>
                  </div>
                  <div class="form-group col-md-4">
                    <label for>Measure (KPI)</label>
                    <input
                      v-model="form.measure"
                      type="text"
                      name="name"
                      placeholder="Name"
                      class="form-control"
                      :class="{ 'is-invalid': form.errors.has('Name') }"
                    />
                    <has-error
                      :form="form"
                      field="Name"
                    ></has-error>
                  </div>

                  <div class="form-group col-md-4">
                    <label for>Priority</label>
                    <select
                      name="status"
                      v-model="form.priority"
                      id="type"
                      class="form-control"
                      :class="{ 'is-invalid': form.errors.has('priority') }"
                    >
                      <option value="L">Low</option>
                      <option value="M">Medium</option>
                      <option value="H">High</option>
                    </select>
                    <has-error
                      :form="form"
                      field="priority"
                    ></has-error>
                  </div>

                  <div class="form-group col-md-4">
                    <label for>Indicator</label>
                    <select
                      name="status"
                      v-model="form.indicator"
                      id="type"
                      class="form-control"
                      :class="{ 'is-invalid': form.errors.has('indicator') }"
                    >
                      <option value="0">Percentage</option>
                      <option value="1">Number</option>
                      <option value="3">KES</option>
                      <option value="4">USD</option>
                    </select>
                    <has-error
                      :form="form"
                      field="indicator"
                    ></has-error>
                  </div>

                  <div class="form-group col-md-4">
                    <label for>Frequency</label>
                    <select
                      name="status"
                      v-model="form.Frequency"
                      id="type"
                      class="form-control"
                      :class="{ 'is-invalid': form.errors.has('Frequency') }"
                    >
                      <option value="D">Daily</option>
                      <option value="W">Weekly</option>
                      <option value="M">Monthly</option>
                      <option value="Q">Quarterly</option>
                      <option value="S">Semi-Annually</option>
                      <option value="A">Annually</option>
                      <option value="O">On Demand</option>
                    </select>
                    <has-error
                      :form="form"
                      field="Frequency"
                    ></has-error>
                  </div>

                  <div class="form-group col-md-4">
                    <label>Department</label>
                    <select
                      class="form-control"
                      v-model="form.BunitID"
                      :class="{ 'is-invalid': form.errors.has('Manager') }"
                    >
                      <option
                        v-for="val in businessunits"
                        :value="val.id"
                        :key="val.BunitID"
                      >
                        <td>{{ val.Name }}</td>

                      </option>
                    </select>
                    <has-error
                      :form="form"
                      field="Manager"
                    ></has-error>
                  </div>

                </div>
              </div>
              <div class="modal-footer">
                <button
                  type="submit"
                  class="btn btn-primary"
                >
                  Update
                </button>
              </div>
            </form>
          </div>
        </div>
        <!-- /.card -->
      </div>
    </div>

    <!-- Modal -->
    <div
      class="modal fade"
      id="addNew"
      tabindex="-1"
      role="dialog"
      aria-labelledby="addNewLabel"
      aria-hidden="true"
    >
      <div
        class="modal-dialog modal-lg"
        role="document"
      >
        <div class="modal-content">
          <div class="modal-header">
            <h5
              class="modal-title"
              id="addNewLabel"
            >Baseline Setup</h5>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form @submit.prevent="editmode ? updateData() : createData()">
            <div class="modal-body">
              <div class="form-row">

                <table class="table table-bordered table-hover table-sm  mt-2">
                  <thead class="thead-light">

                    <tr>
                      <th>Year</th>
                      <th>Value</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <select
                          class="form-control"
                          v-model="record.year"
                        >
                          <option
                            v-for="val in baseline"
                            :value="val.Name"
                            :key="val.id"
                          >
                            {{ val.Name }}
                          </option>
                        </select>
                      </td>
                      <td>
                        <input
                          v-model="record.BaseLineValue"
                          type="text"
                          placeholder="Value"
                          class="form-control"
                          :class="{ 'is-invalid': form.errors.has('Acronym') }"
                        />
                      </td>
                      <td>
                        <a
                          href="#"
                          @click.prevent="addBaseLineRecord()"
                        >
                          Add
                        </a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <div class="form-row">

                <table class="table table-bordered table-hover table-sm  mt-2">
                  <thead class="thead-light">

                    <tr>
                      <th>Year</th>
                      <th>Value</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr
                      v-for="mode in baseline_records"
                      :key="mode.id"
                    >
                      <td>
                        {{mode.year}}
                      </td>
                      <td>
                        {{mode.BaseLineValue}}
                      </td>
                      <td>
                        <button
                          type="submit"
                          class="btn btn-danger btn-sm"
                        >
                          Remove
                        </button>
                      </td>
                    </tr>
                  </tbody>
                </table>

              </div>
            </div>
            <div class="modal-footer">
              <button
                type="button"
                class="btn btn-danger"
                data-dismiss="modal"
              >
                Close
              </button>

            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      editmode: false,
      allusers: [],
      pillars: {},
      objectives: {},
      businessunits: {},
      baseline: {},
      record: {},
      baseline_records: [],
      form: new Form({
        id: '',
        pillar: '',
        objective: '',
        measure: '',
        Target: '',
        Frequency: '',
        priority: '',
        indicator: '',
        BunitID: '',
        baseline_records: {}
      })
    }
  },
  watch: {
    '$route.params.id': {
      handler: 'loadScoreCard',
      immediate: true
    }
  },
  methods: {
    getAuthToken() { return localStorage.getItem('authToken'); },
    createScoreCard() {
      this.$Progress.start()
      this.form.baseline_records = this.baseline_records
      this.form
        .post('/api/score_card')
        .then((res) => {
          if (res.data.ResultCode == 1200) {
            this.form.reset()
            $('#addNew').modal('hide')
            toat.fire('Created!', 'Successfully Created.', 'success')
            this.$Progress.finish()
            Fire.$emit('AfterCreate')
          } else {
            toast.fire({
              type: 'error',
              title: res.data.ResultDesc
            })
          }
        })
        .catch((e) => {
          toast.fire({
            type: 'error',
            title: 'Operation not successfull' + '\n' + e.response.data.message
          })
        })
    },

    loadBusinessUnits() {
      const token = this.getAuthToken();
      axios
        .get('/api/businessunits', {
          params: {
            ObjType: this.form.BUObjType
          },
          withCredentials: true,
          headers: {
              Authorization: `Bearer ${token}`
          }
        })
        .then((res) => {
          if (res.data.ResultCode == 1200) {
            this.businessunits = res.data.ResponseData.data
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

    fetchData() {
      const numbers = [103, 104]
      numbers.forEach(this.loadaAllData)
    },

    loadaAllData(ObjType) {
      axios
        .get('/api/profile_data', {
          params: {
            ObjType: ObjType
          }
        })
        .then((res) => {
          if (res.data.ResultCode == 1200) {
            if (ObjType == 103) {
              this.pillars = res.data.ResponseData
            }

            if (ObjType == 104) {
              this.objectives = res.data.ResponseData
            }
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
    loadBaseLine() {
      axios
        .get('/api/risklibrarysetup', {
          params: {
            ObjType: 106
          }
        })
        .then((res) => {
          if (res.data.ResultCode == 1200) {
            this.baseline = res.data.ResponseData.data
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

    newModal() {
      this.editmode = false
      this.form.reset()
      $('#addNew').modal('show')
    },
    newModal() {
      this.editmode = false
      this.form.reset()
      $('#addNew').modal('show')
    },
    addBaseLineRecord() {
      this.baseline_records.push(this.record)
      this.record = {}
    },

    loadScoreCard(id) {
      axios
        .get('/api/score_card/' + id, {
          params: {
            ObjType: this.form.BUObjType
          }
        })
        .then((res) => {
          if (res.data.ResultCode == 1200) {
            this.form.fill(res.data.ResponseData)
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
    this.fetchData()
    this.loadBusinessUnits()
    this.loadBaseLine()
  }
}
</script>
