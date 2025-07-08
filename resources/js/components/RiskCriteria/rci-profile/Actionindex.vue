<template>
  <div class="row mt-2">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Improvement Action</h3>
          <div class="card-tools">
            <button
              class="btn btn-success btn-sm"
              @click="addNew"
            >
              New Action
            </button>
          </div>
        </div>

        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-bordered table-hover table-sm">
            <thead class="thead-light">
              <tr>
                <th>Name</th>
                <th>Due Date</th>
                <th>To</th>
                <th>Status</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr
                v-for="mode in alldata"
                :key="mode.id"
              >
                <td>{{ mode.Name }}</td>
                <td>{{ mode.DueDate }}</td>
                <td>{{mode.supervisor.Fname}}</td>
                <td>SuperVisor</td>
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
  </div>
</template>
<script>
export default {
  data() {
    return {
      showmode: '',
      alldata: {},
      reports: {}
    }
  },
  methods: {
    getAuthToken() { return localStorage.getItem('authToken'); },
    loadData() {
      axios
        .get('/api/actiontracking', {
          params: {
            o_k_r_i_id: localStorage.kricompliance_id
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
    manageHistory() {
        const token = this.getAuthToken();
        axios.post('/api/manage-logs', {
            'page_name': 'Improvement Action',
            'log': 'User visited to the Improvement Action'
        }, {
            withCredentials: true,
            headers: {
                'Authorization': `Bearer ${token}`
            }
        })
    },
    addNew() {
      this.$router.push({ name: 'KRITreatment' })
    }
  },
  created() {
    this.loadData()
    this.manageHistory();
  }
}
</script>
