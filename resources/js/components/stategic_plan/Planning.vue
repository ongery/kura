<template>
  <div class="container mt-1">

    <hr>
    <ul class="nav nav-tabs nav-tabs-dark">
      <li class="nav-item">
        <a
          class="nav-link"
          @click.prevent="showProfile"
          href="#"
        >Profile</a>
      </li>
      <li class="nav-item">
        <a
          class="nav-link"
          @click.prevent="showStrategicPillar"
          href="#"
        >Strategic Piller</a>
      </li>
      <li class="nav-item">
        <a
          class="nav-link"
          @click.prevent="showScoreCard"
          href="#"
        >Score Card</a>
      </li>
      <li class="nav-item">
        <a
          class="nav-link"
          @click.prevent="showWorkPlan"
          href="#"
        >WorkPlan</a>
      </li>

    </ul>

    <!---- PROFILE    -->
    <div
      class="card row mt-2"
      v-show="showProfileDiv"
    >
      <div class="card-header">
        <h3 class="card-title">Our Profile</h3>

        <div class="card-tools">

          <router-link to="/strategic/profile_form">
            <button class="btn btn-success btn-sm">
              Create Profile
            </button>
          </router-link>

        </div>

      </div>

      <!-- /.card-header -->
      <div class="card-body table-responsive p-4 text-center">
        <!-- <div class="avatar py-4">
          @foreach ($avatars as $row)
          <img
            src="{{ asset('storage/avatars/' . $row->avatar) }}"
            width="80"
            height="80px"
            class="img-circle"
          >
          @endforeach
        </div> -->
        <hr>

        <h2>Vision</h2>
        <ul style="list-style: none;">
          <li v-for="mode in visions">
            <p>{{mode.description}}</p>
          </li>
        </ul>
        <hr>

        <h2>Mission</h2>
        <ul style="list-style: none;">
          <li v-for="mode in missions">
            <p>{{mode.description}}</p>
          </li>
        </ul>
        <hr>

        <h2>Core Values</h2>
        <ul style="list-style: none;">
          <li v-for="mode in corevalues">
            <p>{{mode.description}}</p>
          </li>
        </ul>
        <hr>
      </div>
    </div>

    <StrategicPillar v-show="showPillar"></StrategicPillar>
    <ScoreCard v-show="showScoreCardDiv"></ScoreCard>
    <WorkPlan v-show="showWorkPlanDiv"></WorkPlan>
  </div>
</template>

<script>
import StrategicPillar from './StrategicPiller/Index.vue'
import ScoreCard from './ScoreCard/Index.vue'
import WorkPlan from './WorkPlan/Index.vue'
export default {
  data() {
    return {
      editmode: false,
      showPillar: false,
      showProfileDiv: false,
      showScoreCardDiv: false,
      showWorkPlanDiv: false,
      contactperson: {},
      visions: {},
      missions: {},
      corevalues: {},
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
  components: {
    StrategicPillar,
    ScoreCard,
    WorkPlan
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

    fetchData() {
      const numbers = [100, 101, 102]
      numbers.forEach(this.loadaAllData)
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
            if (ObjType == 100) {
              this.visions = res.data.ResponseData
            }

            if (ObjType == 101) {
              this.missions = res.data.ResponseData
            }
            if (ObjType == 102) {
              this.corevalues = res.data.ResponseData
            }
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
    showProfile() {
      this.showProfileDiv = true
      this.showPillar = false
      this.showScoreCardDiv = false
      this.showWorkPlanDiv = false
    },
    showStrategicPillar() {
      this.showProfileDiv = false
      this.showPillar = true
      this.showScoreCardDiv = false
      this.showWorkPlanDiv = false
    },
    showScoreCard() {
      this.showProfileDiv = false
      this.showPillar = false
      this.showScoreCardDiv = true
      this.showWorkPlanDiv = false
    },
    showWorkPlan() {
      this.showProfileDiv = false
      this.showPillar = false
      this.showScoreCardDiv = false
      this.showWorkPlanDiv = true
    }
  },
  created() {
    this.fetchData()
    this.showScoreCard()
  }
}
</script>


