<template>
  <div>
    
    <!--begin::Toolbar-->
    <div class="app-toolbar py-3">
  
      <!--begin::Toolbar container-->
      <div id="kt_app_toolbar_container" class="app-container  container-xxl d-flex flex-stack ">
                  
          <!--begin::Page title-->
          <div class="mb-2 mt-4 page-title d-flex flex-column justify-content-start flex-wrap">       
            
              <!--begin::Title-->
              <h1 class="page-heading d-flex text-dark text-white-400 fw-bold fs-3 flex-column">
                {{ this.showTitle}} 
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
                    
                      <a  class="text-gray-500 mt-1 fw-semibold fs-6 text-muted ">
                        Key Risk Indicators
                      </a>

                    </div>

                  </li>


                  
                <!-- begin::Item -->
                <li class="breadcrumb-item text-muted">

                  <div class="flex items-center">
                    -
                      <a  class="text-gray-500 mt-1 fw-semibold fs-6 text-muted ml-4 text-hover-success">
                        Key Risk Item 
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
           
             <!--begin::Primary button-->
              <a href="#" @click.prevent="showDetailsPage"
              class="btn btn-sm fw-bold bg-body btn-color-gray-700 btn-active-color-success" >
              Details        
            </a>
            <!--end::Secondary button-->

            <!--begin::Primary button-->
            <a href="#" @click.prevent="showActionsItems"
              class="btn btn-sm fw-bold bg-body btn-color-gray-700 btn-active-color-success" >
              <!-- "btn btn-sm fw-bold btn-primary btn-active-color-dark" -->
              Action Items        
            </a>
            <!--end::Secondary button-->


             <!--begin::Primary button-->
             <!-- <a @click="addNew" v-if="showmode === 'actionitems'"
             class="btn btn-sm fw-bold bg-success btn-color-white btn-active-color-dark" >
             New Action        
           </a> -->
           <!--end::Secondary button-->


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
  





    <div class="row mt-2">
      <div class="col-md-12">
        <!-- <ul class="nav">
          <li class="nav-item">
            <button
              class="btn btn-primary btn-sm"
              @click="showDetailsPage"
            >
              <i class="fa fa-calendar"></i>
              Details
            </button>
          </li>
          <li class="nav-item ml-1">
            <button
              class="btn btn-primary btn-sm"
              @click="showActionsItems"
            >
              <i class="fa fa-users"></i>
              Action Items
            </button>
          </li>
        </ul> -->
        <Details v-if="showmode === 'details'"></Details>
        <ActionIndex v-if="showmode === 'actionitems'"></ActionIndex>
      </div>
    </div>
  </div>
</template>

<script>
import Details from './Details.vue'
import ActionIndex from './Actionindex'
// import Pledges from './profile/Pledges.vue'
// import Children from './profile/Children.vue'
// import Departments from './profile/Departments.vue'
export default {
  name:'ItemProfile',
  data() {
    return {
      showTitle: 'KRI Details',
      id: null,
      showincome: false,
      editmode: false,
      showmode: '',
      members: {
        details: {}
      },
      form: new Form({
        Name: '',
        description: '',
        Weight: '',
        Frequency: '',
        StartDate: '',
        ExpiredDate: '',
        DataType: '',
        LowerLimit: '',
        GreenAmber: '',
        AmberRed: '',
        UpperLimit: ''
      })
    }
  },
  components: {
    Details,
    ActionIndex
  },
  methods: { 
    GoBack() {
      this.$router.back()
    },
    addNew() {
      this.$router.push({ name: 'KRITreatment' })
    },
    showDetailsPage() {
      this.showmode = 'details'
      this.showTitle= 'KRI Details'
    },

    showAttachments() {
      this.showmode = 'attachments'
    },

    showActionsItems() {
      this.showmode = 'actionitems'
      this.showTitle= 'Improvement Action'
    }

  },

  created() {
    this.showDetailsPage()
    // this.loadMemberDetails()
    // Fire.$on('AfterCreate', () => {
    //   this.loadMemberDetails()
    // })
  }
}
</script>
