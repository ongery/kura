<template>
  <div class="row mt-2">
    <div class="col-md-12">

      <!-- begin:card -->
      <div class="card mb-5 mt-2">

        <!-- begin:card-header -->
        <div class="card-header">
          <h3 class="card-title">Related Risks</h3>
          <!-- <div class="card-tools"> -->
        <div class="d-flex align-items-center gap-2 gap-lg-3">


          <!--begin::Primary button-->
            <a href="#" @click.prevent="addNewRiskCause"
              class="btn btn-sm fw-bold btn-success btn-active-color-dark" >
              Add Risks        
            </a>
            <!--end::Secondary button-->
          
        </div>
      </div>
        <!-- end:card-header -->

      </div>
      <!-- end:card -->



      <!-- <div class="card"> -->
        <!-- <div class="card-header">
          <h3 class="card-title">Related Risks </h3>
         
        </div> -->
        <!-- /.card-header -->



        <!--begin::Tables Widget 3-->
        <div class="card card-xl-stretch mb-5">
          <!--begin::Body-->
          <!-- <div class="card-body py-3"> -->
            <!--begin::Table container-->
            <!-- <div class="table-responsive"> -->


                  <!--begin::Table-->
                  <table class="table table-bordered table-hover mt-2">

                    <tbody>

                      <tr v-for="mode in  filteredCauses" :key="mode.id">

                                
                        <td>
                          <input
                            type="checkbox"
                            :value="mode.id"
                            @change="CountChecked(mode)"
                            v-model="mode.isSelected"
                          />
                        </td>
                        <td>
                          <a
                            href="#"
                            @click.prevent="moreDetails(mode.id)"
                          >
                            {{ mode.item.Name }}
                          </a>
                        </td>
                        
                      </tr>
                    </tbody>
                  </table>
                <!-- </div> -->
                <!--end:Table container-->

              <!-- </div> -->
              <!--end::Body-->

        </div>
        <!--end:Tables Widget 3-->

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
                <td>
                  <a
                    href="#"
                    @click="moreDetails(mode.id)"
                  >
                    {{ mode.item.Name }}
                  </a>
                </td>
              </tr>
            </tbody>
          </table>
        </div> -->


      <!-- </div> -->
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
              <table class="table table-bordered table-hover">
                <tbody>
                  <tr>
                    <td colspan="2">
                      <input
                        v-model="form.search"
                        type="text"
                        name="name"
                        @keyup="searchItem()"
                        placeholder="Search For Risk Lelel One"
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
      procedure_id: '',
      form: new Form({
        search: ''
      })
    }
  },
  watch: {
    '$route.params.id': {
      handler: 'loadLevelOneRisks',
      immediate: true
    },
    filteredCauses: {
      handler: 'setRelatedRisk',
      immediate: true
    }
  },
  methods: {
    CountChecked(mode) {
      var isSelected = mode.isSelected
    },
    loadLevelOneRisks(id) {
      this.procedure_id = id ?? this.procedure_id
      axios
        .get('/api/getLevelOneRiskForQMS', {
          params: {
            ProcedureID: id,
            ObjType: 11
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

    addNewRiskCause() {
      $('#addNew').modal('show')
    },

    moreDetails(id) {
      localStorage.clear()
      localStorage.setItem('risk_id', id)
      this.$router.push({ name: 'AnalyseRiskProfile' })
    },
    setRelatedRisk(data) {
      console.log('dsfasd')
      this.$emit('relatedRisk', data)
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
    Fire.$on('AfterCreate', () => {
      this.loadLevelOneRisks(this.procedure_id)
    })
  }
}
</script>
