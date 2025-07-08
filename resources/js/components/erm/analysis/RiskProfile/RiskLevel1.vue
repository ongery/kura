<template>
  <div class="row">
    <div class="col-md-12">


      <div class="card">


        <!-- start:card-header -->
        <div class="card-header mb-3">

          <h3  class="text-gray-800 text-hover-success fw-bold" style="font-size: 20px; margin-top: 21px;">Risks Level 1</h3>

          <!--begin::Actions-->
          <div class="d-flex align-items-center gap-2 gap-lg-3">
            <!--begin::Primary button-->
              <a href="#" @click.prevent="addNewRiskCause"
                class="btn btn-sm fw-bold btn-success btn-active-color-dark" >
                Add Risks        
              </a>
            <!--end::Secondary button-->
          </div>
          <!--end::Actions-->
  
        </div>
        <!-- end:card-header -->

<!--         
        <div class="card-header">
          <h3 class="card-title">Risks Level 1</h3>
          <div class="card-tools">
            <a
              class="btn btn-success btn-sm"
              @click="addNewRiskCause"
            >
              Add Risks
            </a>
          </div>
        </div> -->
        <!-- /.card-header -->







        <div class="d-flex flex-column mb-5 p-6 fv-row">

          <!-- <div class="form-group col-md-6"> -->

              <!--begin::Label-->
              <!-- <label class="fs-5 fw-semibold mb-2" for>Assignments</label> -->
              <!--end::Label-->

              <table class="table table-bordered table-hover table-sm mt-2">
<!-- 
                <thead class="thead-light">

                </thead> -->

                <tbody class="p-4">

                  <tr
                  v-for="mode in  filteredCauses"
                  :key="mode.id"
                >
                  <td>
                    <input
                      type="checkbox"
                      :value="mode.id"
                      @change="CountChecked(mode)"
                      v-model="mode.isSelected"
                    />
                  </td>
                  <td>{{ mode.item.Name }}</td>
                </tr>
                </tbody>

              </table>
          <!-- </div> -->

      </div>


        <!-- <div class="card-body table-responsive p-0">
          <table class="table table-bordered table-hover mt-2">
            <thead class="thead-light">
            </thead>
            <tbody>
              <tr
                v-for="mode in  filteredCauses"
                :key="mode.id"
              >
                <td>
                  <input
                    type="checkbox"
                    :value="mode.id"
                    @change="CountChecked(mode)"
                    v-model="mode.isSelected"
                  />
                </td>
                <td>{{ mode.item.Name }}</td>
              </tr>
            </tbody>
          </table>
        </div> -->



      </div>
      <!-- /.card -->
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
            >
              Risks Selection
            </h5>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form @submit.prevent="editmode ? updateCategory() : createCategory()">
            <div class="modal-body">
              <table class="table table-bordered table-hover  table-sm">
                <tbody>
                  <tr>
                    <td colspan="2">
                      <input
                        v-model="form.search"
                        type="text"
                        @keyup="searchItem()"
                        placeholder="Search Risk Selection"
                        class="form-control"
                      />
                    </td>
                  </tr>
                  <tr
                    v-for="mode in allLevelOneRisks"
                    :key="mode.id"
                  >
                    <td>
                      <input
                        type="checkbox"
                        :value="mode.id"
                        @change="CountChecked(mode)"
                        v-model="mode.isSelected"
                      />
                    </td>
                    <td>{{ mode.item.Name }}</td>
                  </tr>
                  <tr>

                  </tr>
                </tbody>
              </table>
            </div>
            <div class="modal-footer">
              <button
                type="button"
                class="btn btn-success"
                data-dismiss="modal"
              >
                Ok
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
      alldata: {},
      reports: {},
      filteredriskcauses: {},
      riskcauses: [],
      riskeffects: {},
      allcauses: {},
      allLevelOneRisks: [],
      RiskID: '',
      allLevelOneRisksSearched: [],
      form: new Form({
        search: ''
      })
    }
  },
  watch: {
    '$route.params.id': {
      handler: 'setRiskId',
      immediate: true
    }
  },
  methods: {
    setRiskId(id) {
      this.RiskID = id
    },
    CountChecked(mode) {
      var isSelected = mode.isSelected
      axios
        .get('/api/syncMainRiskRelationship', {
          params: {
            RiskID: this.RiskID,
            ItemID: mode.id,
            isSelected: isSelected,
            ObjType: mode.ObjType
          }
        })
        .then((res) => {
          if (res.data.ResultCode == 1200) {
            Fire.$emit('AfterCreate')
            toast.fire({
              type: 'success',
              title: 'Operation Successfull'
            })
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
            title: 'Operation not successfull' + '\n' + e.response.message
          })
        })
    },
    loadLevelOneRisks() {
      axios
        .get('/api/getLevelOneRisk', {
          params: {
            RiskID: this.RiskID,
            ObjType: 11,
            paginate: 1
          }
        })
        .then((res) => {
          if (res.data.ResultCode == 1200) {
            this.allLevelOneRisks = res.data.ResponseData
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
    loadRiskCauses() {
      axios
        .get('/api/getRiskCauses', {
          params: {
            RiskID: this.RiskID,
            ObjType: 7
          }
        })
        .then((res) => {
          if (res.data.ResultCode == 1200) {
            this.allcauses = res.data.ResponseData
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
  computed: {
    filteredCauses: function () {
      return this.allLevelOneRisks.filter(function (e) {
        if (e.isSelected == true) {
          return e
        }
      })
    }
  },
  created() {
    this.loadLevelOneRisks()
    Fire.$on('AfterCreate', () => {
      this.loadLevelOneRisks()
    })

    Fire.$on('searching', () => {
      let query = this.form.search
      if (this.form.search == null) {
        this.allLevelOneRisks = []
      } else {
        this.allLevelOneRisks = []
        axios
          .get('/api/findERMRiskLevelOne?q=' + query, {
            params: {
              RiskID: this.RiskID,
              ObjType: 11,
              paginate: 1
            }
          })
          .then((res) => {
            if (res.data.ResultCode == 1200) {
              this.allLevelOneRisks = res.data.ResponseData
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
    })
  }
}
</script>
