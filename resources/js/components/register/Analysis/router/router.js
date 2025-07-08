import Index from '../Index.vue'
import AnalyseRiskProfile from '../AnalyseRiskProfile.vue'
import NewRiskAnalyze from '../NewRiskAnalyze.vue'
import AddNewRisk from '../AddNewRisk.vue'
export default [
    {
        path: '/RiskAnalysis',
        component: Index
    },
    {
        path: '/analyse_risk',
        name: 'AnalyseRiskProfile',
        component: AnalyseRiskProfile
    },
    {
        path: '/add_analyse_risk',
        name: 'AnalyseRiskNew',
        component: NewRiskAnalyze
    },
    {
        path: '/add_new_risk',
        name: 'AddNewRisk',
        component: AddNewRisk
    }
]
