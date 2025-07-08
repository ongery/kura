<template>
  <div class="row mt-2">


    
    <!--begin::Toolbar-->
    <div class="app-toolbar py-3">

      <!--begin::Toolbar container-->
      <div id="kt_app_toolbar_container" class="app-container  container-xxl d-flex flex-stack ">

        <!--begin::Page title-->
        <div class="mb-2 mt-4 page-title d-flex flex-column justify-content-start flex-wrap">

          <!--begin::Title-->
          <h1 class="page-heading d-flex text-dark text-white-400 fw-bold fs-3 flex-column">
           (New) Risk Analysis
          </h1>
          <!--end::Title-->

          <!--begin::Breadcrumb-->
          <ol style="margin-left: -6px;" role="list"
            class="flex items-center space-x-4 breadcrumb  breadcrumb-separatorless text-gray-400 fw-semibold pt-1">
            <li>
              <div>
                <a href="#" class="text-gray-400 hover:text-gray-500">
                  <!-- Heroicon name: solid/home -->
                  <svg class="flex-shrink-0 h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                    fill="currentColor" aria-hidden="true">
                    <path
                      d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                  </svg>
                  <span class="sr-only">Dashboard</span>
                </a>
              </div>
            </li>
            <!--begin::Item-->
            <li class="breadcrumb-item text-muted">

              <div class="flex items-center">

                <a href="#" class="text-gray-500 mt-1 fw-semibold fs-6 text-muted ">
                  Risk Analysis

                </a>

              </div>

            </li>
            <!--end::Item-->

            <!--begin::Item-->
            <li class="breadcrumb-item text-muted">

              <div class="flex items-center">
                -
                <a href="#" class="text-gray-500 mt-1 fw-semibold fs-6 text-muted ml-4 text-hover-success">
                  New Entry
                </a>

              </div>

            </li>
            <!--end::Item-->


          </ol>
          <!--end::Breadcrumb-->

        </div>
        <!--end::Page title-->



        <!--begin::Actions-->
        <div class="d-flex align-items-center gap-2 gap-lg-3">

          <!-- <BackButton></BackButton> -->

                
            <!--begin::Primary button-->
            <a href="#" @click.prevent="GoBack"
            class="btn btn-sm fw-bold btn-info btn-active-color-dark" >
            Back        
          </a>
          <!--end::Secondary button-->


        </div>
        <!--end::Actions-->

      </div>
      <!--end::Toolbar container-->

    </div>
    <!--end::Toolbar-->









 <!--begin::Col-->
 <div class="col-xl-12">

  <!--begin::Tables Widget 3-->
  <div class="card card-xl-stretch mb-5 mb-xl-12">

      <!--begin::Header-->
      <div class="card-header border-0 pt-5">
    
            <!--begin::Col-->
            <div class="col-md-11 pb-5 fv-row">

                <!-- <form> -->
                <form @submit.prevent="saveRisk()">

                  <!--end::Label-->
                  <!-- <h6 class="fs-5 fw-bolder mb-2">Select Business Unit</h6> -->
                  <!--end::Label-->

                  <h3 class="align-items-start flex-column pt-5">
                      <span class="card-label fw-bold fs-3 mb-1 pt-5">Select Risk Event</span>
                      <!-- <span class="text-muted mt-1 fw-bold fs-7">Over 500 members</span> -->
                  </h3>
          
                  <select
                    class="form-control mt-3"
                    v-model="form.o_i_t_m_id"
                    name="o_i_t_m_id"
                    :class="{ 'is-invalid': form.errors.has('o_i_t_m_id') }"
                  >
                    <option
                      v-for="val in riskevents"
                      :value="val.id"
                      :key="val.id"
                    >
                      {{ val.Name }}
                    </option>
                  </select>
                  <has-error
                    :form="form"
                    field="o_i_t_m_id"
                  ></has-error>

                  
                  <div class="modal-footer mt-5">
                    <button
                      type="submit"
                      class="btn btn-primary"
                    >Save</button>
                  </div>
                </form>
              <!--end::Select-->
              
          </div>
          <!--end::Col-->

      </div>
      <!--end::Header-->
  </div>

