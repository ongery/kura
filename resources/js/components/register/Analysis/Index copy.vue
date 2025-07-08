<template>
  <div>

    <RiskAnalysisToolbar :title="'Risks 1'"></RiskAnalysisToolbar>

    <div class="card mt-2">

      <!-- <div class="card-header">
        <h3 class="card-title">Risks 1</h3>
        <div class="card-tools">
          <button
            class="btn btn-success btn-sm"
            @click="newAnalysis"
          >
            Add New
          </button>
        </div>
      </div> -->
      <!-- /.card-header -->


      <div class="card-body table-responsive p-0">
        <table class="table table-bordered table-hover table-sm">

          <thead class="thead-light">

            <th colspan="11">
              <form>
                <div class="form-row m-2">
                  <div class="form-group col-md-12">
                    <label>Select Business Unit</label>
                    <select
                      class="form-control"
                      @change="loadData()"
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
            </th>

            <tr>
              <th style="width:10%">Ref</th>
              <th style="width:70%">Risk Event</th>
              <th style="width:2%">I.C</th>
              <th style="width:2%">I.L</th>
              <th style="width:2%">I.R</th>
              <th style="width:2%">C.C</th>
              <th style="width:2%">L.C</th>
              <th style="width:2%">R.C</th>
              <th style="width:2%">R.L</th>
              <th style="width:2%">R.R</th>
              <th style="width:2%"></th>
            </tr>
          </thead>
          <tbody>
            <tr
              v-for="mode in alldata"
              :key="mode.id"
            >
              <td>
                <a
                  style="color: #258c37;"
                  href="#"
                  @click="moreDetails(mode.id)"
                >
                  {{ mode.DocNum }}
                </a>
              </td>

              <td style="word-wrap: break-word;min-width: 160px;max-width: 160px;">
                <a
                  style="color: #258c37;"
                  href="#"
                  @click="moreDetails(mode.id)"
                >

                  {{ mode.item.Name }}
                </a>

              </td>

              <td>{{ mode.ic }}</td>
              <td>{{ mode.il }}</td>

              <td
                style="background-color:#ec0d0d"
                v-if="mode.ir > 15"
              >{{ mode.ir }}</td>

              <td
                style="background-color:#ffbf00"
                v-else-if="mode.ir > 4"
              >{{ mode.ir }}</td>

              <td
                style="background-color:#09f17d"
                v-else-if="mode.ir >  0 && mode.ir < 4"
              >{{ mode.ir }}</td>

              <td v-else="mode.ir ==  0 ">{{ mode.ir }}</td>

              <td>{{ mode.cc }}</td>
              <td>{{ mode.cl }}</td>
              <td>{{ mode.rc }}</td>
              <td>{{ mode.rl }}</td>

              <td
                style="background-color:#ec0d0d"
                v-if=" mode.rc * mode.rl >= 15"
              >{{  mode.rc * mode.rl }}</td>

              <td
                style="background-color:#ffbf00"
                v-else-if=" mode.rc * mode.rl > 4"
              >{{  mode.rc * mode.rl }}</td>

              <td
                style="background-color:#09f17d"
                v-else-if="mode.rc * mode.rlr > 0 && mode.rc * mode.rlr <= 4"
              >{{  mode.rc * mode.rl }}</td>
              <td v-else="mode.rc * mode.rlr == 0">{{  mode.rc * mode.rl }}</td>

              <td>
                <a
                  href="#"
                  @click="deleteRoute(mode.id)"
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

import RiskAnalysisToolbar from '../components/RiskAnalysisToolbar'
import indexRiskAnalysisContent from '../components/content/indexRiskAnalysisContent.vue'


export default {
  
  data() {
    return {
      editmode: false,
      categories: {},
      alldata: {},
      counter: 1,
      businessunits: {},
      form: new Form({
        id: '',
        ObjType: 11,
        Name: '',
        BunitID: ''
      })
    }
  },
  components:{RiskAnalysisToolbar, indexRiskAnalysisContent},
  methods: {
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
        .get('/api/risks', {
          params: {
            ObjType: this.form.ObjType,
            BunitID: this.form.BunitID
          }
        })
        .then((res) => {
          if (res.data.ResultCode == 1200) {
            this.alldata = res.data.ResponseData.data
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
      this.$router.push({ name: 'AnalyseRiskProfile' })
    },
    newAnalysis() {
      this.$router.push({ name: 'AnalyseRiskNew' })
    },

    loadBusinessUnits() {
      axios
        .get('/api/businessunits', {
          params: {
            ObjType: this.form.BUObjType
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
    }
  },
  created() {
    this.loadBusinessUnits()
  }
}
</script>

<style scoped>
.danger {
  background-color: #d6a448;
}
.warning {
  background-color: #ffbf00;
}
.success {
  background-color: #09f17d;
}
</style>
