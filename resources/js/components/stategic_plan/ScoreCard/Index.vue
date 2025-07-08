<template>
  <div>
    <div class="row mt-1">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Score Card</h3>
            <div class="card-tools">
              <router-link to="/score_card/create">
                <button class="btn btn-success btn-sm">
                  Create Score Card
                </button>
              </router-link>

            </div>
          </div>

          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table class="table table-bordered table-hover table-sm">
              <thead class="thead-light">

                <th>{{this.tableHeaders[0]}}</th>
                <th>{{this.tableHeaders[1]}}</th>
                <th>{{this.tableHeaders[2]}}</th>
                <th>{{this.tableHeaders[3]}}</th>
                <th>{{this.tableHeaders[4]}}</th>
                <th>{{this.tableHeaders[5]}}</th>
                <th>{{this.tableHeaders[6]}}</th>
                <th>{{this.tableHeaders[7]}}</th>
                <th></th>
              </thead>
              <tbody>
                <tr
                  v-for="mode in score_cards"
                  :key="mode.id"
                >
                  <td>

                    {{ mode.strategicpillar.title }}

                  </td>
                  <td>

                    {{ mode.strategicobjective.description }}

                  </td>
                  <td>{{ mode.Target }}</td>
                  <td>{{ mode.measure }}</td>

                  <td>{{ mode.freq }}</td>
                  <td>{{mode.bunit ? mode.bunit.Name : null}}</td>
                  <td> <a
                      href="#"
                      @click.prevent="viewBaseLine(mode)"
                    >
                      <i class="fa fa-eye blue"></i>
                    </a></td>
                  <td>

                    <a
                      href="#"
                      @click.prevent="editModal(mode)"
                    >
                      <i class="fa fa-edit blue"></i>
                    </a>

                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <!-- /.card -->
      </div>

      <div
        class="modal fade"
        id="addNewBaseLine"
        tabindex="-1"
        role="dialog"
        aria-hidden="true"
      >
        <div
          class="modal-dialog"
          role="document"
        >
          <div class="modal-content">
            <div class="modal-header">

              <h5
                class="modal-title"
                id="addNewLabel"
              >
                Base Line Records
              </h5>
              <button
                type="button"
                class="close"
                data-dismiss="modal"
                aria-label="Close"
              >
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form @submit.prevent="editmode ? updateUser() : createUser()">
              <div class="modal-body">
                <div class="form-row">

                  <table class="table table-bordered table-hover table-sm  mt-2">
                    <thead class="thead-light">

                      <tr>
                        <th>Year</th>
                        <th>Value</th>

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

  </div>
</template>

<script>
import 'vue-toastification/dist/index.css'
export default {
  data() {
    return {
      editmode: false,
      score_cards: {},
      tableHeaders: [],
      baseline_records: {},
      counter: 1
    }
  },
  methods: {
    loadData() {
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
    deleteRoute(id) {
      swal
        .fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        })
        .then((result) => {
          if (result.value) {
            this.form
              .delete('/api/score_card/' + id)
              .then(() => {
                toast.fire('Deleted!', 'Your file has been deleted.', 'success')
                Fire.$emit('AfterCreate')
              })
              .catch(() => {
                swal.fire('Failed!', 'Something when wrong', 'warning')
              })
          }
        })
    },
    generateHeaders() {
      var headers = ['Strategic Pillar', 'Strategic Objective', 'Target', 'Measurer(KPI)', 'Monitoring Frequency', 'Department', 'BaseLine']
      this.tableHeaders = [...headers]
    },
    viewBaseLine(mode) {
      this.baseline_records = mode.baseline_records
      $('#addNewBaseLine').modal('show')
    },
    editModal(mode) {
      this.$router.push({ name: 'ScoreCardEdit', params: { id: mode.id } })
    }
  },
  created() {
    this.loadData()
    this.generateHeaders()
  }
}
</script>
