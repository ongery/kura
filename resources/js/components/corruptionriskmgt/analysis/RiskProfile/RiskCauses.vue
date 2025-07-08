<template>
  <div class="row mt-2">
    <div class="col-md-12">



      <div>

        
      <!-- begin:card -->
      <div class="card mb-5 mt-2">

        <!-- begin:card-header -->
        <div class="card-header">
          <h3 class="card-title">Risk Methods</h3>
            
            <!--begin::Actions-->
            <div class="d-flex align-items-center gap-2 gap-lg-3">
              <!--begin::Primary button-->
                <a href="#" @click.prevent="addNewRiskCause"
                  class="btn btn-sm fw-bold btn-success btn-active-color-dark" >
                  Add Risk Method        
                </a>
              <!--end::Secondary button-->
            </div>
            <!--end::Actions-->

        </div>
        <!-- end:card-header -->

      </div>
      <!-- end:card -->



        <!-- <div class="card-header">
          <h3 class="card-title">Risks Methods</h3>
          <div class="card-tools">
            <a
              class="btn btn-success btn-sm"
              @click="addNewRiskCause"
            >
              Add Risk Method
            </a>
          </div>
        </div> -->

        <!-- /.card-header -->
        <div class="card-body table-responsive p-5">
          <table class="table table-bordered table-hover mt-2">
           
        <!-- <div class="card card-body table-responsive p-0">
          <table class="table table-bordered table-hover mt-2"> -->
            <!-- <thead class="thead-light">
            </thead> -->

            
            <tbody>
              <tr
                v-for="mode in  riskmethods"
                :key="mode.id"
              >
                <td>
                  <input
                    type="checkbox"
                    :value="mode.id"
                  />
                </td>
                <td>{{ mode.Name }}</td>
              </tr>
            </tbody>
          </table>
        </div>



      </div>
      <!-- /.card -->



    </div>

    <!-- Modal -->
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
            >Risk Method</h5>
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
export default {
  data() {
    return {
      editmode: false,
      showmode: '',
      riskmethods: {},
      form: new Form({
        id: '',
        ObjType: 35,
        description: '',
        o_r_i_s_k_id: '',
        Name: ''
      })
    }
  },
  methods: {
    createData() {
      this.form.o_r_i_s_k_id = localStorage.risk_id
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

    loadRiskMethods() {
      axios
        .get('/api/getRiskMethods', {
          params: {
            RiskID: localStorage.risk_id,
            ObjType: 34
          }
        })
        .then((res) => {
          if (res.data.ResultCode == 1200) {
            this.riskmethods = res.data.ResponseData
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
    addNewRiskCause() {
      $('#addNew').modal('show')
    },
    searchItem() {
      Fire.$emit('searching')
    }
  },
  created() {
    this.loadRiskMethods()
    Fire.$on('AfterCreate', () => {
      this.loadRiskMethods()
    })
  }
}
</script>
