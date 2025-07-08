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
                            <a href="#" class="text-gray-400 hover:text-gray-500">
                                <svg class="flex-shrink-0 h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                                </svg>
                                <span class="sr-only">Dashboard</span>
                            </a>
                        </div>
                    </li>
                    <li class="breadcrumb-item text-muted">
                        <div class="flex items-center">
                            <a class="text-gray-500 mt-1 fw-semibold fs-6 text-muted ">
                                Risk Analysis
                            </a>
                        </div>
                    </li>

                    <li v-if="title != 'Enterprise Risks'" class="breadcrumb-item text-muted">
                        <div class="flex items-center">
                            -
                            <a class="text-gray-500 mt-1 fw-semibold fs-6 text-muted ml-4 text-hover-success">
                                {{ title }}
                            </a>
                        </div>
                    </li>
                </ol>
            </div>

            <div class="d-flex align-items-center gap-2 gap-lg-3">
                <router-link to="/MainRiskAnalysis" v-if="title !== 'Enterprise Risks' && title === 'Corporate Risks'">
                    <button class="btn btn-sm fw-bold btn-secondary btn-active-color-dark">
                        Enterprise Risk
                    </button>
                </router-link>

                <AddNewButton v-if="title === 'Enterprise Risks' && title !== 'Corporate Risks'"></AddNewButton>
                
                <router-link to="/CorporateRiskAnalysis" v-if="title === 'Enterprise Risks' && title !== 'Corporate Risks'">
                    <button class="btn btn-sm fw-bold btn-secondary btn-active-color-dark">
                        Corporate Risk
                    </button>
                </router-link>

                <router-link to="/AddCorporateRisk" v-if="title !== 'Enterprise Risks' && title === 'Corporate Risks'">
                    <button class="btn btn-sm fw-bold btn-success btn-active-color-dark">
                        Add Corporate Risk
                    </button>
                </router-link>

                <BackButton v-if="title !== 'Enterprise Risks' && title !== 'Corporate Risks'"></BackButton>
            </div>
        </div>
    </div>
</template>

<script>
import BackButton from './BackButton.vue'
import AddNewButton from './AddNewButton.vue'

export default {
    name: 'RiskAnalysisToolbar',
    props: ['title'],
    components: { BackButton, AddNewButton }
}
</script>
