import MainRiskEvents from './setup/Index.vue'
import RiskAnalysiIndex from './analysis/index.vue'
import CorporateRiskAnalysisIndex from './analysis/CorporateRiskAnalysisIndex.vue'
import AddNewMainRisk from './analysis/NewRiskAnalyze.vue'
import AddCorporateRisk from './analysis/CorporateRiskAnalyze.vue'
import AnalyseMailRiskProfile from './analysis/AnalyseRiskProfile.vue'
import AnalyseCorporateRiskProfile from './analysis/AnalyseCorporateRiskProfile.vue'
import CorporateRisks from './corporate-risks/Index.vue'
export default [
    {
        path: '/main-risk-events',
        component: MainRiskEvents
    },
    {
        path: '/MainRiskAnalysis',
        component: RiskAnalysiIndex
    },
    {
        path: '/CorporateRiskAnalysis',
        component: CorporateRiskAnalysisIndex
    },
    {
        path: '/AddNewMainRisk',
        name: 'AddNewMainRisk',
        component: AddNewMainRisk
    },
    {
        path: '/AddCorporateRisk',
        name: 'AddCorporateRisk',
        component: AddCorporateRisk
    },
    {
        path: '/ERM/AnalyseMainRisk/:id',
        name: 'AnalyseMailRiskProfile',
        component: AnalyseMailRiskProfile
    },
    {
        path: '/ERM/AnalyseCorporateRiskProfile/:id',
        name: 'AnalyseCorporateRiskProfile',
        component: AnalyseCorporateRiskProfile
    },
    {
        path: '/corporate-risks',
        component: CorporateRisks
    }
]
