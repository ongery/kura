import Vue from 'vue'
import VueRouter from 'vue-router'

import Dashboard from '../components/Dashboard/index.vue'
import RiskDashboard from '../components/Dashboard/RiskDashboard.vue'
// import IncidentDashboard from '../components/Dashboard/IncidentDashboard.vue'
// import KRIDashboard from '../components/Dashboard/KRIDashboard.vue'
// import KCIDashboard from '../components/Dashboard/KCIDashboard.vue'
import ErmDashboard from '../components/Dashboard/ErmDashboard.vue'
import RiskDashboardSingle from '../components/Dashboard/RiskDashboardSingle.vue'
import ErmDashboardSingle from '../components/Dashboard/ErmDashboardSingle.vue'

import RiskLibrarySetup from '../components/RiskLibrarySetup/Index.vue'
import PotentialRisk from '../components/register/index.vue'
import AllPotentialRisks from '../components/register/AllPotentialRisks.vue'
import RiskLibrary from '../components/register/RiskLibrary.vue'
import RiskProfile from '../components/register/ViewPotential.vue'

import BusinessUnit from '../components/BusinessUnits/Index.vue'
import NewBusinessUnit from '../components/BusinessUnits/New.vue'
import EditBusinessUnit from '../components/BusinessUnits/Edit.vue'

import ControlItems from '../components/RiskAppetite/ControlItems.vue'
import Users from '../components/Users/Users.vue'
import CreateUsers from '../components/Users/Create.vue'
import UserProfile from '../components/Users/UserProfile.vue'
import UserRoles from '../components/Users/Roles.vue'

import MyKRIs from '../components/KRIs/MyKRIs.vue'
import AllKRIs from '../components/KRIs/AllKRIs.vue'
import NewKRIItem from '../components/KRIs/NewKRI.vue'
import KRICompliace from '../components/KRIs/profile/index.vue'
import KRITreatment from '../components/KRIs/profile/Treament.vue'
// import KRIEntry from '../components/KRIs/KRIsEntry.vue'
import MyKCI from '../components/Compliance/MyCompliance.vue'
import AllCompliances from '../components/Compliance/AllCompliance.vue'
import NewComplianceItem from '../components/Compliance/NewCompliance.vue'

import ActionTracking from '../components/ActionTracking/index.vue'

import WorkInProgress from '../components/ActionTracking/WorkInProgress.vue'

import AnalysisRoutes from '../components/register/Analysis/router/router'
import SettingsRoutes from '../components/settings/router/router'
import ERMRoutes from '../components/erm/router'
import QMSRoutes from '../components/qms/router'
import ActionsRoutes from '../components/ActionTracking/router'
import CorruptionRiskManagementRoutes from '../components/corruptionriskmgt/router'
import IncidentRoutes from '../components/IncidentManagement/router'
import UserRoues from '../components/Users/router'
import AuditSchedulerRoutes from '../components/AuditScheduler/router'
import KRIRoutes from '../components/KRIs/router'
import RiskCriteriaRoutes from '../components/RiskCriteria/router'

import ReportsRoutes from '../components/reports/router'
import StragicPlanningRoutes from '../components/stategic_plan/router'
import { Report } from 'powerbi-client'
import HistoryLogs from '../components/HistoryLogs/HistoryLogs.vue';
//Assessments Routes
import AssessmentsRoutes from '../components/Assessments/router'

Vue.use(VueRouter)
let routes = [
    {
        path: '/',
        component: Dashboard
    },
    {
        path: '/dashboards/risk',
        component: RiskDashboardSingle
    },
    {
        path: '/dashboards/erm',
        component: ErmDashboardSingle
    },
    // {
    //     path: '/dashboard',
    //     component: Dashboard
    // },
    // {
    //     path: '/dashboard/risk',
    //     component: RiskDashboard
    // },
    // {
    //     path: '/dashboard/incident',
    //     component: IncidentDashboard
    // },
    // {
    //     path: '/dashboard/kri',
    //     component: KRIDashboard
    // },
    // {
    //     path: '/dashboard/kci',
    //     component: KCIDashboard
    // },
    // {
    //     path: '/dashboard/erm',
    //     component: ErmDashboard
    // },


    {
        path: '/AllPotentialRisks',
        name: 'AllPotentialRisks',
        component: AllPotentialRisks
    },

    {
        path: '/ReportNewRisk',
        component: PotentialRisk
    },

    {
        path: '/RiskSetup',
        component: RiskLibrarySetup
    },
    
    {
        path: '/RiskLibrary',
        component: RiskLibrary
    },
    {
        path: '/BusinessUnit',
        component: BusinessUnit
    },
    {
        path: '/NewBusinessUnit',
        name: 'NewBusinessUnit',
        component: NewBusinessUnit
    },
    {
        path: '/BusinessUnit/:id',
        name: 'EditBusinessUnit',
        component: EditBusinessUnit
    },
    {
        path: '/SystemUsers',
        component: Users
    },
    {
        path: '/user_profile',
        name: 'UserProfile',
        component: UserProfile
    },
    {
        path: '/CreateUser',
        name: 'CreateUsers',
        component: CreateUsers
    },
    {
        path: '/GeneralAuthrorization',
        name: 'UserRole',
        component: UserRoles
    },
    {
        path: '/view_risk',
        name: 'RiskProfile',
        component: RiskProfile
    },
    {
        path: '/ControlItems',
        name: 'ControlItems',
        component: ControlItems
    },

    {
        path: '/MyKRIs',
        name: 'MyKRIs',
        component: MyKRIs
    },
    {
        path: '/AllKRIs',
        name: 'AllKRIs',
        component: AllKRIs
    },
    {
        path: '/NewKRIItem',
        name: 'NewKRIItem',
        component: NewKRIItem
    },
    {
        path: '/ItemProfile',
        name: 'ItemProfile',
        component: KRICompliace
    },
    {
        path: '/KRITreatment',
        name: 'KRITreatment',
        component: KRITreatment
    },
    {
        path: '/MyKCI',
        name: 'MyKCI',
        component: MyKCI
    },
    {
        path: '/AllCompliances',
        name: 'AllCompliances',
        component: AllCompliances
    },
    {
        path: '/NewComplianceItem',
        name: 'NewComplianceItem',
        component: NewComplianceItem
    },

    {
        path: '/ActionTracking',
        component: ActionTracking
    },
    {
        path: '/history-logs',
        name: 'HistoryLogs',
        component: HistoryLogs
    },
    {
        path: '/WorkInProgress',
        name: 'WorkInProgress',
        component: WorkInProgress
    },

    ...AnalysisRoutes,
    ...SettingsRoutes,
    ...ERMRoutes,
    ...QMSRoutes,
    ...ActionsRoutes,
    ...CorruptionRiskManagementRoutes,
    ...IncidentRoutes,
    ...UserRoues,
    ...AuditSchedulerRoutes,
    ...KRIRoutes,
    ...ReportsRoutes,
    ...SettingsRoutes,
    ...RiskCriteriaRoutes,
    ...StragicPlanningRoutes,
    ...AssessmentsRoutes
]
const router = new VueRouter({
    mode: 'history',
    hashbang: false,
    routes
})

export default router