</div>

    <!-- /.card-header -->
    <!-- <div class="card card-body table-responsive p-0"> -->
      <!-- <div> -->
        <!-- <form @submit.prevent="saveRisk()"> -->
          <!-- <div class="modal-body"> -->
            <!-- <div class="form-row">

              <div class="form-group col-md-6">
                <label>Risk Event</label>
                <select
                  class="form-control"
                  v-model="form.o_i_t_m_id"
                  name="o_i_t_m_id"
                  :class="{ 'is-invalid': form.errors.has('o_i_t_m_id') }"
                >
                  <option
                    v-for="val in riskevents"
                    :value="val.id"
                    :key="val.id"
                  >
                    {{ val.Name }}
                  </option>
                </select>
                <has-error
                  :form="form"
                  field="o_i_t_m_id"
                ></has-error>
              </div>
            </div> -->

            <!-- start:nav -->
            <!-- <div class="form-row">
              <nav class="nav nav-tabs">
                <a
                  href="#"
                  class="nav-item nav-link"
                  @click="showRiskCauses"
                >Risk Sources</a>
                <a
                  href="#"
                  class="nav-item nav-link"
                  @click="showRiskEffects"
                >Risk Impacts</a>
                <a
                  href="#"
                  class="nav-item nav-link"
                  @click="showRiskLevel"
                >Inherent Risk Level</a>
                <a
                  href="#"
                  class="nav-item nav-link"
                  @click="showCurrentControls"
                >Current Controls</a>
                <a
                  href="#"
                  class="nav-item nav-link"
                  @click="showResidualRiskLevel"
                >Residual Risk Level</a>
                <a
                  href="#"
                  class="nav-item nav-link"
                  @click="showTreatment"
                >Treatment</a>
              </nav>
            </div> -->
            <!-- end:nav -->

          <!-- </div> -->
<!-- 
          <div class="modal-footer">
            <button
              type="submit"
              class="btn btn-success"
            >Save</button>
          </div> -->
        <!-- </form> -->
      <!-- </div> -->
    <!-- </div> -->
  </div>
</template>
<script>
import Datepicker from 'vuejs-datepicker'
import CreateAction from './Actionindex.vue'
export default {
  data() {
    return {
      reports: {},
      editmode: true,
      ObjType: 8,
      BName: '',
      riskevents: {},
      form: new Form({
        id: '',
        o_i_t_m_id: '',
        ObjType: 11
      })
    }
  },
  components: {
    Datepicker,
    CreateAction
  },
  methods: {
    GoBack() {
      this.$router.back()
    },
    loadData() {
      axios
        .get('/api/risklibrarysetup', {
          params: {
            ObjType: this.ObjType
          }
        })
        .then((res) => {
          if (res.data.ResultCode == 1200) {
            this.riskevents = res.data.ResponseData.data
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
    showRiskCauses() {
      toast.fire({
        type: 'error',
        title: 'Select Risk Event and Click Save First'
      })
    },
    showRiskEffects() {
      toast.fire({
        type: 'error',
        title: 'Select Risk Event and Click Save First'
      })
    },
    showCurrentControls() {
      toast.fire({
        type: 'error',
        title: 'Select Risk Event and Click Save First'
      })
    },
    showRiskLevel() {
      toast.fire({
        type: 'error',
        title: 'Select Risk Event and Click Save First'
      })
    },
    showResidualRiskLevel() {
      toast.fire({
        type: 'error',
        title: 'Select Risk Event and Click Save First'
      })
    },
    showTreatment() {
      toast.fire({
        type: 'error',
        title: 'Select Risk Event and Click Save First'
      })
    },
    saveRisk() {
      this.$Progress.start()
      this.form
        .post('/api/risks')
        .then((res) => {
          if (res.data.ResultCode == 1200) {
            this.$Progress.finish()
            swal.fire('Created!', 'Saved Successfully Created.', 'success')
            localStorage.clear()
            localStorage.setItem('risk_id', res.data.ResponseData)
            this.$router.push({ name: 'AnalyseRiskProfile' })
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
    this.loadData()
  }
}
</script>
