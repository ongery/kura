<template>
  <div class="container mt-1">
    <div class="main-body">
      <div class="row gutters-sm">
        <div class="col-md-12">

          <div class="row gutters-sm">

            <div class="col-sm-4 mb-6">
              <div class="card h-100">
                <div class="card-body">
                  <h6 class="d-flex align-items-center mb-3">
                    Logo
                  </h6>
                  <a
                    href="#"
                    @click.prevent="viewImage()"
                  >
                    <img
                      :src="'uploads/' + this.setting.LogoPath"
                      alt="LetterHead"
                      width="100%"
                    />
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div
      class="modal fade"
      id="letterHead"
      data-keyboard="false"
      data-backdrop="static"
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
            >Organization Logo</h5>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form @submit.prevent="updateLetterHead()">
            <div class="modal-body">
              <div class="form-group">
                <label for="">Current Logo</label>
                <img
                  :src="'uploads/' + this.setting.letterhead"
                  alt="LetterHead"
                  width="100%"
                />
              </div>
              <div class="form-group">
                <label>Upload New</label>
                <input
                  class="form-control"
                  type="file"
                  name="records"
                  id="records"
                  required="required"
                />
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
                type="submit"
                class="btn btn-success"
              >Update</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div
      class="modal fade"
      id="logomodal"
      data-keyboard="false"
      data-backdrop="static"
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
            >Church Logo</h5>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form @submit.prevent="updateLogo()">
            <div class="modal-body">
              <div class="form-group">
                <label for="">Current Letter Header</label>
                <img
                  :src="'uploads/' + this.setting.logo"
                  alt="LetterHead"
                  width="100%"
                />
              </div>
              <div class="form-group">
                <label>Upload New</label>
                <input
                  class="form-control"
                  type="file"
                  name="logo"
                  id="logo"
                  required="required"
                />
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
                type="submit"
                class="btn btn-success"
              >Update</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div
      class="modal fade"
      id="buysms"
      data-keyboard="false"
      data-backdrop="static"
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
            >Buy SMS</h5>
          </div>
          <form @submit.prevent="loadSMS()">
            <div class="modal-body">
              <div class="form-group">
                <input
                  required
                  v-model="form.smsAmount"
                  type="text"
                  name="smsAmount"
                  placeholder="Amount"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('smsAmount') }"
                />
                <has-error
                  :form="form"
                  field="smsAmount"
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
                type="submit"
                class="btn btn-success"
              >Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div
      class="modal fade"
      id="addNew"
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
              v-show="editmode"
              id="addNewLabel"
            >
              Update Church Details
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
          <form @submit.prevent="updateChurch()">
            <div class="modal-body">
              <div class="form-row">
                <div class="form-group col-md-12">
                  <label for="">Church Name</label>
                  <input
                    v-model="form.name"
                    type="text"
                    name="name"
                    placeholder="Name"
                    class="form-control"
                    :class="{ 'is-invalid': form.errors.has('name') }"
                  />
                  <has-error
                    :form="form"
                    field="name"
                  ></has-error>
                </div>

                <div class="form-group col-md-6">
                  <label for="">Email</label>
                  <input
                    v-model="form.email"
                    type="email"
                    placeholder="Email Address"
                    class="form-control"
                    :class="{ 'is-invalid': form.errors.has('email') }"
                  />
                  <has-error
                    :form="form"
                    field="email"
                  ></has-error>
                </div>
                <div class="form-group col-md-6">
                  <label for="">Phone Number</label>
                  <input
                    v-model="form.phone_number"
                    type="text"
                    placeholder="Phone Number"
                    class="form-control"
                    :class="{ 'is-invalid': form.errors.has('phone_number') }"
                  />
                  <has-error
                    :form="form"
                    field="phone_number"
                  ></has-error>
                </div>
                <div class="form-group col-md-6">
                  <label for="">Domain</label>
                  <input
                    v-model="form.domain"
                    type="text"
                    placeholder="e.g example.co.ke"
                    required
                    class="form-control"
                    :class="{ 'is-invalid': form.errors.has('domain') }"
                  />
                  <has-error
                    :form="form"
                    field="domain"
                  ></has-error>
                </div>
                <div class="form-group col-md-6">
                  <label for="">Name Short Form</label>
                  <input
                    v-model="form.shortForm"
                    type="text"
                    placeholder="E.G P.C.F"
                    required
                    class="form-control"
                    :class="{ 'is-invalid': form.errors.has('shortForm') }"
                  />
                  <has-error
                    :form="form"
                    field="shortForm"
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
            </div>
          </form>
        </div>
      </div>
    </div>

    <div
      class="modal fade"
      id="addNew1"
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
              v-show="!editmode"
              id="addNewLabel"
            >
              Add New
            </h5>
            <h5
              class="modal-title"
              v-show="editmode"
              id="addNewLabel"
            >
              Update User's Info
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
              <div class="form-group">
                <label for="">Full Name</label>
                <input
                  v-model="form.name"
                  type="text"
                  name="name"
                  placeholder="Name"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('name') }"
                />
                <has-error
                  :form="form"
                  field="name"
                ></has-error>
              </div>

              <div class="form-group">
                <label for="">Email</label>
                <input
                  v-model="form.email"
                  type="email"
                  placeholder="Email Address"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('email') }"
                />
                <has-error
                  :form="form"
                  field="email"
                ></has-error>
              </div>
              <div class="form-group">
                <label for="">Phone Number</label>
                <input
                  v-model="form.phone_number"
                  type="text"
                  placeholder="Phone Number"
                  required
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('phone_number') }"
                />
                <has-error
                  :form="form"
                  field="phone_number"
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
      contactperson: {},
      setting: {},
      path: 'img/letterhead1.png',
      form: new Form({
        smsAmount: 0,
        id: '',
        name: '',
        email: '',
        phone_number: '',
        shortForm: '',
        domain: ''
      })
    }
  },
  methods: {
    loadSetting() {
      axios.get('/api/setting').then(({ data }) => (this.setting = data))
    },
    editModal() {
      this.form.id = this.setting.id
      this.form.name = this.setting.name
      this.form.email = this.setting.email
      this.form.phone_number = this.setting.phone_number
      this.form.domain = this.setting.domain
      this.form.shortForm = this.setting.shortForm
      this.editmode = true
      $('#addNew1').modal('show')
    },
    viewImage() {
      $('#letterHead').modal('show')
    },
    viewLogoImage() {
      $('#logomodal').modal('show')
    },
    buySMS() {
      $('#buysms').modal('show')
    },
    loadSMS() {
      if (this.form.smsAmount > this.setting.e_wallet_balance) {
        toast.fire({
          type: 'error',
          title: 'Insufficient Funds'
        })
      } else {
        this.$Progress.start()
        this.form
          .post('/api/buysms')
          .then((res) => {
            if (res.data.ResultCode == 1200) {
              $('#buysms').modal('hide')
              Fire.$emit('AfterCreate')
              toast.fire({
                type: 'success',
                title: 'Operations  successfully'
              })
              this.$Progress.finish()
            } else {
              this.$Progress.fail()
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

    newModal() {
      this.editmode = false
      this.form.reset()
      $('#addNew1').modal('show')
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
    updateLogo() {
      let formData = new FormData()
      const fileInput = document.getElementById('logo')
      formData.append('image', fileInput.files[0])
      this.$Progress.start()
      axios.post('/api/update_logo', formData).then(() => {
        Fire.$emit('AfterCreate')
        $('#logomodal').modal('hide')
        toast.fire({
          type: 'success',
          title: 'Upload Created in successfully'
        })
        this.$Progress.finish()
      })
    }
  },
  created() {
    this.loadSetting()
    Fire.$on('AfterCreate', () => {
      this.loadSetting()
    })
  }
}
</script>


<style scoped>
#letterHead {
  left: 2%;
  outline: none;
  overflow: hidden;
}
</style>
