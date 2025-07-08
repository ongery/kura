<template>
  <div>
    <div class="row mt-2">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Work Plan</h3>
            <div class="card-tools">
              <router-link :to="{ name: 'MyAction'}">
                <button class="btn btn-info btn-sm">
                  <i class="fas fa-angle-double-left"></i>
                  Go Back
                </button>
              </router-link>
            </div>
          </div>

          <!-- /.card-header -->
          <div class="card-body">
            <form @submit.prevent="updateData()">
              <div class="modal-body">
                <div class="form-row">

                  <div class="form-group col-md-6">
                    <label>Score Card Area</label>
                    <select
                      class="form-control"
                      v-model="form.scorecard_id"
                      :class="{ 'is-invalid': form.errors.has('scorecard_id') }"
                    >
                      <option
                        v-for="val in score_cards"
                        :value="val.id"
                        :key="val.id"
                      >
                        <td>{{ val.Target }}</td>

                      </option>
                    </select>
                    <has-error
                      :form="form"
                      field="scorecard_id"
                    ></has-error>
                  </div>
                  <div class="form-group col-md-6">
                    <label for>Activity/Inititive</label>
                    <input
                      v-model="form.Activity"
                      type="text"
                      readonly
                      placeholder="Activity"
                      class="form-control"
                      :class="{ 'is-invalid': form.errors.has('Activity') }"
                    />
                    <has-error
                      :form="form"
                      field="Name"
                    ></has-error>
                  </div>

                  <div class="form-group col-md-4">
                    <label for>Desired Ouput</label>
                    <input
                      v-model="form.Output"
                      type="text"
                      readonly
                      placeholder="Output"
                      class="form-control"
                      :class="{ 'is-invalid': form.errors.has('Output') }"
                    />
                    <has-error
                      :form="form"
                      field="Ouput"
                    ></has-error>
                  </div>

                  <div class="form-group col-md-4">
                    <label for>Start Date</label>
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

                  <div class="form-group col-md-4">
                    <label for>End Date</label>
                    <datepicker
                      :bootstrap-styling="true"
                      v-model="form.EndDate"
                    >
                      <div
                        slot="beforeCalendarHeader"
                        class="calender-header"
                        style="text-align: center; color: red"
                      ></div>
                    </datepicker>
                  </div>

                  <div class="form-group col-md-4">
                    <label for>Budget</label>
                    <input
                      v-model="form.Budget"
                      type="text"
                      readonly
                      placeholder="Budget"
                      class="form-control"
                      :class="{ 'is-invalid': form.errors.has('Budget') }"
                    />
                    <has-error
                      :form="form"
                      field="Budget"
                    ></has-error>
                  </div>
                  <div class="form-group col-md-4">
                    <label for>Status</label>
                    <select
                      name="type"
                      v-model="form.Status"
                      id="type"
                      class="form-control"
                      :class="{ 'is-invalid': form.errors.has('Status') }"
                    >
                      <option value="0">Not Started (Not Due)</option>
                      <option value="1">WIP (On Course)</option>
                      <option value="2">WIP (Overdue)</option>
                      <option value="3">Not Started (Overdue)</option>
                      <option value="4">Deffered</option>
                      <option value="5">Completed</option>
                    </select>
                  </div>

                  <div class="form-group col-md-4">
                    <label for>Actual Ouput</label>
                    <input
                      v-model="form.ActualOutput"
                      type="text"
                      placeholder="Output"
                      class="form-control"
                      :class="{ 'is-invalid': form.errors.has('ActualOutput') }"
                    />
                    <has-error
                      :form="form"
                      field="ActualOutput"
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
        <!-- /.card -->
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
      editmode: false,
      categories: {},
      counter: 1,
      users: {},
      businessunits: {},
      allusers: [],
      selectedAssignments: [],
      score_cards: {},
      form: new Form({
        id: '',
        scorecard_id: '',
        Activity: '',
        Description: '',
        StartDate: '',
        EndDate: '',
        DaysLeft: '',
        Output: '',
        Budget: '',
        Status: '',
        BunitID: '',
        UserSign: '',
        ActualOutput: ''
      })
    }
  },

  computed: {
    filteredUserForHOD: function () {
      return this.churches.filter(function (e) {
        if (e.accountType == 0) {
          return e
        }
      })
    },

    filtereduserForAssigment: function () {
      return this.allusers.filter(function (e) {
        if (e.BunitID == null) {
          return e
        }
      })
    }
  },
  components: {
    Datepicker
  },
  watch: {
    '$route.params.id': {
      handler: 'getWorkPlan',
      immediate: true
    }
  },
  methods: {
    updateData() {
      this.$Progress.start()
      this.form
        .put('/api/strategic/actions/' + this.form.id)
        .then(() => {
          // success
          $('#addNew').modal('hide')
          swal.fire('Updated!', 'Information has been updated.', 'success')
          this.$Progress.finish()
          Fire.$emit('AfterCreate')
        })
        .catch(() => {
          this.$Progress.fail()
        })
    },
    loadScoreCards() {
      axios
        .get('/api/score_card')
        .then((res) => {
          if (res.data.ResultCode == 1200) {
            this.score_cards = res.data.ResponseData
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
    getWorkPlan(id) {
      this.business_id = id
      axios
        .get('/api/work_plan/' + id)
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
    this.loadScoreCards()
  }
}
</script>
