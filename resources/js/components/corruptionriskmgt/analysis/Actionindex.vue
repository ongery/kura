<template>
  <div class="row mt-2">
    <div class="col-md-12">

      <div>
      
        <!-- begin:card -->
        <div class="card mb-5 mt-2">

          <!-- begin:card-header -->
          <div class="card-header">
            <h3 class="card-title">Corruption Prevention Strategies</h3>
              
              <!--begin::Actions-->
              <div class="d-flex align-items-center gap-2 gap-lg-3">
                <!--begin::Primary button-->
                  <a href="#" @click.prevent="addNew"
                    class="btn btn-sm fw-bold btn-success btn-active-color-dark" >
                    New Strategy        
                  </a>
                <!--end::Secondary button-->
              </div>
              <!--end::Actions-->

          </div>
          <!-- end:card-header -->

        </div>
        <!-- end:card -->



        <!-- <div class="card-header">
          <h3 class="card-title">Corruption Prevention Strategies</h3>
          <div class="card-tools">
            <button
              class="btn btn-success btn-sm"
              @click="addNew"
            >
              New Strategy
            </button>
          </div>
        </div> -->
        <!-- /.card-header -->

        
        <div class="card card-body table-responsive p-5">
          <table class="table table-bordered table-hover mt-2">
        <!-- <div class="card-body table-responsive p-0"> -->
          <!-- <table class="table table-bordered table-hover table-sm"> -->
            <thead class="fw-bolder text-muted">
              <tr>
                <th>Name</th>
                <th>Supervisor</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr
                v-for="mode in alldata"
                :key="mode.id"
              >
                <td>{{ mode.Name }}</td>
                <td>{{mode.supervisor.Fname}}</td>
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
    loadData() {
      axios
        .get('/api/loadCorruptionPreventionStrategy', {
          params: {
            RiskID: localStorage.risk_id
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
    addNew() {
      this.$router.push({ name: 'CRMActionTrackingCreate' })
    },
    moreDetails(id) {
      localStorage.setItem('action_id', id)
      this.$router.push({ name: 'CRMActionProfile' })
    }
  },
  created() {
    this.loadData()
  }
}
</script>
