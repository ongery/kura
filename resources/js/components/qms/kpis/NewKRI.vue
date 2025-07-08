<template>
  <div class="card row mt-2">
    <div class="card-header">
      <h3 class="card-title">New KPI Item</h3>
    </div>

    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
      <div>
        <form @submit.prevent="createData()">
          <div class="modal-body">
            <div class="form-row">
              <div class="form-group col-md-4">
                <label>Procedures</label>
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
              <div class="form-group col-md-4">
                <label>Category</label>
                <select
                  class="form-control"
                  v-model="form.CategoryID"
                  name="CategoryID"
                  :class="{ 'is-invalid': form.errors.has('CategoryID') }"
                >
                  <option
                    v-for="val in categories"
                    :value="val.id"
                    :key="val.id"
                  >
                    {{ val.Name }}
                  </option>
                </select>
                <has-error
                  :form="form"
                  field="CategoryID"
                ></has-error>
              </div>
              <div class="form-group col-md-4">
                <label for>Name</label>
                <input
                  v-model="form.Name"
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
              <div class="form-group col-md-6">
                <label for>Description</label>
                <textarea
                  rows="3"
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

              <div class="form-group col-md-3">
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
              <div class="form-group col-md-3">
                <label for>Start of Period</label>
                <datepicker
                  :bootstrap-styling="true"
                  v-model="form.StartDate"
                >
                  <div
                    slot="beforeCalendarHeader"
                    class="calender-header"
                    style="text-align: center; color: red"
                  ></div>
                </datepicker>
              </div>
              <div class="form-group col-md-3">
                <label for>Expired Date</label>
                <datepicker
                  :bootstrap-styling="true"
                  v-model="form.ExpiredDate"
                >
                  <div
                    slot="beforeCalendarHeader"
                    class="calender-header"
                    style="text-align: center; color: red"
                  ></div>
                </datepicker>
              </div>

              <div class="form-group col-md-3">
                <label for>Data Type</label>
                <select
                  v-model="form.DataType"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('DataType') }"
                >
                  <option value="1">Numbers</option>
                  <option value="2">Percentage</option>
                </select>
                <has-error
                  :form="form"
                  field="DataType"
                ></has-error>
              </div>
              <div class="form-group col-md-3">
                <label for>Lower Limit</label>
                <input
                  v-model="form.LowerLimit"
                  type="number"
                  placeholder="Lower Limit"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('LowerLimit') }"
                />
                <has-error
                  :form="form"
                  field="Name"
                ></has-error>
              </div>
              <div class="form-group col-md-3">
                <label for>Green/Amber</label>
                <input
                  v-model="form.GreenAmber"
                  type="number"
                  placeholder="Green/Amber"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('GreenAmber') }"
                />
                <has-error
                  :form="form"
                  field="GreenAmber"
                ></has-error>
              </div>
              <div class="form-group col-md-3">
                <label for>Amber/Red</label>
                <input
                  v-model="form.AmberRed"
                  type="number"
                  placeholder="Amber/Red"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('AmberRed') }"
                />
                <has-error
                  :form="form"
                  field="AmberRed"
                ></has-error>
              </div>
              <div class="form-group col-md-3">
                <label for>Upper Limit</label>
                <input
                  v-model="form.UpperLimit"
                  type="number"
                  placeholder="Upper Limit"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('UpperLimit') }"
                />
                <has-error
                  :form="form"
                  field="Name"
                ></has-error>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label for>Assignments</label>
                <table class="table table-bordered table-hover table-sm  mt-2">
                  <thead class="thead-light">
                    <tr>
                      <th></th>
                      <th>Name</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr
                      v-for="mode in users"
                      :key="mode.id"
                    >
                      <td>
                        <input
                          type="checkbox"
                          :value="mode.id"
                          v-model="form.selectedAssignments"
                        />
                      </td>
                      <td>{{ mode.Fname + " " + mode.Lname }}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="modal-footer">

            <button
              type="submit"
              class="btn btn-success"
            >
              Create
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
      categories: {},
      riskevents: {},
      users: {},
      form: new Form({
        id: '',
        o_i_t_m_id: '',
        CategoryID: '',
        Name: '',
        description: '',
        Weight: 1,
        Frequency: '',
        StartDate: '',
        ExpiredDate: '',
        DataType: '',
        LowerLimit: '',
        GreenAmber: '',
        AmberRed: '',
        UpperLimit: '',
        ObjType: 27,
        CategoryObjType: 5,
        selectedAssignments: []
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
    loadUsers() {
      axios
        .get('/api/user')
        .then((res) => {
          if (res.data.ResultCode == 1200) {
            this.users = res.data.ResponseData
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

    /**
     * Creating Risk
     */
    createData() {
      this.form.StartDate = moment(this.form.StartDate).format('YYYY-MM-DD')
      this.form.ExpiredDate = moment(this.form.ExpiredDate).format('YYYY-MM-DD')
      this.$Progress.start()
      this.form
        .post('/api/kris-compliance')
        .then((res) => {
          if (res.data.ResultCode == 1200) {
            toast.fire({
              type: 'success',
              title: 'Created in successfully'
            })
            this.$router.push({ name: 'AllKPIs' })
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
    loadCategory() {
      axios
        .get('/api/category', {
          params: {
            ObjType: this.form.CategoryObjType
          }
        })
        .then((res) => {
          if (res.data.ResultCode == 1200) {
            this.categories = res.data.ResponseData.data
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

    loadRiskEvents() {
      axios
        .get('/api/risklibrarysetup', {
          params: {
            ObjType: 26
          }
        })
        .then((res) => {
          if (res.data.ResultCode == 1200) {
            this.riskevents = res.data.ResponseData.data
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
    this.loadUsers()
    this.loadRiskEvents()
    this.loadCategory()
  }
}
</script>
