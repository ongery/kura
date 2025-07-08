<template>
  <div>
    <div class="row mt-2">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">All Potential Risks</h3>
          </div>

          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table class="table table-bordered table-hover table-sm">
              <thead class="thead-light">
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Created At</th>
                  <th>Created On</th>
                  <th>Approval Status</th>
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
                  <td>Kenneth Kibet</td>

                  <td>{{ mode.create_at | myDate }}</td>
                  <td>
                    {{
                        mode.Status == 0? 'Pending': 'Approved'
                    }}
                  </td>

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

    <!-- Modal -->
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
        ObjType: 12,
        Name: ''
      })
    }
  },
  methods: {
    getResults(page = 1) {
      axios
        .get(
          '/api/category?page=' + page,
          {
            params: {
              ObjType: this.form.ObjType
            }
          }
        )
        .then((response) => {
          this.categories =
            response.data
        })
    },

    loadData() {
      axios
        .get('/api/risks', {
          params: {
            ObjType: this.form.ObjType
          }
        })
        .then((res) => {
          if (
            res.data.ResultCode == 1200
          ) {
            this.alldata =
              res.data.ResponseData.data
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
            title:
              'Operation not successfull' +
              '\n' +
              e.response.data.message
          })
        })
    },

    deleteRoute(id) {
      swal
        .fire({
          title: 'Are you sure?',
          text:
            "You won't be able to revert this!",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText:
            'Yes, delete it!'
        })
        .then((result) => {
          // Send request to the server
          if (result.value) {
            this.form
              .delete(
                '/api/category/' + id
              )
              .then(() => {
                swal.fire(
                  'Deleted!',
                  'Your file has been deleted.',
                  'success'
                )
                Fire.$emit(
                  'AfterCreate'
                )
              })
              .catch(() => {
                swal.fire(
                  'Failed!',
                  'Something when wrong',
                  'warning'
                )
              })
          }
        })
    },
    moreDetails(id) {
      localStorage.clear()
      localStorage.setItem(
        'risk_id',
        id
      )
      this.$router.push({
        name: 'RiskProfile'
      })
    }
  },
  created() {
    this.loadData()
    Fire.$on('AfterCreate', () => {
      this.loadData()
    })
  }
}
</script>
