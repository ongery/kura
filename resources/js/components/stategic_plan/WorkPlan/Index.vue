<template>
  <div>
    <div class="row mt-1">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Work Plan</h3>
            <div class="card-tools">
              <router-link to="/work_plan/create">
                <button class="btn btn-success btn-sm">
                  Create Work Plan
                </button>
              </router-link>

            </div>
          </div>

          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table class="table table-bordered table-hover table-sm">
              <thead class="thead-light">
                <tr>
                  <th>Activity</th>
                  <th>Start Date</th>
                  <th>End Date</th>
                  <th>Output</th>
                  <th>Budget</th>
                  <th>Status</th>
                  <th>Department</th>
                  <th>Person Responsible</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <tr
                  v-for="mode in alldata"
                  :key="mode.id"
                >
                  <td>
                    <a
                      style="color: #258c37;"
                      href="#"
                      @click.prevent="editModal(mode)"
                    >
                      {{ mode.Activity }}
                    </a>

                  </td>
                  <td>{{ mode.StartDate }}</td>
                  <td>{{ mode.EndDate }}</td>
                  <td>{{ mode.Output }}</td>
                  <td>{{ mode.Budget }}</td>
                  <td 
                      :class="{
                        'bg-success': mode.color === 'bg-success',
                         'bg-danger': mode.color === 'bg-danger',
                          'bg-warning': mode.color === 'bg-warning',
                           'bg-blue': mode.color === 'bg-blue',
                            'bg-yellow': mode.color === 'bg-yellow',
                            'bg-white': mode.color === 'bg-white',
                             'bg-bg-warning': mode.color === 'bg-warning',
        
                          }">{{ mode.status }}</td>
                          <!-- :class="{
                    'bg-success': mode.color === 'bg-success',
                     'bg-danger': mode.color === 'bg-danger',
                      'bg-warning': mode.color === 'bg-warning',
                       'bg-blue': mode.color === 'bg-blue',
                        'bg-yellow': mode.color === 'bg-yellow',
                        'bg-white': mode.color === 'bg-white',
                         'bg-bg-warning': mode.color === 'bg-warning',
    
                      }"
                       -->
                  <td>{{ mode.BunitID }}</td>
                  <td>{{ mode.UserSign }}</td>
                  <td>

                    <a
                      href="#"
                      @click.prevent="editModal(mode)"
                    >
                      <i class="fa fa-edit blue"></i>
                    </a>
                    <a
                      href="#"
                      @click.prevent="deleteRoute(mode.id)"
                    >
                      <i class="fa fa-trash red"></i>
                    </a>
                  </td>
                </tr>
              </tbody>
            </table>
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
            >Stragic Pillar</h5>
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

                <div class="form-group col-md-8">
                  <label for>Strategic Pillar</label>
                  <input
                    v-model="form.title"
                    type="text"
                    placeholder="Title"
                    class="form-control"
                    :class="{ 'is-invalid': form.errors.has('title') }"
                  />
                  <has-error
                    :form="form"
                    field="Name"
                  ></has-error>
                </div>
                <div class="form-group col-md-12">
                  <label for>Description</label>
                  <textarea
                    rows="5"
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
            </div>
            <div class="modal-footer">
              <button
                type="button"
                class="btn btn-danger"
                data-dismiss="modal"
              >
                Close
              </button>
              <button
                v-show="editmode"
                type="submit"
                class="btn btn-success"
              >
                Update
              </button>
              <button
                v-show="!editmode"
                type="submit"
                class="btn btn-primary"
              >
                Create
              </button>
            </div>
          </form>
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
      categories: {},
      alldata: {},
      counter: 1,
      form: new Form({
        id: '',
        ObjType: 103,
        description: '',
        title: ''
      })
    }
  },
  methods: {
    loadData() {
      axios
        .get('/api/work_plan', {
          params: {
            ObjType: this.form.ObjType
          }
        })
        .then((res) => {
          if (res.data.ResultCode == 1200) {
            this.alldata = res.data.ResponseData
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
              .delete('/api/profile_data/' + id)
              .then(() => {
                toast.fire('Deleted!', 'Your file has been deleted.', 'success')
                Fire.$emit('AfterCreate')
              })
              .catch(() => {
                swal.fire('Failed!', 'Something when wrong', 'warning')
              })
          }
        })
    }
  },
  created() {
    this.loadData()
    Fire.$on('AfterCreate', () => {
      this.loadData()
    })
  }
}
</script>
