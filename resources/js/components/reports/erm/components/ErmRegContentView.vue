<template>
    <div>
        <!-- No Data Placeholder -->
        <div v-if="!this.selectedMainRiskTitle">
            <!--begin::Actions-->
            <div class="d-flex align-items-center gap-2 gap-lg-3">
                <div class="col col-12" style="height:100%; width:100%; margin-right:auto; ">
                    <img src="/img/4.png" alt="Select Main Risk" class="" style="height:70%; width:50%; margin-left:120px; margin-right:auto" />

                    <!--begin::Header-->
                    <div class="card-header border-0 pt-5">
                        <!--begin::Col-->
                        <div class="col-md-8 fv-row" style="margin:auto">
                            <h3 class="text-gray-400 text-muted text-hover-success fw-bold" style="font-size: 20px; margin-top: 21px;  margin-left: 65px;">Select Main Risk</h3>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!-- end:Header -->
                </div>
            </div>
        </div>

        <!--begin::Wrapper-->
        <div v-else>
            <!--begin::Header-->
            <div class="card-header border-0 pt-5">
                <!--begin::Col-->
                <div class="col-md-8 fv-row">
                    <h3 class="text-gray-800 text-hover-success fw-bold" style="font-size: 20px; margin-top: 21px;">{{ this.selectedMainRiskTitle }}</h3>
                </div>
                <!--end::Col-->

                <!--begin::Actions-->
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <div v-if="InherentValue != ''" class="col fw-bold text-center">
                        <OctagonInherentValue2 v-if="InherentValue != ''" :InherentValue="this.InherentValue"></OctagonInherentValue2>
                        I.R
                    </div>

                    <div v-if="ResidualValue != ''" class="col fw-bold text-center">
                        <OctagonResidualValue2 v-if="ResidualValue != ''" :ResidualValue="this.ResidualValue"></OctagonResidualValue2>
                        R.R
                    </div>
                </div>
                <!--end::Actions-->
            </div>
            <!--end::Header-->

            <!--begin::Accordion-->
            <!--start::Section-->
            <div v-for="(selectedItem_, index) in this.allSelectedReportsData" class="m-0 pl-5 pt-2">
                <div v-if="selectedItem_.RiskName != ''" class="m-0 pl-5 pt-2">
                    <!-- begin::Heading -->
                    <div v-if="selectedItem_.RiskName != ''" @click="toggleAccordion(index, allSelectedReportsData, selectedItem_.RiskName)" class="d-flex align-items-center collapsible py-3 toggle collapsed mb-0" data-bs-toggle="collapse" :data-bs-target="'#accordion_' + '_' + index">
                        <!--begin::Icon-->
                        <div id="accordionIcons" class="btn btn-sm btn-icon mw-20px btn-active-color-primary me-5">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen036.svgv"-->
                            <span class="svg-icon svg-icon-primary svg-icon-1 toggle-on">
                                <svg id="plusIcon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="black" />
                                    <rect x="6.0104" y="10.9247" width="12" height="2" rx="1" fill="black" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->

                            <!--begin::Svg Icon | path: icons/duotune/general/gen035.svg  -->
                            <span class="svg-icon svg-icon-1 toggle-off">
                                <svg id="plusIcon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="black" />
                                    <rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="black" />
                                    <rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="black" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </div>
                        <!--end::Icon-->

                        <!-- <h3 style="margin-left: 8px;"  class="custom-list-title  text-gray-800 text-hover-success">{{mode1.RiskName}}</h3> -->
                        <h5 class="custom-list-title fw-bold text-gray-700 mb-1">{{ selectedItem_.RiskName }}</h5>
                    </div>
                    <!-- end::Heading -->
                </div>

                <!--begin::Body-->
                <div v-if="selectedItem_.RiskName != ''" :id="'accordion_' + '_' + index" class="collapse fs-6 ms-1" :class="{ show: isOpen[index] }">
                    <!-- fafafa f7f7ff-->

                    <div v-if="selectedItem_.RiskName != ''" class="card-body table-responsive p-0">
                        <!-- <div v-for="(selectedItem, index_) in selectedItem_" > -->

                        <table v-if="selectedItem_.RiskName != ''" class="table table-hover  table-sm">
                            <thead v-if="selectedItem_.RiskName != ''" class="fw-bold text-muted">
                                <tr>
                                    <!-- To DO!!! -->
                                    <!-- <th>Main Risk</th>  MainRiskName-->
                                    <!-- <th>I.R</th>  InherentValue  -->
                                    <!-- <th>R.R</th> ResidualValue -->

                                    <th>Risk Event</th>
                                    <!-- RiskName -->

                                    <th>Risk Source</th>
                                    <!--  RiskSource -->
                                    <th>Risk Impacts</th>
                                    <!-- RiskImpact -->
                                    <th style="text-align:center">I.R</th>
                                    <!-- InherentValue1  -->
                                    <th>Current Controls</th>
                                    <!-- ControlItems  -->
                                    <th style="text-align:center">R.R</th>
                                    <!-- ResidualValue1 -->
                                    <th>K.C.I</th>
                                    <!-- KCIitems  -->
                                    <th>K.R.I</th>
                                    <!-- KRIitems -->
                                    <th>Treatment Plans</th>
                                    <!-- TreatmentsPlans  -->
                                </tr>
                            </thead>
                            <tbody v-if="selectedItem_.RiskName != ''">
                                <tr v-for="(selectedItem, index_) in selectedTableData">
                                    <!-- <tr v-for="mode in allSelectedReportsData":key="mode.id"> -->

                                    <!-- <td>
                              {{ mode.MainRiskName }}
          
                            </td>
          
                            <td>
                              {{ mode.InherentValue }}
          
                            </td>
          
                            <td>
                              {{ mode.ResidualValue }}
          
                            </td> -->

                                    <td>
                                        {{ selectedItem.RiskName }}
                                    </td>

                                    <td>
                                        {{ selectedItem.RiskSource }}
                                    </td>

                                    <td>
                                        {{ selectedItem.RiskImpact }}
                                    </td>

                                    <td>
                                        {{ selectedItem.InherentValue1 }}
                                    </td>

                                    <td>
                                        {{ selectedItem.ControlItems }}
                                    </td>

                                    <td>
                                        {{ selectedItem.ResidualValue1 }}
                                    </td>

                                    <td>
                                        {{ selectedItem.KCIitems }}
                                    </td>

                                    <td>
                                        {{ selectedItem.KRIitems }}
                                    </td>

                                    <td>
                                        {{ selectedItem.TreatmentsPlans }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <!-- </div> -->
                    </div>

                    <!--begin::Separator-->
                    <div class="separator separator-dashed"></div>
                    <!--end::Separator-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Section-->
            <!--end::Accordion-->
        </div>
        <!--end::Wrapper-->
    </div>
</template>

<script>
import OctagonInherentValue from '../items/OctagonInherentValue.vue'
import OctagonResidualValue from '../items/OctagonResidualValue.vue'

import OctagonInherentValue2 from '../items/OctagonInherentValue2.vue'
import OctagonResidualValue2 from '../items/OctagonResidualValue2.vue'

export default {
    name: 'ErmRegContentView',
    props: ['selectedMainRiskTitle', 'allSelectedReportsData', 'selectedDataIndex', 'subRiskNames', 'subRiskNamesIndexes', 'InherentValue', 'ResidualValue'],
    data() {
        return {
            isOpen: [],
            // isOpen: new Array(this.subRiskNames.length).fill(false), // Track open/closed state
            // _allSelectedReportsData:[],
            // MainRiskTitleCurrent: '',
            // mainRiskName:'',
            // selectedDataCountNo: '0',

            // selectMainRiskTitle:'',
            // selectSubRiskTitle:'',
            // reports:[],

            selectedMainRiskTitle: '',
            // closeIcon:false,

            selectedTableData: [],
            selectedSubRiskNames: [],
            selectedSubRiskNamesIndexes: []
        }
    },

    components: {
        OctagonInherentValue,
        OctagonResidualValue,

        OctagonInherentValue2,
        OctagonResidualValue2
    },
    watch: {
        selectedMainRiskTitle(newVal) {
            // Emit an event when the MainRiskTitle changes
            this.$emit('mainRiskTitleChange', newVal)
            console.log('watch >> (selectedMainRiskTitle): ' + newVal)

            this.closeAccordion()
        }
    },
    // watch: {
    //     selectMainRiskTitle(newTitle, oldTitle) {
    //       // This function will be called whenever selectedMainRiskTitle changes
    //       // You can perform any necessary actions here, such as updating other data properties
    //       // or triggering methods
    //       // this.recomputeData(newTitle, oldTitle);

    //       console.log("watch ->> : (selectedHeaderData) >> : "+"" +" : TITLE >> ");

    //       this.selectedHeader(reports, newTitle)
    //     },
    //   },
    methods: {
        closeAccordion() {
            // Close all accordion items
            this.isOpen = this.isOpen.map(() => false)

            // Update SVG icons programmatically
            const svgIcons = document.querySelectorAll('.btn-icon')
            svgIcons.forEach((svgIcon, index) => {
                const isOpen = this.isOpen[index]
                const toggleOnIcon = svgIcon.querySelector('.toggle-on')
                const toggleOffIcon = svgIcon.querySelector('.toggle-off')
                if (isOpen) {
                    toggleOnIcon.style.display = 'none'
                    toggleOffIcon.style.display = 'inline-block'
                } else {
                    toggleOnIcon.style.display = 'inline-block'
                    toggleOffIcon.style.display = 'none'
                }
            })
        },

        toggleAccordion(index, allData, title) {
            // Close all other accordion items
            // this.isOpen = this.isOpen.map((_, i) => (i === index ? !this.isOpen[i] : false));
            // Open/close the clicked accordion item
            // this.$set(this.isOpen, index, !this.isOpen[index]);
            // Load data specific to the clicked accordion here
            // this.selectedHeader(index, allData, title);

            // Toggle the state of the clicked accordion item
            this.$set(this.isOpen, index, !this.isOpen[index])
            // closeIcon = true;

            // Close all other accordion items
            for (let i = 0; i < this.isOpen.length; i++) {
                if (i !== index && this.isOpen[i]) {
                    this.$set(this.isOpen, i, false)
                    // closeIcon = false;
                }
            }

            // Close (Last Open) On Main Risk Change
            // this.closeAllOnMainRiskChange(title, index)

            // Load data specific to the clicked accordion here
            this.selectedHeader(allData, title)
        },
        // toggleAccordion(index) {
        //   // Toggle the state of the accordion item at the given index
        //   this.$set(this.isOpen, index, !this.isOpen[index]);
        // },
        // closeAllAccordionBodies() {
        //   // Loop through all accordion bodies and close them
        //   const accordions = document.querySelectorAll('.collapse');
        //   accordions.forEach(accordion => {
        //     if (!accordion.classList.contains('show')) {
        //       // Only close if it's open
        //       accordion.classList.remove('show');
        //     }
        //   });
        // },

        // closeAccordion(index){
        //    // Close all open accordion bodies
        //     const accordions = document.querySelectorAll('.accordion-item');
        //     accordions.forEach(accordion => {
        //       const body = accordion.querySelector('.accordion-collapse');
        //       if (body.classList.contains('show')) {
        //         body.classList.remove('show');
        //       }
        //     });

        //     // Find the selected accordion header
        //     const selectedHeader = document.querySelector(`[data-kt-element="panel"] [data-kt-element="body"][data-kt-panel="show"]`);

        //     // If the selected header is valid and matches the clicked header, close its corresponding body
        //     if (selectedHeader && selectedHeader.innerText.trim() === title) {
        //       selectedHeader.closest('.accordion-item').querySelector('.accordion-collapse').classList.remove('show');
        //     }

        // },

        // openAccorion(){

        //   const selectedIndex = allData.findIndex(item => item.RiskName === title);

        //   // If the selected header index is valid, open its corresponding accordion body
        //   if (selectedIndex !== -1) {
        //     const accordionId = `#accordion_${selectedIndex}`;
        //     const accordionBody = document.querySelector(accordionId);
        //     if (accordionBody) {
        //       accordionBody.classList.add('show');
        //     }
        //   }

        // },

        selectedHeader(allData, title) {
            // this.toggleAccordion(index);
            // this.closeAccordion(index);
            // this.closeAllAccordionBodies();

            let data = allData
            // console.log("current >> (allData): "+ JSON.stringify(data));
            console.log('current >> (TITLE): ' + title)

            //Get parsed Titles
            let titles = this.subRiskNames

            //Get selected TitleIndex
            let titlesIndex = this.subRiskNamesIndexes

            //countDataIndex
            let actualIndex = 0
            let nextActualIndex = 0
            let currentTitle = ''
            let isCurrentTitle = false
            let currentTitleIndex = 0
            let nextTitle = ''
            let nextTitleIndex = 0
            let isNextTitle = false
            this.selectedTableData = []

            //  else{
            // cant Cal Zero. or first Item
            // Get Actual Indexes in Data if multi
            for (let x = 0; x < data.length; x++) {
                // Skips Empty RiskNames
                if (data[x].RiskName != '') {
                    // dynamic..
                    currentTitle = data[x].RiskName

                    if (currentTitle == title) {
                        //will always be 0 Index

                        actualIndex = x
                        isCurrentTitle = true
                        console.log('Get Actual Title >> Dynamic...  (currentTitle) == >> ' + currentTitle + ' (ActualIndex) >> : ' + actualIndex)
                    } else {
                        // nextActualIndex = x ;
                        isCurrentTitle = false
                        // console.log("Get (Next) Actual Title >> (NEXT - TITLE) == (data[nextActualIndex].RiskName) >> "+data[nextActualIndex].RiskName+" (nextActualIndex) >> : "+ nextActualIndex );
                    }

                    if (currentTitle == title) {
                        let countFirstRound = 0
                        let realCurrentTitle_ = ''

                        // Get selectedTableData
                        for (let x = actualIndex; x < data.length; x++) {
                            if (data[x].RiskName != '') {
                                realCurrentTitle_ = data[x].RiskName
                            }

                            if (title == data[x].RiskName) {
                                this.selectedTableData.push(data[x])
                            }

                            if (data[x].RiskName == '' && countFirstRound != 0 && realCurrentTitle_ == title) {
                                this.selectedTableData.push(data[x])
                            }

                            countFirstRound++
                        }
                        // console.log("isCurrentTitle (TRUE) >>  (ACTUAL INDEX) >> : "+actualIndex+ " (NEXT ACTUAL INDEX) >> : "+ nextActualIndex+ " Current Title >> : ");
                        console.log('selectedTableData >> (selectedTableData): ' + JSON.stringify(this.selectedTableData))
                    }
                }
            }

            // }

            // // use index for saved Titles
            // let i=0;
            // for(; i < titles.length; i++){
            //   if(title == titles[i]){//selected title

            //     currentTitleIndex = titlesIndex[i];
            //     nextTitleIndex = currentTitleIndex + 1;//Next title index
            //     console.log("currentTitleIndex >> : "+ currentTitleIndex );
            //     console.log("nextTitleIndex >> : "+ nextTitleIndex );
            //     console.log("Current Title >> : "+ title +" == "+ titles[i] + " Current TitleIndex >> : "+ actualIndex +" == "+titlesIndex[i]);

            //     if(titles[nextTitleIndex]){
            //       isNextTitle = true;
            //       nextTitle = titles[nextTitleIndex];
            //       console.log("Next Title >> : "+ nextTitle + "Next TitleIndex >> : "+ nextTitleIndex);
            //     }else{
            //       isNextTitle = false;
            //       console.log("else NO NEXT TITLE >> : "+ "Current Title >> : "+ title + "Next TitleIndex >> : "+ currentTitleIndex);
            //     }

            //   }
            // }

            // if(currentTitle == title){
            //   // Get selectedTableData
            //   for(let x=actualIndex; x < data.length; x++){
            //     this.selectedTableData.push(data[x]);
            //   }
            //   // console.log("isCurrentTitle (TRUE) >>  (ACTUAL INDEX) >> : "+actualIndex+ " (NEXT ACTUAL INDEX) >> : "+ nextActualIndex+ " Current Title >> : ");
            //   console.log("selectedTableData >> (selectedTableData): "+ JSON.stringify(this.selectedTableData ));

            // }

            // else{//No Next Title

            //   // Get selectedTableData
            //   for(let x=currentTitleIndex; x < data.length; x++){
            //     this.selectedTableData.push(data[x]);
            //   }

            //   console.log("isNextTitle (FALSE) >>NO NEXT TITLE >> : "+" Current Title >> : "+ title + "Next TitleIndex >> : "+ currentTitleIndex);
            //   console.log("selectedTableData >> (selectedTableData): "+ JSON.stringify(this.selectedTableData) );

            // }
        }
        // setReportsData(){
        //   this.reports = this.allSelectedReportsData;
        //   this.selectedSubRiskNames = this.subRiskNames;
        //   this.mainRiskName = this.selectedMainRiskTitle;
        //   this.selectedDataCountNo = this.selectedDataIndex;

        //   console.log("selectedSubRiskNames : -->"+ JSON.stringify(this.selectedSubRiskNames))
        //   console.log("mainRiskName : -->"+ JSON.stringify(this.mainRiskName))
        //   console.log("selectedDataCountNo : -->"+ JSON.stringify(this.selectedDataCountNo))
        //   console.log("reports : (allSelectedReportsData) -->"+ JSON.stringify(this.reports))

        //   // console.log("checkReportsData : -->"+ JSON.stringify(this.reportsData))
        // },
    },

    created() {
        // Listen to the event to close all accordion items
        EventBus.$on('mainRiskTitleChange', this.closeAccordion)

        //Set Current Title onClick nav btn element
        this.selectedMainRiskTitle = this.selectedMainRiskTitle
    },

    beforeDestroy() {
        // Clean up event listener
        EventBus.$off('mainRiskTitleChange', this.closeAccordion)
    },

    // created(){
    //   // Listen for the closeAccordion event
    //   EventBus.$on('closeAccordion', () => {
    //     // Close all accordion items
    //     this.isOpen = this.isOpen.map(() => false);
    //   });

    //   // this.selectMainRiskTitle = this.selectedMainRiskTitle;
    //   // this.reports = this.allSelectedReportsData;
    //   // this.setReportsData()
    // },
    mounted() {
        //Set Current Title onClick nav btn element
        this.selectedMainRiskTitle = this.selectedMainRiskTitle

        // this.reports = this.allSelectedReportsData;
        // console.log("(allSelectedReportsData) >>>> "+this.allSelectedReportsData);
    }
}
</script>
