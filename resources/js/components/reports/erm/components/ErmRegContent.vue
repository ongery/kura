<template>
    <!--begin::Report-->
    <div class="card pl-9">

   
    <!--begin::Body-->
    <div class="card-body">

        <!--begin::Layout-->
        <div class="d-flex flex-column flex-xl-row">

            <!--begin::Sidebar-->
            <div class="m-0">

              <!--begin::Invoice sidebar-->
              <div class="d-print-none border border-dashed border-gray-300 card-rounded h-lg-100 p-9 bg-lighten" style="width: 300px;">
                  
                <!--begin::Tasks-->
                <div class="mx-5">

                  <!--begin::Header-->
                  <h3 class="fw-bolder text-dark mb-10 mx-0">Main Risk</h3>
                  <!--end::Header-->

                  <!--begin::Body-->
                  <div class="mb-12">

                    <div v-for="(mode, index) in reports" :key="mode.id" >
                      
                      <!--begin::Item-->
                      <div v-if="mode.MainRiskName != ''"  @click="selectReport(reports, mode.Count, mode.MainRiskName, mode.InherentValue, mode.ResidualValue)" class="d-flex align-items-center mb-7">
                        <!-- Count -->
                        <!-- <div v-if="mode.MainRiskName"> -->

                          <!--begin::Symbol-->
                          <div class="symbol symbol-50px me-5">
                            <span class="symbol-label bg-light-success">
                              <!--begin::Svg Icon | path: icons/duotune/abstract/abs027.svg-->
                              <span class="svg-icon svg-icon-2x svg-icon-success">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                  <path opacity="0.3" d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z" fill="black" />
                                  <path d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z" fill="black" />
                                </svg>
                              </span>
                              <!--end::Svg Icon-->
                            </span>
                          </div>
                          <!--end::Symbol-->

                          <!--begin::Text-->
                          <div class="d-flex flex-column">
                            <a href="#" class="text-gray-800 text-hover-success fs-6 fw-bold">{{mode.MainRiskName}}</a>
                            <span class="text-muted fw-bold">ERM Register</span>
                          </div>
                          <!--end::Text-->

                        <!-- </div> -->

                      </div>
                      <!--end::Item-->
                    </div>

                  </div>
                  <!--end::Body-->
                      
                </div>
                <!--end::Tasks-->


                    
            </div>
            <!--end::Report sidebar-->

          </div>
          <!--end::Sidebar-->





            <!--begin::Content v-if="isOpen[index]" class="accordion-content-->
            <div class="flex-lg-row-fluid  mb-10" style="margin-left: 35px;">
               
              <ErmRegContentView 
                :allSelectedReportsData="this.allSelectedReportsData" 
                :selectedMainRiskTitle="this.selectedMainRiskTitle" 
                :selectedDataIndex="this.selectedDataCountIndex"
                :subRiskNames="this.subRiskNames"
                :subRiskNamesIndexes="this.subRiskNamesIndexes"
                :ResidualValue="this.residualValue"
                :InherentValue="this.inherentValue">
              </ErmRegContentView>

            </div>
            <!--end::Content-->


        </div>
        <!--end::Layout-->
    </div>
    <!--end::Body-->
</div>
<!--end::Invoice-->


</template>
<script>
import ErmRegContentView from './ErmRegContentView'
import { EventBus } from './EventBus';

