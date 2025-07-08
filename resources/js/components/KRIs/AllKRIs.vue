<template>
  <div>
    <div class="row mt-2">
      <div class="col-md-12">


        <KRIRiskToolbar :title="'All KRI Items'"></KRIRiskToolbar>

        <div class="card">
          <!-- <div class="card-header">
            <h3 class="card-title">All KRI Items</h3>
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
  
                  <!--begin::Header-->
                  <!-- <div class="card-header border-0 pt-5">
                      <h3 class="card-title align-items-start flex-column">
                          <span class="card-label fw-bolder fs-3 mb-1 text-muted">Overview</span>
                      </h3>
                  </div> -->
                  <!--end::Header-->
  
  
                  <!--begin::Body-->
                  <div class="card-body py-3">
                      <!--begin::Table container-->
                      <div class="table-responsive">
                          <!--begin::Table-->
                          <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                              <!--begin::Table head-->
                            
                              <thead>
                                <tr class="fw-bolder text-muted">
                                  <th>Ref</th>
                                  <th>Name</th>
                                  <th>Frequency</th>
                                  <th></th>
                                </tr>
                              </thead>
                              <!--end::Table head-->
  
  
                              <!--begin::Table body-->
                              <tbody>
                  
                                  <tr v-for="mode in alldata" :key="mode.id">
                                      
                                      <td>
                                          <div class="d-flex justify-content-start flex-column">
                                            <a style="color: #258c37;" href="#" @click.prevent="editModal(mode)">
                                              {{ mode.DocNum }} 
                                               <i class="fa fa-edit blue"></i>
                                           
                                             </a>
                                             
                                          </div>
                                      </td>
      
      
                                      <td>
                                          <a  style="color: #258c37;" href="#" @click.prevent="editModal(mode)" class="text-dark fw-bolder text-hover-success d-block fs-6">{{ mode.Name }}</a>
                                      </td>
      
                                      <td>
                                          <a class="text-dark fw-bolder text-hover-success d-block fs-6">{{ mode.freq }}</a>
                                          <!-- <span class="text-muted fw-bold text-muted d-block fs-7">Web, UI/UX Design</span> -->
                                      </td>
      
                                      <td style="text-align:center">
                                          <a href="#" class="text-dark fw-bolder text-hover-danger d-block fs-6"  @click.prevent="deleteRoute(mode.id)"> 
                                              <i class="fa fa-trash red"></i>
                                            </a>
                                          <!-- <span class="text-muted fw-bold text-muted d-block fs-7">Web, UI/UX Design</span> -->
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
                  <th>Ref</th>
                  <th>Name</th>
                  <th>Frequency</th>
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
                      href="#"
                      @click="editModal(mode)"
                    >
                      <i class="fa fa-edit blue"></i>

                      {{ mode.DocNum }} </a>
                  </td>
                  <td>{{ mode.Name }}</td>
                  <td>{{ mode.freq }}</td>
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
import KRIRiskToolbar from './components/KRIRiskToolbar.vue'

export default {
  data() {
    return {
      editmode: false,
      categories: {},
      alldata: {},
      counter: 1,
      form: new Form({
        id: '',
        ObjType: 17,
        description: '',
        CategoryID: '',
        CategoryObjType: 5,
        RiskLevelID: '',
        Name: ''
      })
    }
  },
  components:{KRIRiskToolbar},
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
      this.$router.push({ name: 'MyKRIs' })
    },

    NewKRIItem() {
      this.$router.push({ name: 'NewKRIItem' })
    },

    editModal(mode) {
      this.$router.push({ name: 'EditKRI', params: { ObjType: mode.ObjType, id: mode.id } })
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
