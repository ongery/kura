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
                  Edit {{this.objectName}} 
                </h1>
                <!--end::Title-->

                <!--begin::Breadcrumb-->
                <ol style="margin-left: -6px;" role="list" class="flex items-center space-x-4 breadcrumb  breadcrumb-separatorless text-gray-400 fw-semibold pt-1">
                    <li>
                    <div>
                        <a href="#" class="text-gray-400 hover:text-gray-500">
                        <!-- Heroicon name: solid/home -->
                        <svg class="flex-shrink-0 h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                        </svg>
                        <span class="sr-only">Dashboard</span>
                        </a>
                    </div>
                    </li>
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">

                          <div class="flex items-center">
                          
                            <a href="#" class="text-gray-500 mt-1 fw-semibold fs-6 text-muted ">
                              Risk Criteria
                            </a>

                          </div>

                          </li>
                          <!--end::Item-->

                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">

                                <div class="flex items-center">
                                  -
                                    <a href="#" class="text-gray-500 mt-1 fw-semibold fs-6 text-muted ml-4 text-hover-success">
                                      Edit {{this.objectName}}
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
        
              <BackButton></BackButton>
            
            </div>
            <!--end::Actions-->

        </div>
        <!--end::Toolbar container-->

      </div>
    <!--end::Toolbar-->                     


    <EditRCIContent></EditRCIContent>
  </div>
</template>
<script>
import Datepicker from 'vuejs-datepicker'
import moment from 'moment'
import BackButton from './components/BackButton'
import EditRCIContent from './components/EditRCIContent.vue'

export default {
  data() {
    return {
      categories: {},
      riskevents: {},
      users: {},
      ObjType: '',
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
        ObjType: '',
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
    Datepicker, BackButton, EditRCIContent
  },
  computed: {
    objectName() {
      let data = 'RCI'

      return data
    }
  },
  watch: {
    '$route.params.id': {
      handler: 'loadData',
      immediate: true
    },
    '$route.params.ObjType': {
      handler: 'setObjectType',
      immediate: true
    }
  },
  methods: {
    setObjectType(ObjType) {
      this.ObjType = ObjType
    },
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
    updateData() {
      this.form.StartDate = moment(this.form.StartDate).format('YYYY-MM-DD')
      this.form.ExpiredDate = moment(this.form.ExpiredDate).format('YYYY-MM-DD')
      this.$Progress.start()
      this.form
        .put('/api/kris-compliance/' + this.form.id)
        .then((res) => {
          if (res.data.ResultCode == 1200) {
            toast.fire({
              type: 'success',
              title: 'Updated Successfully'
            })

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
    },
    loadData(val) {
      console.log(val, 'sadfasd')
      if (val) {
        axios
          .get('/api/kris-compliance/' + val, {
            params: {
              forEdit: true
            }
          })
          .then((res) => {
            this.form.fill(res.data.ResponseData)
          })
      }
    }
  },
  created() {
    this.loadUsers()
    this.loadRiskEvents()
    this.loadCategory()
  }
}
</script>
