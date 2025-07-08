<template>
  <div>
    <div class="row mt-2">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Activies</h3>
            <div class="card-tools">
              <router-link to="/crm/CorruptionPreventionStrategy/Activity">
                <button class="btn btn-info btn-sm">
                  <i class="fas fa-plus"></i>
                  New
                </button>
              </router-link>
            </div>
          </div>

          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table class="table table-bordered table-hover table-sm">
              <thead class="thead-light">
                <tr>

                  <th>Name</th>
                  <th>Budget</th>
                  <th>Due Date</th>
                  <th>Status</th>
                  <th>Assignee</th>
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
                      style="color: #258c37;" 
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
                  <td></td>
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
          </div>
        </div>
        <!-- /.card -->
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
