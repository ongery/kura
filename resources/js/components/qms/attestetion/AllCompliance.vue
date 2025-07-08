<template>
  <div>
    <div class="row mt-2">
      <div class="col-md-12">


        <AttestetionToolbar :title="'All Attestation'"></AttestetionToolbar>


        <div class="card">
          <!-- <div class="card-header">
            <h3 class="card-title">All Attestation</h3>
            <div class="card-tools">
              <button
                class="btn btn-success btn-sm"
                @click="NewKRIItem"
              >
                <i class="fas fa-plus"></i>
                New
              </button>
              <button
                class="btn btn-info btn-sm"
                @click="MyKRIs"
              >
                <i class="fas fa-angle-double-left"></i>
                Back
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
                                <th>Name</th>
                                <th></th>
                              </tr>
                            </thead>

                            <!--begin::Table body-->
                            <tbody>

                              <tr v-for="mode in alldata" :key="mode.id">
                                <td class="fw-bold">{{ mode.DocNum }}</td>
                                <td>{{ mode.Name }}</td>
                                <td
                                  :class="{
                                  'bg-success': mode.color === 'bg-success',
                                  'bg-danger': mode.color === 'bg-danger',
                                    'bg-warning': mode.color === 'bg-warning',
                                    }"
                                  style="text-align:center"
                                >{{ mode.kri1.Value }}</td>              
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
                  <th>Name</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <tr
                  v-for="mode in alldata"
                  :key="mode.id"
                >
                  <td>{{ mode.DocNum }}</td>
                  <td>{{ mode.Name }}</td>
                  <td
                    :class="{
                'bg-success': mode.color === 'bg-success',
                 'bg-danger': mode.color === 'bg-danger',
                  'bg-warning': mode.color === 'bg-warning',
                  }"
                    style="text-align:center"
                  >{{ mode.kri1.Value }}</td>
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
import AttestetionToolbar from './components/AttestetionToolbar.vue'

export default {
  data() {
    return {
      editmode: false,
      categories: {},
      alldata: {},
      counter: 1,
      form: new Form({
        id: '',
        ObjType: 28,
        description: '',
        CategoryID: '',
        CategoryObjType: 21,
        RiskLevelID: '',
        Name: ''
      })
    }
  },
  components:{AttestetionToolbar},
  methods: {
    getResults(page = 1) {
      axios
        .get('/api/category?page=' + page, {
          params: {
            ObjType: this.form.ObjType,
            fetchAll: true
          }
        })
        .then((response) => {
          this.categories = response.data
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

    loadData() {
      axios
        .get('/api/kris-compliance', {
          params: {
            ObjType: this.form.ObjType,
            fetchAll: true
          }
        })
        .then((res) => {
          if (res.data.ResultCode == 1200) {
            this.alldata = res.data.ResponseData.data
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
    updateCategory() {
      this.$Progress.start()
      // console.log('Editing data');
      this.form
        .put('/api/category/' + this.form.id)
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

    MyKRIs() {
      this.$router.push({ name: 'MyAttestation' })
    },

    NewKRIItem() {
      this.$router.push({ name: 'NewAttestation' })
    },

    editModal(mode) {
      this.editmode = true
      this.form.reset()
      $('#addNew').modal('show')
      this.form.fill(mode)
    }
  },
  created() {
    this.loadCategory()
    this.loadData()
    Fire.$on('AfterCreate', () => {
      this.loadData()
    })
  }
}
</script>
