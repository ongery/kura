<template>

 <!-- Total risk -->
 <div class="col-sm-3 col-xl-3">

<!--begin::Card widget 4-->
<!-- <div class="card card-flush h-md-50 mb-4"> -->
    <!--begin::Header-->
    <!-- <div class="card-header pt-5"> -->
        
    <!-- </div> -->
    <!--end::Header-->

    <div class="card ml-1">


    
    <!--begin::Title-->
    <div class="card-title d-flex flex-column">   
        <!--begin::Info--> 
        <div class="d-flex align-items-center">
            <!--begin::Title-->
            <!-- <span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">High Risk</span>  -->
            
            <h1  class="text-gray-800 text-hover-success fw-bold"  style="font-size: 16px;">Total Risk</h1>

            <!-- <span class="fw-bold text-gray-700" style="font-size: 16px;">Total Risk</span> -->
            <!--end::Title-->
        </div>
        <!--end::Info--> 

        <!--begin::Subtitle-->
        <!-- <span class="text-gray-400 pt-1 fw-semibold fs-6">Risk Report</span> -->
        <!--end::Subtitle--> 
    </div>
    <!--end::Title-->      


    <!--begin::Card body-->
    <div class="card-body pt-2 pb-4 d-flex align-items-center">

        <!-- <OctagonHighRisk :risk="summaryReports"></OctagonHighRisk> -->

            <!--begin::Chart-->
            <div class="d-flex flex-center me-5 pt-2" style="margin-left: -10px;">

                <div 
                    id="kt_card_widget_4_chart" 
                    style="min-width: 105px; min-height: 105px" 
                    data-kt-size="105" 
                    data-kt-line="15">
                    <!-- data-kt-percent="100"> -->
                </div>
                    
                <div v-if="this.totalCalculated >= 10" class="fw-bolder text-gray-800 text-white-500" style="margin-left: -78px; font-size: 40px;" data-kt-countup="true" :data-kt-countup-value="this.totalCalculated">{{             
                    this.totalCalculated
                }}</div>

                <div v-else class="fw-bolder text-gray-800 text-white-500" style="margin-left: -66px; font-size: 40px;" data-kt-countup="true" :data-kt-countup-value="this.totalCalculated">{{             
                    this.totalCalculated 
                }}</div>

            </div>
            <!--end::Chart-->
            
    
        <!-- flex  -->
        <!-- <div class="d-flex flex-column flex-center align-items-center"> -->
            
            <!--begin::Stats-->
            <!-- <div class="fw-bolder text-gray-700 pr-1 pb-3 fs-2hx ">{{ summaryReports.totalRedRisks}}</div> -->
            <!--end::Stats-->


            <!--begin::Label-->
            <!-- <div class="text-gray-500 flex-grow-1">Total Risk</div> -->
            <!--end::Label-->

        <!-- </div> -->

    </div>
    <!--end::Card body-->
    
</div>
<!--end::Card widget 4--> 

</div>

</template>


<script>

import { Doughnut } from 'vue-chartjs'
import {RiskVueEventBus} from '../service/RiskVueEventBus'

export default {
    name:'TotalRisk',
    data() {
        return {
            totalCalculated:'',
        }

    },

    props:['summaryReports', 'totalRiskCal'],
    components:{Doughnut},
    
    watch: {
        totalCalculated(newVal) {
            console.log("watch >> TotalRisk >> (totalCalculated@TotalRisk): "+ newVal);
        }
    },

    methods:{

        // setTotalRiskValFromProp(){

        //     // this.totalCalculated = this.totalRiskCal;
        //     this.totalCalculated =  localStorage.getItem('totalRiskCalculated')
        //     console.log("TOTAL RISK >>> (setTotalRiskValFromProp) localStorage.getItem('totalRiskCalculated') : "+localStorage.getItem('totalRiskCalculated')); 

        //     console.log("TOTAL RISK >>> (setTotalRiskValFromProp) val : "+this.totalCalculated); 

        // },

        setTotalRiskValFromEmit(data){

            if(data){
                this.totalCalculated = data;
                console.log("TOTAL RISK >>> (setTotalRiskValFromEMIT) EMIT-PROP : "+this.totalCalculated); 
            }
            // else{
            //    this.setTotalRiskValFromProp();
            // }

        },

    },
    mounted(){

        // Init val from Prop
        // this.setTotalRiskValFromProp();

        // Listen to Emit event
        // this.setTotalRiskValFromEmit();

        // console.log(" TOTAL RISK >>> (mounted)"); 

        // console.log("mounted : (totalRisk ==> summaryReports) === "+  JSON.stringify(this.summaryReports)); 
        // console.log("mounted :(totalRisk ==> PROP >> totalRiskCal) === "+ this.totalRiskCal ); 
        // console.log("mounted : (totalRisk ==> BY PROP >> totalCalculated) === "+ this.totalCalculated ); 


        // console.log("mounted : (totalRisk ==> totalRedRisks) === "+  this.summaryReports.totalRedRisks); 
        // console.log("mounted : (totalRisk ==> totalMediumRisks) === "+  this.summaryReports.totalMediumRisks);
        // console.log("mounted : (totalRisk ==> totalGreenRisks) === "+  this.summaryReports.totalGreenRisks); 

        // console.log("mounted : (totalRisk ==> By adding) === "+  parseInt(this.summaryReports.totalRedRisks) + parseInt(this.summaryReports.totalMediumRisks) + parseInt(this.summaryReports.totalGreenRisks)); 

    },

    created(){

        Fire.$on('totalRiskCalculated', this.setTotalRiskValFromEmit);

        // Init val from Prop
        // this.setTotalRiskValFromProp();

        // Listen to Emit event
        // this.setTotalRiskValFromEmit();

        // RiskVueEventBus.$on('totalRiskCalculated', newTotalRiskVal =>{
        //     this.totalCalculated = newTotalRiskVal;
        //     console.log("ON-EVENT >>> (totalRiskCalculated) NEW-VALUE === newTotalRiskVal : "+ newTotalRiskVal); 
        //     console.log("ON-EVENT >>> (totalRiskCalculated) NEW-VALUE === "+this.totalCalculated); 
        // })

        // console.log("TOTAL RISK >>> (created)"); 

        // console.log("created : (totalRisk ==> summaryReports) === "+  JSON.stringify(this.summaryReports)); 
        // console.log("created : (totalRisk ==> PROP >> totalRiskCal) === "+ this.totalRiskCal ); 
        // console.log("created : (totalRisk ==> BY PROP >> totalCalculated) === "+ this.totalCalculated ); 


        // console.log("created : (totalRisk ==> totalRedRisks) === "+  this.summaryReports.totalRedRisks); 
        // console.log("created : (totalRisk ==> totalMediumRisks) === "+  this.summaryReports.totalMediumRisks);
        // console.log("created : (totalRisk ==> totalGreenRisks) === "+  this.summaryReports.totalGreenRisks); 

        // console.log("created : (totalRisk ==> By adding) === "+  parseInt(this.summaryReports.totalRedRisks) + parseInt(this.summaryReports.totalMediumRisks) + parseInt(this.summaryReports.totalGreenRisks)); 

    },
    
    beforeDestroy() {
        // Clean up event listener
        Fire.$off('totalRiskCalculated',this.setTotalRiskValFromEmit);
    },

}

</script>