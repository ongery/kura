import ComingSoon from './ComingSoon.vue'
import RiskRegister from './risk/RiskRegister.vue'
import KeyRiskIndicatorRegister from './risk/KeyRiskIndicatorsRegister.vue'
import KCI from './risk/kci.vue'
import Action from './risk/action.vue'
import IncidentRegister from './risk/IncidentRegister.vue'
import ERMRegister from './erm/ERMRegister.vue'
import QMSRegister from './qms/QMSRegister.vue'

import CRMRegister from './crm/CRMRegister.vue'
import CRMReport from './crm/CRMReport.vue'

import StrategicRegister from './strategic/StrategicRegister.vue'

export default [
    {
        path: '/coming_soon',
        component: ComingSoon
    },
    {
        path: '/report/risk_register',
        component: RiskRegister
    },
    {
        path: '/report/kri/register',
        component: KeyRiskIndicatorRegister
    },
    {
        path: '/report/kci/register',
        component: KCI
    },
    {
        path: '/report/incident/register',
        component: IncidentRegister
    },
    {
        path: '/report/action/register',
        component: Action
    },
    {
        path: '/report/ERM/register',
        component: ERMRegister
    },
    {
        path: '/report/CRM/register',
        component: CRMRegister
    },
    {
        path: '/report/CRM/repot',
        component: CRMReport
    },
    {
        path: '/report/strategic/register',
        component: StrategicRegister
    },
    {
        path: '/report/qms',
        component: QMSRegister
    }
]
