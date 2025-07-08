<template>
  <div class="card row mt-2">
    <div class="card-header">
      <h3 class="card-title">Action Item Editor</h3>
    </div>

    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
      <div>
        <form @submit.prevent="createAction()">
          <div class="modal-body">
            <div class="form-row">
              <div class="form-group col-md-3">
                <label for>Action Category</label>
                <select
                  name="type"
                  v-model="form.Category"
                  id="type"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('type') }"
                >
                  <option
                    v-for="val in categories"
                    :value="val.id"
                    :key="val.id"
                  >
                    {{ val.Name }}
                  </option>
                </select>
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
                <label for>Rating</label>
                <select
                  name="type"
                  v-model="form.Rating"
                  id="type"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('Rating') }"
                >
                  <option value="0">LOW</option>
                  <option value="1">MEDIUM</option>
                  <option value="2">HIGH</option>
                </select>
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
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-12">
                <label for>Name of action</label>
                <input
                  v-model="form.Name"
                  type="text"
                  placeholder="Name of Action"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('Name') }"
                />
              </div>
              <div class="form-group col-md-12">
                <label for>Description of Action</label>
                <textarea
                  rows="3"
                  v-model="form.Description"
                  placeholder="Description"
                  class="form-control"
                  :class="{
                    'is-invalid': form.errors.has('Description'),
                  }"
                ></textarea>
                <has-error
                  :form="form"
                  field="Description"
                ></has-error>
              </div>
            </div>

            <div class="form-row">
              <nav class="nav nav-tabs">
                <a
                  href="#"
                  class="nav-item nav-link"
                  @click.prevent="showRiskCauses"
                >Assignments</a>
              </nav>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for>Supervisor</label>
                <select
                  name="type"
                  v-model="form.user_id"
                  id="type"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('user_id') }"
                >
                  <option
                    v-for="val in users"
                    :value="val.id"
                    :key="val.id"
                  >
                    {{ val.Fname +' '+val.Lname}}
                  </option>
                </select>
                <has-error
                  :form="form"
                  field="user_id"
                ></has-error>
              </div>

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
        ObjType: 19,
        Source: '',
        Category: 1,
        DueDate: new Date(),
        Status: '',
        Name: '',
        Description: '',
        Rating: '',
        CategoryObjType: 18,
        selectedCauses: [],
        o_k_r_i_id: '',
        user_id: '',
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
      this.form.o_k_r_i_id = localStorage.kricompliance_id
      this.form.DueDate = moment(this.form.DueDate).format('YYYY-MM-DD')
      this.$Progress.start()
      this.form
        .post('/api/actiontracking')
        .then((res) => {
          if (res.data.ResultCode == 1200) {
            swal.fire('Created!', 'Successfully Created.', 'success')
            this.$router.push({ name: 'AnalyseRiskProfile' })
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
    }
  },
  created() {
    this.loadUsers()
    // this.loadCausesEffects()
    this.loadCategory()
    // this.loadRisk()
  }
}
</script>
