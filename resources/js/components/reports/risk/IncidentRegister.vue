<template>
  <div>
    <div class="row mt-2">

     
      <div class="col-md-12">


        <RiskToolbar :title="'Incident Register'"></RiskToolbar>


        <div>
         
          <IncidentRegContent :reports="reports"></IncidentRegContent>

        </div>
        <!-- /.card -->
      </div>
    </div>
  </div>
</template>

<script>

// import RiskToolbar from './components/RiskToolbar.vue'
import RiskToolbar from './components/items/RiskToolbar.vue'
import IncidentRegContent from './components/Incidents/IncidentRegContent.vue'


export default {
  data() {
    return {
      reports: []
    }
  },
  methods: {
    getAuthToken() { return localStorage.getItem('authToken'); },
    summaryReport() {
      const token = this.getAuthToken();
      axios
        .get('/api/reports/incident-register',{
          withCredentials: true,
          headers: {
              Authorization: `Bearer ${token}`
          }
        })
        .then((res) => {
          if (res.data.ResultCode == 1200) {
            this.reports = res.data.ResponseData
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
            'page_name': 'Incident Register',
            'log': 'User visited to the Incident Register'
        }, {
            withCredentials: true,
            headers: {
                'Authorization': `Bearer ${token}`
            }
        })
    }

  },
  components:{RiskToolbar, IncidentRegContent},
  created() {
    this.summaryReport()
    this.manageHistory();

  }
}
</script>
