import CRMSetupData from './Index.vue'
import CRMRiskEvents from './analysis/index.vue'
import AnalyseRiskProfile from './analysis/AnalyseRiskProfile.vue'
import CRMActionTrackingCreate from './analysis/RiskProfile/ActionTrackingCreate.vue'
import CRMActionProfile from './analysis/RiskProfile/CRMActionProfile.vue'
import CRMNewActivity from './analysis/RiskProfile/CreateActivities.vue'

import MyISOKPIs from './cris/MyKRIs.vue'
import AllKPIs from './cris/AllKRIs.vue'
import NewKPIItem from './cris/NewKRI.vue'

export default [
    {
        path: '/CRMSetupData',
        component: CRMSetupData
    },
    {
        path: '/CRMRiskEvents',
        component: CRMRiskEvents
    },
    {
        path: '/CREAnalyseMainRisk',
        name: 'CREAnalyseMainRisk',
        component: AnalyseRiskProfile
    },
    {
        path: '/CRMActionTrackingCreate',
        name: 'CRMActionTrackingCreate',
        component: CRMActionTrackingCreate
    },
    {
        path: '/MyCRIs',
        component: MyISOKPIs
    },
    {
        path: '/AllCRIs',
        name: 'AllCRIs',
        component: AllKPIs
    },
    {
        path: '/NewCRIItem',
        name: 'NewCRIItem',
        component: NewKPIItem
    },
    {
        path: '/crm/CorruptionPreventionStrategy',
        name: 'CRMActionProfile',
        component: CRMActionProfile
    },
    {
        path: '/crm/CorruptionPreventionStrategy/Activity',
        name: 'CRMCreateActivity',
        component: CRMNewActivity
    }
]