export default {
  name:'ErmRegContent',

  data() {
    return {
      inherentValue:'',
      residualValue:'',
      preMainTitleSelected:[],
      subRiskNamesIndexes:[],
      subRiskNames:[],
      selectedMainRiskTitle:'',
      currentMainRiskCount:'0',
      mainRiskCount: '0',
      selectedDataCountIndex:'0',
      reportsData: {},
      allSelectedReportsData:[],
      // isOpen: new Array(this.reports.length).fill(false) // Track open/closed state


    }
  },
  components: {
    ErmRegContentView
  },
  props:['reports'],
  methods: {

    // toggleAccordion(index) {
    //   // Toggle the state of the accordion item at the given index
    //   this.$set(this.isOpen, index, !this.isOpen[index]);
    // },

    // closeAccordion() {
    //   // Close all accordion items
    //   this.isOpen = this.isOpen.map(() => false);
    // },

    // closeAccordion() {
    //   EventBus.$emit('closeAccordion');
    //   console.log("closeAccordion() >>>  CALL >>")
    // },
    
    // closeAccordionOnMainRiskChange(mainRiskTitle){
    


    //   if(this.preMainTitleSelected[0] === []){

    //     this.preMainTitleSelected.push(mainRiskTitle);
    //     console.log("closeOnMainRiskChange ->> IF  1: (selectedHeaderData) >> : "+mainRiskTitle+"");

    //   }

    //   if(this.preMainTitleSelected[0] == mainRiskTitle ){

    //     console.log("closeOnMainRiskChange ->> IF 2: (selectedHeaderData) >> : "+mainRiskTitle+"");

    //   }else{

    //     //close Last 
    //     this.closeAccordion();

    //     this.preMainTitleSelected.push(mainRiskTitle);

    //     console.log("closeOnMainRiskChange ->> else 2: (selectedHeaderData) >> : "+mainRiskTitle+"");

    //     // console.log("closeOnMainRiskChange ->> ELSE: (selectedHeaderData) >> : "+mainRiskTitle+"");

    //     // if(!this.selectedMainRiskTitle == this.preMainTitleSelected[0]){

    //     //   // close accordion
    //     //   this.$set(this.isOpen, index, false);

    //     //   // clear Last Val And Save
    //     //   this.preMainTitleSelected[0] = mainRiskTitle;
    //     //   console.log("closeAllOnMainRiskChange ->> ELSE:--> IF (selectedHeaderData) >> : "+mainRiskTitle+"");

    //     // }
    //   }
    // },

    getSelectedSubRiskNames(reports, selectedIndex, title){

      // Rest per Selection
      this.subRiskNames = [];
      this.subRiskNamesIndexes = [];
      this.allSelectedReportsData = [];

      let getCurrentCalcIndexCount = 0;
      let getCurrentMainRisk = '';
      let isCountSame = false;
      let isCountSameIndex = '0';

      for(var i = 0; i < reports.length ; i++){

        // Only check Non Empty MainRiskName val
        // Changes when Other val is available
        if(reports[i].MainRiskName){// Get All;
          getCurrentMainRisk = reports[i].MainRiskName;
        
        }
  
        // Only check Non Empty Count val
        // Changes when Other val is available
        if(reports[i].Count){
          getCurrentCalcIndexCount = reports[i].Count;
        }

        // check If same selectedIndex === loop Count with val
        // Get All Items, within one Count
        if(getCurrentCalcIndexCount === selectedIndex){
          isCountSame = true;
          isCountSameIndex = getCurrentCalcIndexCount;

          // check within All Count Items if == (selectedIndex)
          //  with RiskName Val
          if(reports[i].Count === selectedIndex ){
            if(reports[i].RiskName != ''){
              this.subRiskNames.push(reports[i].RiskName);
              this.subRiskNamesIndexes.push(i);
            }
          }

        }else{
          isCountSame = false;
        }

        // Get All Selected Data
        if(isCountSame){
          // Get all Items within selectedIndex
          this.allSelectedReportsData.push(reports[i]);
        }

      }



      // console.log("All Selected RiskNames ==>> "+this.subRiskNames);
      // console.log("All Selected REPORTS ==>> --> : (Data) ==> "+ JSON.stringify(this.allSelectedReportsData))

    },

    getCurrentMainRiskCount(getCountMainRisk){
      if(this.currentMainRiskCount != getCountMainRisk){
        this.currentMainRiskCount = getCountMainRisk;
        // this.residualValue = residualValue;
        // this.inherentValue = inherentValue;

      }
    },

    getMainRiskCount(setMainRiskCount){
      this.mainRiskCount = setMainRiskCount
      this.getCurrentMainRiskCount(this.mainRiskCount)
    },

    selectReport(reports, selectedCountIndex, title, inherentValue, residualValue, ) {

      // Emit an event when a new report is selected
      EventBus.$emit('mainRiskTitleChange', title);
      
      // check if same Title
      // this.closeAccordionOnMainRiskChange(title);

    

      // Set the selected task to be displayed in the body
      this.selectedMainRiskTitle = title;
      this.residualValue = residualValue;
      this.inherentValue = inherentValue;
      this.reportsData = reports;
      this.selectedDataCountIndex = selectedCountIndex;

      // Has Loop
      this.getSelectedSubRiskNames(reports, selectedCountIndex, title);

      // this.getMainRiskCount(count)
    },

    mounted() {
      // selectReport(reports, reports[0].Count, reports[0].MainRiskName, reports[0].InherentValue, reports[0].ResidualValue);
    
      // console.log("ERM REG CONTENT--> : (mounted) == "+ JSON.stringify(this.reports))
    },

    created() {
      // Listen to the event to close all accordion items
      EventBus.$on('mainRiskTitleChange', this.closeAccordion);
    },

    // beforeDestroy() {
    //   // Clean up event listener
    //   EventBus.$off('mainRiskTitleChange', this.closeAccordion);
    // }
  }

}
</script>
