<template>
  <div>
    <div class="row mt-2">
      <div class="col-md-12">

        <AuditToolbar :title="'Audit Scheduler'"></AuditToolbar>

        <div class="card">

          <!-- <div class="card-header">
            <h3 class="card-title">Audit Scheduler</h3>
            <div class="card-tools">
              <button
                class="btn btn-success btn-sm"
                @click="NewItem"
              >
                <i class="fas fa-plus"></i>
                New
              </button>
            </div>
          </div> -->
          <!-- /.card-header -->


          <!--begin::Col-->
          <div class="col-xl-12">

            <!--begin::Tables Widget 3-->
            <div class="card card-xl-stretch mb-5 mb-xl-12">
              
                <!--begin::Body-->
                <div class="card-body py-3">

                    <!--begin::Table container-->
                    <div class="table-responsive">

                        <!--begin::Header-->
                        <!-- <div class="card-header border-0 pt-5"> -->
                        
                          <!--begin::Col-->
                          <!-- <div class="col-md-6 fv-row">

                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold fs-3 text-muted mb-1" style="margin-left: -30px;">Details</span>
                            </h3>
                                  
                          </div> -->
                          <!--end::Col-->

                        <!-- </div> -->
                        <!--end::Header-->

                        <!--begin::Table-->
                        <table class="table table-row-dashed table-row-gray-300 align-middle p-0">

                            <thead class="fw-bolder text-muted">
                              <tr>
                                <th>Reference</th>
                                <th>Title</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th></th>
                              </tr>
                            </thead>

                            <!--begin::Table body-->
                            <tbody>

                              <tr v-for="mode in alldata" :key="mode.id">

                                              
                                <td>
                                  <router-link :to="{ path:'/AuditScheduler/' + mode.id}">
                                    <span style="color: #258c37 ;">
                                      <i class="fa fa-edit blue text-success">{{mode.DocNum}}</i>
                                    </span>
                                  </router-link>
                                </td>
                                
                                <td>
                                  <router-link :to="{ path:'/AuditScheduler/' + mode.id}">
                                    <span style="color: #258c37 ;">

                                      <i class="fa fa-edit blue text-success">{{mode.Title}}</i>
                                    </span>
                                  </router-link>
                                </td>

                                <td>{{ mode.StartDate }}</td>
                                <td>{{ mode.EndDate }}</td>
                                <td>

                                  <a
                                    href="#"
                                    @click.prevent="deleteRoute(mode.id)"
                                  >
                                    <i class="fa fa-trash red"></i>
                                  </a>
                                </td>          
                            </tr>
                              
                            </tbody>
                            <!--end::Table body-->
                        </table>
                        <!--end::Table-->
                    </div>
                    <!--end::Table container-->
                </div>
                <!--begin::Body-->
            </div>
            <!--end::Tables Widget 3-->
          </div>
          <!--end::Col-->

  




          <!-- <div class="card-body table-responsive p-0">
            <table class="table table-bordered table-hover table-sm">
              <thead class="thead-light">
                <tr>
                  <th>Reference</th>
                  <th>Title</th>
                  <th>Start Date</th>
                  <th>End Date</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <tr
                  v-for="mode in alldata"
                  :key="mode.id"
                >
                  <td>
                    <router-link :to="{ path:'/AuditScheduler/' + mode.id}">
                      <i class="fa fa-edit blue">{{mode.DocNum}}</i>
                    </router-link>
                  </td>
                  <td>
                    <router-link :to="{ path:'/AuditScheduler/' + mode.id}">
                      <i class="fa fa-edit blue">{{mode.Title}}</i>
                    </router-link>

                  </td>
                  <td>{{ mode.StartDate }}</td>
                  <td>{{ mode.EndDate }}</td>
                  <td>

                    <a
                      href="#"
                      @click="deleteRoute(mode.id)"
                    >
                      <i class="fa fa-trash red"></i>
                    </a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div> -->

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
            >KRI Item Editor</h5>
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
                <div class="form-group col-md-8">
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
import AuditToolbar from './components/AuditToolbar'
export default {
  data() {
    return {
      editmode: false,
      categories: {},
      alldata: {},
      counter: 1,
      form: new Form({
        id: '',
        ObjType: 27,
        description: '',
        CategoryID: '',
        CategoryObjType: 5,
        RiskLevelID: '',
        Name: ''
      })
    }
  },
  components:{AuditToolbar},
  methods: {
    getResults(page = 1) {
      axios
        .get('/api/category?page=' + page, {
          params: {
            ObjType: this.form.ObjType
          }
        })
        .then((response) => {
          this.categories = response.data
        })
    },

    loadData() {
      axios
        .get('/api/audit-scheduler', {
          params: {
            ObjType: this.form.ObjType
          }
        })
        .then((res) => {
          if (res.data.ResultCode == 1200) {
            this.alldata = res.data.ResponseData
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
          // Send request to the server
          if (result.value) {
            this.form
              .delete('/api/category/' + id)
              .then(() => {
                swal.fire('Deleted!', 'Your file has been deleted.', 'success')
                Fire.$emit('AfterCreate')
              })
              .catch(() => {
                swal.fire('Failed!', 'Something when wrong', 'warning')
              })
          }
        })
    },

    NewItem() {
      this.$router.push({ name: 'NewAuditSchedule' })
    },

    editModal(mode) {
      this.editmode = true
      this.form.reset()
      $('#addNew').modal('show')
      this.form.fill(mode)
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
