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
              {{ this.title }} 
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
                        CRM Setup Data
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
              <a href="#" @click.prevent="showEvents"
              class="btn btn-sm fw-bold bg-body btn-color-gray-700 btn-active-color-success" >
              Functional Areas        
            </a>
            <!--end::Secondary button-->


             <!--begin::Primary button-->
              <a href="#" @click.prevent="showRiskCasues"
              class="btn btn-sm fw-bold bg-body btn-color-gray-700 btn-active-color-success" >
              Fraud Risk Areas        
            </a>
            <!--end::Secondary button-->
          
             <!--begin::Primary button-->
             <a href="#" @click.prevent="showImpacts"
             class="btn btn-sm fw-bold bg-body btn-color-gray-700 btn-active-color-success" >
             Assets        
           </a>
           <!--end::Secondary button-->

             <!--begin::Primary button-->
             <a href="#" @click.prevent="showScaleGroup"
             class="btn btn-sm fw-bold bg-body btn-color-gray-700 btn-active-color-success" >
             Risk Events        
           </a>
           <!--end::Secondary button-->


             <!--begin::Primary button-->
             <a href="#" @click.prevent="showRiskMethods"
             class="btn btn-sm fw-bold bg-body btn-color-gray-700 btn-active-color-success" >
             Risk Methods        
           </a>
           <!--end::Secondary button-->

          
            
          
          </div>
          <!--end::Actions-->
  
      </div>
      <!--end::Toolbar container-->
  
    </div>
    <!--end::Toolbar-->                     
  

<!-- 
    <nav class="nav nav-tabs row mt-2 navbar-dark bg-dark">
      <a
        href="#"
        class="nav-item nav-link"
        @click="showEvents"
      ><b>Functional Areas</b></a>
      <a
        href="#"
        class="nav-item nav-link"
        @click="showRiskCasues"
      ><b>Fraud Risk Areas</b></a>

      <a
        href="#"
        class="nav-item nav-link"
        @click="showImpacts"
      ><b>Assets</b></a>
      <a
        href="#"
        class="nav-item nav-link"
        @click="showScaleGroup"
      ><b>Risk Events</b></a>
      <a
        href="#"
        class="nav-item nav-link"
        @click="showRiskMethods"
      ><b>Risk Methods</b></a>
    </nav> -->

    <RiskCauses v-if="showmode === 'causes'"></RiskCauses>
    <FunctionalArea v-else-if="showmode === 'events'"></FunctionalArea>
    <RiskImpacts v-else-if="showmode === 'impacts'"></RiskImpacts>
    <ScaleGroup v-else-if="showmode === 'scalegroup'"></ScaleGroup>
    <RiskMethods v-else-if="showmode === 'riskmethod'"></RiskMethods>
  </div>
</template>
<script>
import RiskCauses from './_componets/RiskCauses'
import FunctionalArea from './_componets/FunctionalArea'
import RiskImpacts from './_componets/RiskImpacts'
import ScaleGroup from './_componets/RiskEvents.vue'
import RiskMethods from './_componets/RiskMethods.vue'
export default {
  data() {
    return {
      title:'',
      showmode: '',
      reports: {}
    }
  },
  components: {
    RiskCauses,
    FunctionalArea,
    ScaleGroup,
    RiskImpacts,
    RiskMethods
  },
  methods: {
    getAuthToken() { return localStorage.getItem('authToken'); },

    showRiskCasues() {
      this.showmode = 'causes'
      this.title = 'Fraud Risk Areas'
    },
    showEvents() {
      this.showmode = 'events'
      this.title = 'Functional Areas'

    },
    showImpacts() {
      this.showmode = 'impacts'
      this.title = 'Assets'

    },
    showScaleGroup() {
      this.showmode = 'scalegroup'
      this.title = 'Risk Events '

    },
    showRiskMethods() {
      this.showmode = 'riskmethod'
      this.title = 'Risk Methods'

    }
  },
  manageHistory() {
        const token = this.getAuthToken();
        axios.post('/api/manage-logs', {
            'page_name': 'Functional Areas',
            'log': 'User visited to the Functional Areas'
        }, {
            withCredentials: true,
            headers: {
                'Authorization': `Bearer ${token}`
            }
        })
    },
  created() {
    this.showEvents()
    this.manageHistory();

  }
}
</script>
