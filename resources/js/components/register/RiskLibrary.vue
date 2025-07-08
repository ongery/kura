<template>
  <div>
    <form>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label>Select Business Unit</label>
          <select
            class="form-control"
            v-model="form.BunitID"
          >
            <option
              v-for="val in businessunits"
              :value="val.id"
              :key="val.id"
            >
              {{ val.Name }}
            </option>
          </select>
        </div>
      </div>
    </form>
    <div class="card mt-2">
      <div class="card-header">
        <h3 class="card-title">Risk Library</h3>
        <div class="card-tools">

        </div>
      </div>

      <!-- /.card-header -->
      <div class="card-body table-responsive p-0">

        <table class="table table-bordered table-hover table-sm">
          <thead class="thead-light">
            <tr>
              <th>Ref</th>
              <th>Name</th>
              <th>Inherent </br> Consequence</th>
              <th>Inherent</br>Likelihood</th>
              <th>Inherent</br>Risk Level</th>
              <th>Consequence </br> Control Effectiveness</th>
              <th>Likelihood </br> Control Effectiveness</th>
              <th>Residual </br> Consequence</th>
              <th>Residual </br> Likelihood</th>
              <th>Residual </br> Risk Level</th>
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
              <td>{{ mode.ic }}</td>
              <td>{{ mode.il }}</td>
              <td class="bg-danger">{{ mode.ir }}</td>
              <td>{{ mode.cc }}</td>
              <td>{{ mode.cl }}</td>
              <td>{{ mode.rc }}</td>
              <td>{{ mode.rl }}</td>
              <td class="bg-danger">{{ mode.rc * mode.rl }}</td>
              <td>
                <a
                  href="#"
                  @click.prevent="moreDetails(mode.id)"
                ><i class="fa fa-edit blue"></i></a>
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
</template>

<script>
export default {
  data() {
    return {
      editmode: false,
      categories: {},
      alldata: {},
      businessunits: {},
      counter: 1,
      form: new Form({
        id: '',
        ObjType: 12,
        BUObjType: 5,
        BunitID: {},
        Name: ''
      })
    }
  },
  methods: {
    getAuthToken() { return localStorage.getItem('authToken'); },
    getResults(page = 1) {
      const token = this.getAuthToken();
      axios
        .get('/api/category?page=' + page, {
          params: {
            ObjType: this.form.ObjType
          },
          withCredentials: true,
          headers: {
              'Authorization': `Bearer ${token}`
          }
        })
        .then((response) => {
          this.categories = response.data
        })
    },

    loadBusinessUnits() {
      const token = this.getAuthToken();
      axios
        .get('/api/businessunits', {
          params: {
            ObjType: this.form.BUObjType
          },
          withCredentials: true,
          headers: {
              'Authorization': `Bearer ${token}`
          }
        })
        .then((res) => {
          if (res.data.ResultCode == 1200) {
            this.businessunits = res.data.ResponseData.data
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
    moreDetails(id) {
      localStorage.clear()
      localStorage.setItem('risk_id', id)
      this.$router.push({
        name: 'AnalyseRiskProfile'
      })
    }
  },
  created() {
    this.loadBusinessUnits()
    Fire.$on('AfterCreate', () => {
      this.loadData()
    })
  }
}
</script>
