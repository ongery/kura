<template>
  <div class="card row mt-2">

    <!-- <ActionTrackingOverviewToolbar :title="'Treatment Action Editor'" > </ActionTrackingOverviewToolbar> -->


    <div class="card-header">
      <h3 class="card-title">Treatment Action Editor</h3>
      <div class="card-tools">
        <a href="#"
          class="btn btn-info btn-sm"
          @click.prevent="GoBack"
        >
          <i class="fas fa-angle-double-left"></i>
          Close
        </a>
      </div>
    </div>

    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">

      <form @submit.prevent="updateAction()">
        <div class="modal-body">

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for>Name of action</label>
              <input
                v-model="form.Name"
                type="text"
                readonly
                placeholder="Name of Action"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('Name') }"
              />
            </div>
            <div class="form-group col-md-6">
              <label for>Description of Action</label>
              <textarea
                rows="3"
                readonly
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

          <WorkInProgress>
          </WorkInProgress>
        </div>
        <div class="modal-footer">
          <button
            type="submit"
            class="btn btn-primary"
          >Save</button>
        </div>
      </form>
    </div>

  </div>
</template>
<script>
import Datepicker from 'vuejs-datepicker'
import moment from 'moment'
import WorkInProgress from './WorkInProgress.vue'
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
      assignedusers: {},
      BName: '',
      RName: '',
      selectedAssignments: [],
      form: new Form({
        id: '',
        RiskID: '',
        ObjType: 19,
        Source: '',
        Category: 1,
        DueDate: '',
        Status: '',
        Name: '',
        Description: '',
        Rating: '',
        CategoryObjType: 18,
        selectedCauses: [],
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
    Datepicker,
    WorkInProgress
  },
  methods: {
    CountChecked(mode) {
      var isSelected = mode.isSelected
      axios
        .get('/api/syncRelForAction', {
          params: {
            action_id: localStorage.action_id,
            ItemID: mode.id,
            isSelected: isSelected
          }
        })
        .then((res) => {
          if (res.data.ResultCode == 1200) {
            // this.riskcauses = res.data.ResponseData.causes
            // this.riskeffects = res.data.ResponseData.effects
            // this.controlitems = res.data.ResponseData.controlitems
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
    // loadRisk() {
    //   axios.get('/api/risks/' + localStorage.risk_id).then((res) => {
    //     this.BName = res.data.ResponseData.bunit.Name
    //     this.RName = res.data.ResponseData.item.Name
    //   })
    // },

    loadAction() {
      axios.get('/api/actiontracking/' + localStorage.action_id).then((res) => {
        this.form.fill(res.data.ResponseData)
        this.selectedAssignments = res.data.ResponseData.users
      })
    },
    loadCausesEffects() {
      axios
        .get('/api/getCausesEffects', {
          params: {
            RiskID: localStorage.risk_id,
            isForAction: 1,
            action_id: localStorage.action_id
          }
        })
        .then((res) => {
          if (res.data.ResultCode == 1200) {
            this.riskcauses = res.data.ResponseData.causes
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
    viewWorkInProgress() {
      this.$router.push({ name: 'WorkInProgress' })
    },
    showRiskCauses() {},
    /**
     * Creating Risk
     */
    updateAction() {
      this.form.DueDate = moment(this.form.DueDate).format('YYYY-MM-DD')
      this.form.selectedAssignments = this.selectedAssignments
      this.$Progress.start()
      this.form
        .put('/api/actiontracking/' + localStorage.action_id)
        .then((res) => {
          if (res.data.ResultCode == 1200) {
            Fire.$emit('AfterCreate')
            toast.fire({
              type: 'success',
              title: 'Updated Successfully'
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
    showModalUsers() {
      $('#addNew').modal('show')
    },
    CountChecked(mode) {
      const item = this.selectedAssignments.find((record) => {
        return record.id === mode.id
      })
      if (item) {
        return
      }
      this.selectedAssignments.push(mode)
    },
    deleteUser(id) {
      const self = this
      const item = this.selectedAssignments.find((record) => {
        return record.id === id
      })

      const pos = this.selectedAssignments.indexOf(item)
      if (pos === -1) {
        return
      }
      this.selectedAssignments.splice(pos, 1)
    },
    GoBack() {
      console.log('ASDFA')
      this.$router.go(-1)
    }
  },
  created() {
    this.loadUsers()
    this.loadCategory()
    this.loadAction()
    Fire.$on('AfterCreate', () => {
      this.loadAction
    })
  }
}
</script>
