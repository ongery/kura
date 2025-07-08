<template>
  <div>
    <div class="row mt-2">
      <div class="col-md-12">

        <CrisToolbar :title="'My CRIs'"></CrisToolbar>

        <div>
          <!-- <div class="card-header">
            <h3 class="card-title">My CRIs</h3>
            <div class="card-tools">
              <button
                class="btn btn-success btn-sm"
                @click="AllKRIs"
              >
                All KPIs
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

                      <!--begin::Table-->
                      <table class="table table-row-dashed table-row-gray-300 align-middle p-0">

                        <thead class="fw-bolder text-muted">
                          <tr>
                            <th></th>
                            <th>Frequency</th>
                            <th>Name</th>
                            <th style="text-align:center">Value</th>
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
                                @click.prevent="attestModal(mode)"
                              >
                                <i class="fa fa-edit blue"></i>
                              </a>
                            </td>
                            <td>{{ mode.freq }}
                            </td>
                            <td>{{ mode.Name }}</td>
                            <td
                              :class="{
                          'bg-success': mode.color === 'bg-success',
                          'bg-danger': mode.color === 'bg-danger',
                            'bg-warning': mode.color === 'bg-warning',
                            }"
                              style="text-align:center"
                            >{{ mode.kri1 ?  mode.kri1.Value : null }}</td>

                          </tr>
                        </tbody>
                      </table>
                      
                  </div>
                  </div>
                  </div>
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
        class="modal-dialog modal-lg"
        role="document"
      >
        <div class="modal-content">
          <div class="modal-header">
            <h5
              class="modal-title"
              id="addNewLabel"
            >KPI Item Editor</h5>
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


import CrisToolbar from './components/CrisToolbar'


export default {
  data() {
    return {
      editmode: false,
      categories: {},
      alldata: {},
      counter: 1,
      form: new Form({
        id: '',
        ObjType: 36,
        description: '',
        CategoryID: '',
        CategoryObjType: 5,
        RiskLevelID: '',
        Name: ''
      })
    }
  },
  components:{CrisToolbar},
  methods: {
    getAuthToken() { return localStorage.getItem('authToken'); },

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
        .get('/api/kris-compliance', {
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
    manageHistory() {
        const token = this.getAuthToken();
        axios.post('/api/manage-logs', {
            'page_name': 'My CRIs',
            'log': 'User visited to the My CRIs'
        }, {
            withCredentials: true,
            headers: {
                'Authorization': `Bearer ${token}`
            }
        })
    },

    AllKRIs() {
      this.$router.push({ name: 'AllCRIs' })
    },
    attestModal(mode) {
      localStorage.clear()
      localStorage.setItem('isCompliance', 0)
      localStorage.setItem('kricompliance_id', mode.id)
      this.$router.push({ name: 'ItemProfile' })
    }
  },
  created() {
    this.loadData()
    this.manageHistory();
  }
}
</script>
