<template>
  <div>
    <div class="row mt-2">
      <div class="col-md-12">


          <!-- begin:card (header)-->
          <div class="card mb-5 mt-2">

            <!-- begin:card-header -->
            <div class="card-header align-items-center bg-light">
              <h3 class="card-title fw-bold text-gray-600" style="font-size:medium;">Work In Progres</h3>

              <div class="card-tools align-items-center ">
   
                <!--begin::Actions-->
                <div class="d-flex align-items-center gap-2 gap-lg-3">
         
                  <!--begin::Primary button-->
                    <a href="#" @click.prevent="newModal"
                      class="btn btn-sm fw-bold btn-success btn-active-color-dark" >
                      Add New        
                    </a>
                  <!--end::Secondary button-->

                </div>
                <!--end::Actions-->

              </div>

            </div>
            <!-- end:card-header -->

          </div>
          <!-- end:card (header)-->




        <div class="card">
          <!-- <div class="card-header">
            <h3 class="card-title">Work In Progress</h3>
            <div class="card-tools">
              <a
                class="btn btn-success btn-sm"
                @click="newModal"
              >
                Add New
              </a>
            </div>
          </div> -->
          <!-- /.card-header -->





           <!--begin::Tables Widget 3-->
           <div class="card card-xl-stretch mb-5">
            <!--begin::Body-->
          
                <!--begin::Table-->
                <table class="table table-bordered table-hover mt-2">
                  
                  <thead class="thead-light">
                    <tr>
    
                      <th>Subject</th>
                      <th>Desciption</th>
                      <th>Created By</th>
                      <th>Downloads</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr
                    v-for="mode in categories"
                    :key="mode.id"
                    >
                    <td>
                      <a style="color: #258c37;"
                        href="#"
                        @click.prevent="editModal(mode)"
                      >{{mode.Name}}
                      </a>
                    </td>
                    <td>{{mode.description}}</td>
                    <td>{{ mode.user.full_name }}</td>
                    <td>
                      <a
                        :href="`/filedownload_wip/` + mode.id"
                        target="_blank"
                      >
                        <i
                          class="fa fa-download"
                          aria-hidden="true"
                        >Click to download</i>
  
                      </a>
                    </td>
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
                </table>
              <!-- </div> -->
              <!--end:Table container-->

            <!-- </div> -->
            <!--end::Body-->

      </div>
      <!--end:Tables Widget 3-->


          <!-- <div class="card-body table-responsive p-0">
            <table class="table table-bordered table-hover table-sm">
              <thead class="thead-light">
                <tr>

                  <th>Subject</th>
                  <th>Desciption</th>
                  <th>Created By</th>
                  <th>Downloads</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <tr
                  v-for="mode in categories"
                  :key="mode.id"
                >

                  <td>
                    <a
                      href="#"
                      @click="editModal(mode)"
                    >{{mode.Name}}
                    </a>
                  </td>
                  <td>{{mode.description}}</td>
                  <td>{{ mode.user.full_name }}</td>
                  <td>
                    <a
                      :href="`/filedownload_wip/` + mode.id"
                      target="_blank"
                    >
                      <i
                        class="fa fa-download"
                        aria-hidden="true"
                      >Click to download</i>

                    </a>
                  </td>
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
            >
              Work In Progress
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
          <form @submit.prevent="editmode ? updateCategory() : createWorkInProgress()">
            <div class="modal-body">
              <div class="form-group">
                <label for>Subject</label>
                <input
                  v-model="form.Name"
                  type="text"
                  placeholder="Name"
                  class="form-control"
                />
                <small class="text-danger">{{ error_name }} </small>
              </div>
              <div class="form-group">
                <label for>Description</label>
                <textarea
                  rows="3"
                  v-model="form.description"
                  placeholder="Description"
                  class="form-control"
                ></textarea>
                <small class="text-danger">{{ error_description }} </small>
              </div>
              <div
                class="form-group col-md-12"
                v-show="!editmode"
              >
                <label>Select File only PDF</label>
                <input
                  class="form-control"
                  type="file"
                  name="records"
                  id="records"
                />
                <small class="text-danger">{{ error_attachment }} </small>
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
      categories: {},
      counter: 1,
      error_name: '',
      error_description: '',
      error_attachment: '',
      form: new Form({
        id: '',
        Name: '',
        description: '',
        action_tracking_id: ''
      })
    }
  },
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
    loadWorkInProgress() {
      axios
        .get('/api/workinprogress', {
          params: {
            action_tracking_id: localStorage.action_id
          }
        })
        .then((res) => {
          if (res.data.ResultCode == 1200) {
            this.categories = res.data.ResponseData.data
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
    createWorkInProgress() {
      let formData = new FormData()
      const fileInput = document.getElementById('records')
      formData.append('records', fileInput.files[0] ?? null)
      formData.append('action_tracking_id', localStorage.action_id)
      formData.append('Name', this.form.Name)
      formData.append('description', this.form.description)

      this.$Progress.start()
      axios
        .post('/api/workinprogress', formData)
        .then((res) => {
          if (res.data.ResultCode == 1200) {
            $('#addNew').modal('hide')
            Fire.$emit('AfterCreate')
            toast.fire({
              type: 'success',
              title: 'Created Successfully'
            })
            this.$Progress.finish()
          } else {
            this.$Progress.finish()
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
          this.error_name = e.response.data.errors.Name
          this.error_description = e.response.data.errors.description
          this.error_attachment = e.response.data.errors.records
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

    newModal() {
      this.editmode = false
      this.form.reset()
      $('#addNew').modal('show')
    },
    editModal(mode) {
      this.editmode = true
      this.form.reset()
      $('#addNew').modal('show')
      this.form.fill(mode)
    }
  },
  created() {
    this.loadWorkInProgress()
    Fire.$on('AfterCreate', () => {
      this.loadWorkInProgress()
    })
  }
}
</script>
