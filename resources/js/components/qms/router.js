import Procedures from './procedures/index'
import ProcedureProfile from './procedures/ProcedureProfile.vue'
import MyISOKPIs from './kpis/MyKRIs.vue'
import AllKPIs from './kpis/AllKRIs.vue'
import NewKPIItem from './kpis/NewKRI.vue'

import MyAttestation from './attestetion/MyCompliance.vue'
import AllAttestation from './attestetion/AllCompliance.vue'
import NewAttestation from './attestetion/NewCompliance.vue'

import NewOpportunity from './procedures/ProcedureProfile/NewOpportunity.vue'

import NewProcedureDesc from './procedures/NewProcedureDesc.vue'
import NewProcedureContent from './procedures/NewProcedureProfile/IndexProfile.vue'

import NCRIndex from './ncr/index.vue'
import NCRProfile from './ncr/IndexProfile.vue'

import SAQuestions from './SelfAssessment/Questions.vue'

export default [
    {
        path: '/Procedures',
        component: Procedures
    },
    {
        path: '/procedures/:id',
        name: 'ProcedureProfile',
        component: ProcedureProfile
    },
    {
        path: '/MyISOKPIs',
        name: 'MyISOKPIs',
        component: MyISOKPIs
    },
    {
        path: '/AllKPIs',
        name: 'AllKPIs',
        component: AllKPIs
    },
    {
        path: '/NewKPIItem',
        name: 'NewKPIItem',
        component: NewKPIItem
    },
    {
        path: '/MyAttestation',
        name: 'MyAttestation',
        component: MyAttestation
    },
    {
        path: '/AllAttestation',
        name: 'AllAttestation',
        component: AllAttestation
    },
    {
        path: '/NewAttestation',
        name: 'NewAttestation',
        component: NewAttestation
    },
    {
        path: '/procedures/:id/create/opportunity',
        name: 'NewOpportunity',
        component: NewOpportunity
    },
    {
        path: '/procedure-desc',
        name: 'NewProcedureDesc',
        component: NewProcedureDesc
    },
    {
        path: '/new-procedure/:id',
        name: 'NewProcedureContent',
        component: NewProcedureContent
    },
    {
        path: '/qms/ncr',
        name: 'NCRIndex',
        component: NCRIndex
    },
    {
        path: '/qms/ncr/:id',
        name: 'NCRProfile',
        component: NCRProfile
    },
    {
        path: '/sa_questions',
        name: 'SAQuestions',
        component: SAQuestions
    }
]
