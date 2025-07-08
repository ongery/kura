<template>
    <div>
        <div class="app-toolbar py-3">
            <div id="kt_app_toolbar_container" class="app-container  container-xxl d-flex flex-stack ">
                <div class="mb-2 mt-4 page-title d-flex flex-column justify-content-start flex-wrap">
                    <div class="d-flex">
                        <div v-if="isMobile" class="btn btn-icon btn-active-icon-primary p-0" style="margin-left: -25px; margin-right: 15px;" id="kt_aside_toggle">
                            <span class="svg-icon svg-icon-2x">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z" fill="black" />
                                    <path opacity="0.3" d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z" fill="black" />
                                </svg>
                            </span>
                        </div>

                        <div>
                            <h1 class="page-heading d-flex text-dark text-white-400 fw-bold fs-3 flex-column">{{ name }}</h1>
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
                                            Dashboard
                                        </a>
                                    </div>
                                </li>

                                <li class="breadcrumb-item text-muted">
                                    <div class="flex items-center">
                                        -
                                        <a href="javascript:void(0)" class="text-gray-500 mt-1 fw-semibold fs-6 text-muted ml-4 text-hover-success">
                                            {{ name }}
                                        </a>
                                    </div>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- //Switch UUI by data change on Nav click -->
        <RiskDashboard v-if="showmode === 'risk'"></RiskDashboard>
        <ERMDashboard v-else-if="showmode === 'erm'"></ERMDashboard>

        <Dashboard v-else-if="showmode === 'dashboard'"></Dashboard>
    </div>
</template>

<script>
import RiskDashboard from './RiskDashboard.vue'
import ERMDashboard from './ErmDashboard.vue'
import ErmOverview from './components/ErmOverview.vue'
import Dashboard from './Dashboard.vue'

export default {
    data() {
        return {
            isMobile: false,
            showmode: 'dashboard',
            name: 'Dashboard',
            reports: {}
        }
    },
    components: {
        RiskDashboard,
        ERMDashboard,
        ErmOverview,
        Dashboard
    },
    props: ['show'],
    methods: {
        checkMediaQuery() {
            // Check the media query and update the isMobile property accordingly @768px
            this.isMobile = window.matchMedia('(max-width: 800px)').matches
        },

        show() {
            if (this.show) {
                if (this.show === 'dashboard') {
                    this.showmode = 'dashboard'
                    this.showDashboard()
                }

                if (this.show === 'risk') {
                    this.showmode = 'risk'
                    this.showRiskDashboard()
                }

                if (this.show === 'erm') {
                    this.showmode = 'risk'
                    this.showERMDashboard()
                }
            }
        },
        
        showDashboard() {
            this.showmode = 'dashboard'
            this.name = 'Dashboard'
        },

        showRiskDashboard() {
            this.showmode = 'risk'
            this.name = 'Risk Dashboard'
        },

        showERMDashboard() {
            this.showmode = 'erm'
            this.name = 'ERM Dashboard'
        }
    },
    mounted() {
        // Check the media query initially
        this.checkMediaQuery()

        // Watch for changes in the viewport size
        window.addEventListener('resize', this.checkMediaQuery)
    },
    created() {
        this.show()
    },
    beforeDestroy() {
        // Remove the resize event listener when the component is destroyed
        window.removeEventListener('resize', this.checkMediaQuery)
    }
}
</script>
