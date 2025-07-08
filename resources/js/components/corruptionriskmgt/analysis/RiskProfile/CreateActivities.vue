<template>
  <div class="card row mt-2">
    <div class="card-header">
      <h3 class="card-title">New Activity</h3>
      <div class="card-tools">
        <router-link to="/crm/CorruptionPreventionStrategy">
          <button class="btn btn-success btn-sm">
            Go Back
          </button>
        </router-link>
      </div>
    </div>

    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
      <div>
        <form @submit.prevent="createAction()">
          <div class="modal-body">

            <div class="form-row">
              <div class="form-group col-md-6">
                <label for>Activity</label>
                <input
                  v-model="form.Name"
                  type="text"
                  placeholder="Activity"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('Name') }"
                />
              </div>

              <div class="form-group col-md-3">
                <label for>Status</label>
                <select
                  name="type"
                  v-model="form.Status"
                  id="type"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('Statuss') }"
                >
                  <option value="0">Not Started (Not Due)</option>
                  <option value="1">WIP (On Course)</option>
                  <option value="2">WIP (Overdue)</option>
                  <option value="3">Not Started (Overdue)</option>
                  <option value="4">Deffered</option>
                  <option value="5">Completed</option>
                </select>
              </div>

              <div class="form-group col-md-3">
                <label for>Budget</label>
                <input
                  v-model="form.Rating"
                  type="text"
                  name="Name"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('Rating') }"
                />
              </div>
              <div class="form-group col-md-3">
                <label for>Due Date</label>
                <datepicker
                  :bootstrap-styling="true"
                  v-model="form.DueDate"
                  :disabledDates="state.disabledDates"
                  :class="{ 'is-invalid': form.errors.has('DueDate') }"
                  name="fromWhen"
                >
                  <div
                    slot="beforeCalendarHeader"
                    class="calender-header"
                    style="text-align: center; color: red"
                  ></div>
                </datepicker>

                <has-error
                  :form="form"
                  field="DueDate"
                ></has-error>
              </div>

            </div>

            <div class="form-row">

              <table class="table table-bordered table-hover table-sm col-md-6 mt-2">
                <thead class="thead-light">
                  <tr>
                    <td colspan="2">Assignments</td>
                  </tr>
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
import moment from 'moment'

export default {
  data() {
    return {
      reports: {},
      categories: {},
      showcauses: false,
      showactions: false,
      showeffects: false,
      riskcauses: {},
      users: {},
      BName: '',
      RName: '',
      form: new Form({
        id: '',
        RiskID: '',
        ObjType: 42,
        Rating: '',
        Category: 1,
        DueDate: '',
        Status: '',
        Name: '',

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
    /**
     * Creating Risk
     */
    createAction() {
      this.form.parent_id = localStorage.action_id
      this.form.DueDate = moment(this.form.DueDate).format('YYYY-MM-DD')
      this.$Progress.start()
      this.form
        .post('/api/actiontracking')
        .then((res) => {
          if (res.data.ResultCode == 1200) {
            toast.fire('Created!', 'Successfully Created.', 'success')
            this.$router.push({ name: 'CREAnalyseMainRisk' })
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
    loadRisk() {
      axios.get('/api/risks/' + localStorage.risk_id).then((res) => {
        this.RName = res.data.ResponseData.item.Name
      })
    },
    loadCausesEffects() {
      axios
        .get('/api/getCausesEffects', {
          params: {
            RiskID: localStorage.risk_id,
            isForAction: 1,
            isCRM: 1
          }
        })
        .then((res) => {
          if (res.data.ResultCode == 1200) {
            this.riskcauses = res.data.ResponseData.methods
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
    this.loadUsers()
    this.loadCausesEffects()
    this.loadCategory()
    this.loadRisk()
  }
}
</script>
