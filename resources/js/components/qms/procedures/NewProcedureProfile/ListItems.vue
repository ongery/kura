<template>
  <div class="row">
    <div class="col-md-12">


      
      <!-- begin:card -->
      <div class=" mb-5 mt-2">

        <!-- begin:card-header -->
        <div class="card-header">
          
          <h3 class="text-gray-800 text-hover-success fw-bold" style="font-size: 20px; margin-top: 21px;">{{msg}}</h3>

          <div class="d-flex align-items-center gap-2 gap-lg-3">

            <!--begin::Primary button-->
              <a href="#" @click.prevent="newModal"
                class="btn btn-sm fw-bold btn-success btn-active-color-dark" >
                Add {{msg}}        
              </a>
              <!--end::Primary button-->

          </div>

        </div>
        <!-- end:card-header -->

      </div>
      <!-- end:card -->



      <div class="card">

        <!-- <div class="card-header">
          <h3 class="card-title">{{msg}}</h3>
          <div class="card-tools">
            <a
              class="btn btn-success btn-sm"
              @click="newModal"
            >
              Add {{msg}}
            </a>
          </div>
        </div> -->
        <!-- /.card-header -->








                
      <!--begin::Tables Widget 3-->
      <div class="card card-xl-stretch mb-5 mb-xl-12">

        <!--begin::Body-->
        <div class="card-body py-3">
            <!--begin::Table container-->
            <div class="table-responsive">
                <!--begin::Table-->
                <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">

                    <!--begin::Table head-->
                    <thead>
                        <tr class="fw-bolder text-muted">
                          <th>#</th>
                          <th>Description</th>
                        </tr>
                    </thead>
                    <!--end::Table head-->

                    <!--begin::Table body-->
                    <tbody>
        
                        <tr v-for="mode in  filteredCauses" :key="mode.id">

                            <td>
                              <div class="d-flex justify-content-start flex-column">
                                <span style="color: #258c37;" class="fw-bold  text-hover-success fs-6">{{ mode.DocNum }} </span>
                              </div>
                            </td>

                            <td>
                              <span  v-if=" msg === 'Method' " style="color: #258c37;" class="text-hover-success d-block fs-6"> {{ mode.Description }}</span>
                              <span v-if=" msg != 'Method' " style="color: #258c37;" class="text-hover-success d-block fs-6"> {{ mode.Description }}</span>
                            </td>

                            <td>
                              <a href="#" style="color: #258c37;"  @click.prevent="moveUp(mode.id)" class="text-hover-success d-block fs-6">
                                <i class="fa fa-arrow-up green"></i>
                              </a>
                            </td>
                              
                            <td>
                              <a href="#" style="color: #258c37;" @click.prevent="editModal(mode)" class="text-hover-success d-block fs-6">
                                <i class="fa fa-edit blue"></i>
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












        <!-- <div class="card-body table-responsive p-0">
          <table class="table table-bordered table-hover mt-2">
            <thead class="thead-light">
              <th>#</th>
              <th>Description</th>
              <th></th>

            </thead>
            <tbody>
              <tr
                v-for="mode in  filteredCauses"
                :key="mode.id"
              > -->

                <!-- <td>{{ mode.DocNum }}</td>
                <td>{{ mode.Description }}</td>
                <td>
                  <a
                    href="#"
                    @click="moveUp(mode.id)"
                  >
                    <i class="fa fa-arrow-up green"></i>
                  </a> -->


                  <!-- / -->
                  
                  <!-- <a
                    href="#"
                    @click="editModal(mode)"
                  >
                    <i class="fa fa-edit blue"></i>
                  </a> -->
                  
                  
                  <!-- / -->


                  <!-- <a
                    href="#"
                    @click="deleteRoute(mode.id)"
                  >
                    <i class="fa fa-trash red"></i>
                  </a> -->


                <!-- </td> -->

              <!-- </tr>
            </tbody>
          </table>
        </div> -->



      </div>
      <!-- /.card -->


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
        class="modal-dialog"
        role="document"
      >
        <div class="modal-content">
          <div class="modal-header">
            <h5
              class="modal-title"
              id="addNewLabel"
            >Manage {{msg}}</h5>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form @submit.prevent="editmode ?   updateData() : createData()">
            <div class="modal-body">
              <div class="form-row">

                <div class="form-group col-md-12">
                  <label for>Value</label>
                  <textarea
                    v-model="form.Description"
                    type="text"
                    rows="10"
                    placeholder="Description"
                    class="form-control"
                    required
                    :class="{ 'is-invalid': form.errors.has('Description') }"
                  />
                  <has-error
                    :form="form"
                    field="Description"
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
export default {
  data() {
    return {
      editmode: false,
      showmode: '',
      filteredCauses: {},
      procedure_id: '',
      form: new Form({
        id: '',
        procedure_id: '',
        Description: ''
      })
    }
  },
  watch: {
    '$route.params.id': {
      handler: 'setRiskId',
      immediate: true
    },
    category_id: {
      handler: 'fetchCategoryData',
      immediate: true
    }
  },
  props: {
    msg: String,
    category_id: Number
  },
  methods: {
    setRiskId(id) {
      this.procedure_id = id
    },

    fetchCategoryData(category_id) {
      axios
        .get('/api/procedure_process_rows', {
          params: {
            category_id: category_id,
            procedure_id: this.procedure_id
          }
        })
        .then((res) => {
          if (res.data.ResultCode == 1200) {
            this.filteredCauses = res.data.ResponseData
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

    createData() {
      this.form.category_id = this.category_id
      this.form.procedure_id = this.procedure_id
      console.log(this.procedure_id)
      this.$Progress.start()

      this.form
        .post('/api/procedure_process_rows')
        .then((res) => {
          if (res.data.ResultCode == 1200) {
            $('#addNew').modal('hide')
            this.fetchCategoryData(this.category_id)
            toast.fire({
              type: 'success',
              title: 'Created successfully'
            })
            this.$Progress.finish()
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

    updateData() {
      this.$Progress.start()
      this.form
        .put('/api/procedure_process_rows_update/' + this.form.id)
        .then(() => {
          toast.fire({
            type: 'error',
            title: 'Updated Successfully'
          })
          this.$Progress.finish()
          $('#addNew').modal('hide')
          this.fetchCategoryData(this.category_id)
        })
        .catch((e) => {
          this.$Progress.fail()
          toast.fire({
            type: 'error',
            title: 'Operation not successfull' + '\n' + e.response.data.message
          })
        })
    },

    moveUp(id) {
      this.$Progress.start()
      this.form
        .put('/api/procedure_process_rows/' + id)
        .then(() => {
          toast.fire({
            type: 'error',
            title: 'Updated Successfully'
          })
          this.$Progress.finish()
          this.fetchCategoryData(this.category_id)
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
    newModal() {
      this.editmode = false
      this.form.reset()
      $('#addNew').modal('show')
    },
    editModal(user) {
      this.editmode = true
      this.form.reset()
      $('#addNew').modal('show')
      this.form.fill(user)
    }
  },

  created() {}
}
</script>
