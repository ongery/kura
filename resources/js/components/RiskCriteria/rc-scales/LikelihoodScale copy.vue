<template>
  <div>
    <div class="row mt-2">
      <div class="col-md-12">


         <!-- begin:card -->
         <div class="card" style="margin-left: 17px; margin-right: 17px">

          <!-- begin:card-header -->
          <div class="card-header">

              <h3 class="card-title">Details</h3>

              <div class="card-tools align-items-center py-5">

                <!--begin::Upload button-->
                <span
                  @click="newModal"
                  class="btn btn-sm fw-bold text-white-400 btn-success btn-active-color-dark" >
                  Upload        
                </span>
                <!--end::Upload button-->

              </div>

          </div>
          <!-- end:card-header -->

        </div>
        <!-- end:card -->

        <div class="card">

          <!-- <div class="card-header">
            <h3 class="card-title">Likelihood</h3>
            <div class="card-tools">
              <button
                class="btn btn-success btn-sm"
                @click="newModal"
              >
                Upload
                <i class="fas fa-plus"></i>
              </button>
            </div>
          </div> -->
          <!-- /.card-header -->


          <div class="card-body table-responsive p-0">
            <table class="table table-bordered table-hover table-sm">
              <thead class="thead-light">

                <tr>
                  <th></th>
                  <th>Descriptor</th>
                  <th>Frequency</th>
                  <th>Probability</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>5</td>
                  <td>Almost Certain</td>
                  <td>Likely to arise within the next 0 -3 months </td>
                  <td>Strong probability (>90%) that the risk event will occur </td>

                </tr>
                <tr>
                  <td>4</td>
                  <td>Likely</td>
                  <td>Likely to arise within the next 3 – 6 months </td>
                  <td>Probable that the risk event will occur (55 - 89%)</td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>Possible</td>
                  <td>Possible to occur within the next 6 – 9 months</td>
                  <td>Risk event could potentially take place (25 - 54%)</td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Rare </td>
                  <td>Possible to occur within the next 9 months - 1 year</td>
                  <td>Risk event not expected to happen, however an outside chance exists (5 - 24%)</td>
                </tr>
                <tr>
                  <td>1</td>
                  <td>Unlikely</td>
                  <td>Not likely to happen within the next 1 year or only in exceptional circumstances.</td>
                  <td>Likely in exceptional circumstances (0 - 4%)</td>
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
        class="modal-dialog"
        role="document"
      >
        <div class="modal-content">
          <div class="modal-header">
            <h5
              class="modal-title"
              id="addNewLabel"
            >
              Consequence Scale Group
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
          <form @submit.prevent="editmode ? updateData() : createData()">
            <div class="modal-body">
              <div class="form-group">
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
      alldata: {},
      counter: 1,
      form: new Form({
        id: '',
        ObjType: 10,
        description: '',
        CategoryID: '',
        CategoryObjType: 1,
        RiskLevelID: '',
        Name: ''
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
        .get('/api/risklibrarysetup', {
          params: {
            ObjType: this.form.ObjType
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
    createData() {
      this.$Progress.start()
      this.form
        .post('/api/risklibrarysetup')
        .then((res) => {
          if (res.data.ResultCode == 1200) {
            $('#addNew').modal('hide')
            Fire.$emit('AfterCreate')
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
    this.loadCategory()
    this.loadData()
    Fire.$on('AfterCreate', () => {
      this.loadData()
    })
  }
}
</script>
