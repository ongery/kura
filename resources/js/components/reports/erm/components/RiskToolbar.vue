<template>
    <div class="app-toolbar py-3">
        <div id="kt_app_toolbar_container" class="app-container  container-xxl d-flex flex-stack ">
            <div class="mb-2 mt-4 page-title d-flex flex-column justify-content-start flex-wrap">
                <h1 class="page-heading d-flex text-dark text-white-400 fw-bold fs-3 flex-column">
                    {{ title }}
                </h1>

                <ol style="margin-left: -6px;" role="list" class="flex items-center space-x-4 breadcrumb  breadcrumb-separatorless text-gray-400 fw-semibold pt-1">
                    <li>
                        <div>
                            <a href="javascript:void(0)" class="text-gray-400 hover:text-gray-500">
                                <svg class="flex-shrink-0 h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                                </svg>
                                <span class="sr-only">Dashboard</span>
                            </a>
                        </div>
                    </li>

                    <li class="breadcrumb-item text-muted">
                        <div class="flex items-center">
                            <a href="javascript:void(0)" class="text-gray-500 mt-1 fw-semibold fs-6 text-muted ">
                                Risk Management
                            </a>
                        </div>
                    </li>
                    
                    <li class="breadcrumb-item text-muted">
                        <div class="flex items-center">
                            -
                            <a href="javascript:void(0)" class="text-gray-500 mt-1 fw-semibold fs-6 text-muted ml-4 text-hover-success">
                                {{ title }}
                            </a>
                        </div>
                    </li>
                </ol>
            </div>
            
            <div class="d-flex align-items-center gap-2 gap-lg-3">
                <!-- <ReportExport v-if="title === 'ERM Register'"></ReportExport> -->
                <a @click="generatePdf" class="btn btn-sm fw-bold bg-body btn-color-success btn-active-color-dark">
                    <span v-if="isStartLoader" class="spinner-border spinner-border-sm me-3"></span>
                    Report Export 
                </a>

                <RiskERMExportButton v-if="title === 'ERM Register'"></RiskERMExportButton>
                <ReportExportContent v-if="isReportExport" ref="exportReportContent"></ReportExportContent>
            </div>
        </div>

        
    </div>
</template>

<script>
    import RiskERMExportButton from './RiskERMExportButton.vue';
    import ReportExportContent from '../../ReportExportContent.vue';
    import { jsPDF } from 'jspdf'
    import html2pdf from 'html2pdf.js';
    import 'jspdf-autotable'
    import { Pie, PolarArea } from 'vue-chartjs'
    import { Chart as ChartJS, Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale } from 'chart.js'

    ChartJS.register(Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale)

    export default {
        name: 'RiskToolbar',
        props: ['title'],
        data() {
            return {
                isReportExport: false,
                isStartLoader: false,
            };
        },
        components: { Pie, PolarArea, RiskERMExportButton, ReportExportContent/*, ReportExport*/ },

        methods: {
            async generatePdf() {
                this.isReportExport = true;
                this.isStartLoader = true;
                await this.$nextTick();

                const content = this.$refs.exportReportContent.$el;
                const options = {
                    // margin:       0.5,
                    filename:     'export.pdf',
                    image:        { type: 'jpeg', quality: 0.90 },
                    html2canvas:  { scale: 2 },
                    jsPDF:        { unit: 'in', format: 'a4', orientation: 'portrait' },
                    // pagebreak:    { mode: 'avoid-all', before: '.page-break' },
                    pagebreak:    { mode: ['css', 'legacy'] }
                };

                html2pdf().set(options).from(content).save().then(() => {
                    this.isReportExport = false;
                    this.isStartLoader = false;
                });
            },
        }
    }
</script>

