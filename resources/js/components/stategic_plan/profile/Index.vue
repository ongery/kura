<template>
  <div class="container mt-1">

    <div class="clearfix"></div>
    <hr>
    <ul class="nav nav-tabs nav-tabs-dark">
      <li class="nav-item">
        <a
          class="nav-link"
          href="#"
          @click.prevent="showUploadAvatar"
        >Upload Avatar</a>
      </li>
      <li class="nav-item">
        <a
          class="nav-link"
          href="#"
          @click.prevent="showVision"
        >Vision</a>
      </li>
      <li class="nav-item">
        <a
          class="nav-link"
          href="#"
          @click.prevent="showMission"
        >Mission</a>
      </li>
      <li class="nav-item">
        <a
          class="nav-link"
          href="#"
          @click.prevent="showCoreValues"
        >CoreValues</a>
      </li>

    </ul>
    <div class="card row mt-2">
      <div class="card-header">
        <h3 class="card-title">{{this.title}}</h3>

        <div
          class="card-tools"
          v-show="!showAvatarDiv"
        >
          <button
            class="btn btn-success btn-sm"
            @click="newModal"
          >
            New {{this.title}}
            <i class="fas fa-plus"></i>
          </button>
        </div>
      </div>

      <!-- /.card-header -->
      <div
        class="card-body table-responsive p-4 text-center"
        v-show="showAvatarDiv"
      >

        <form
          method="POST"
          enctype="multipart/form-data"
        >
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label> Upload Avatar </label>
                <input
                  type="file"
                  class="form-control"
                  name="avatar"
                >
              </div>
            </div>
          </div>
          <button
            type="submit"
            class="btn btn-success btn-sm"
          > <i class="fa fa-upload"></i> Upload</button>
          <hr>
        </form>
      </div>

      <div
        class="card-body table-responsive p-0"
        v-show="!showAvatarDiv"
      >
        <table class="table table-bordered table-hover table-sm">
          <thead class="thead-light">
            <tr>

              <th>Description</th>
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
                  {{ mode.description}}
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
            >{{this.title}}</h5>
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

                <div class="form-group col-md-12">
                  <label for>{{this.title}}</label>
                  <textarea
                    rows="3"
                    v-model="form.description"
                    placeholder="Description"
                    class="form-control"
                    :class="{ 'is-invalid': form.errors.has('description') }"
                  ></textarea>
                  <has-error
                    :form="form"
                    field="Name"
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
      contactperson: {},
      alldata: [],
      path: 'img/letterhead1.png',
      title: '',
      showAvatarDiv: false,
      ObjType: 100,
      form: new Form({
        ObjType: '',
        description: '',
        id: ''
      })
    }
  },

  methods: {
    newModal() {
      this.editmode = false
      this.form.reset()
      $('#addNew').modal('show')
    },
    updateLetterHead() {
      let formData = new FormData()
      const fileInput = document.getElementById('records')
      formData.append('image', fileInput.files[0])
      this.$Progress.start()
      axios.post('/api/update_logo', formData).then(() => {
        Fire.$emit('AfterCreate')
        $('#letterHead').modal('hide')
        toast.fire({
          type: 'success',
          title: 'Upload Created in successfully'
        })
        this.$Progress.finish()
      })
    },
    showUploadAvatar() {
      this.showAvatarDiv = true
      this.title = 'Upload Avatar 1'
    },
    showVision() {
      this.showAvatarDiv = false
      this.ObjType = 100
      this.loadaAllData(100)
      this.title = 'Vision'
    },
    showMission() {
      this.showAvatarDiv = false
      this.ObjType = 101
      this.loadaAllData(101)
      this.title = 'Mission'
    },
    showCoreValues() {
      this.showAvatarDiv = false
      this.ObjType = 102
      this.loadaAllData(102)
      this.title = 'Core Values'
    },
    createData() {
      this.$Progress.start()
      this.form.ObjType = this.ObjType
      this.form
        .post('/api/profile_data')
        .then((res) => {
          if (res.data.ResultCode == 1200) {
            $('#addNew').modal('hide')
            Fire.$emit('AfterCreate')
            toast.fire({
              type: 'success',
              title: 'Created successfully'
            })
            this.$Progress.finish()
            this.loadaAllData(this.ObjType)
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
    loadaAllData(ObjType) {
      axios
        .get('/api/profile_data', {
          params: {
            ObjType: ObjType
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
    }
  },
  created() {
    this.showVision()
  }
}
</script>


