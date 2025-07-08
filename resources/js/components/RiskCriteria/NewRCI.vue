<template>
  <div class="row mt-2">

    <RiskToolbar :title="'New RCI'"></RiskToolbar>

    <NewRCIContent></NewRCIContent>


  </div>
</template>
<script>
import Datepicker from 'vuejs-datepicker'
import moment from 'moment'
import RiskToolbar from './components/RiskToolbar.vue'
import NewRCIContent from './components/NewRCIContent.vue'

export default {
  name:'NewRCI',
  data() {
    
    return {
      categories: {},
      riskevents: {},
      users: {},
      form: new Form({
        id: '',
        o_i_t_m_id: '',
        CategoryID: '',
        Name: '',
        description: '',
        Weight: '',
        Frequency: '',
        StartDate: new Date(),
        ExpiredDate: '',
        DataType: '',
        LowerLimit: '',
        GreenAmber: '',
        AmberRed: '',
        UpperLimit: '',
        ObjType: 40,
        CategoryObjType: 5,
        selectedAssignments: []
      }),
      state: {
        disabledDates: {
          from: new Date()
        }
      }
    }
  },
  components: {
    Datepicker, RiskToolbar,NewRCIContent
  },
  methods: {
    loadUsers() {
      axios
        .get('/api/user')
        .then((res) => {
          if (res.data.ResultCode == 1200) {
            this.users = res.data.ResponseData
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

    /**
     * Creating Risk
     */
    createData() {
      this.form.StartDate = moment(this.form.StartDate).format('YYYY-MM-DD')
      this.form.ExpiredDate = moment(this.form.ExpiredDate).format('YYYY-MM-DD')
      this.$Progress.start()
      this.form
        .post('/api/kris-compliance')
        .then((res) => {
          if (res.data.ResultCode == 1200) {
            toast.fire({
              type: 'success',
              title: 'Created in successfully'
            })
            this.$router.push({ name: 'AllKRIs' })
            this.$Progress.finish()
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
    loadCategory() {
      axios
        .get('/api/category', {
          params: {
            ObjType: this.form.CategoryObjType
          }
        })
        .then((res) => {
          if (res.data.ResultCode == 1200) {
            this.categories = res.data.ResponseData.data
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

    loadRiskEvents() {
      axios
        .get('/api/risklibrarysetup', {
          params: {
            ObjType: 10
          }
        })
        .then((res) => {
          if (res.data.ResultCode == 1200) {
            this.riskevents = res.data.ResponseData.data
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
    GoBack() {
      this.$router.back()
    }
  },
  created() {
    this.loadUsers()
    this.loadRiskEvents()
    this.loadCategory()
  }
}
</script>
