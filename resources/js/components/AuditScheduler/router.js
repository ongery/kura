import AuditScheduler from './Index.vue'
import NewAuditScheduler from './New.vue'
import AuditSchedulerEdit from './Edit.vue'
export default [
    {
        path: '/AuditScheduler',
        name: 'AuditScheduler',
        component: AuditScheduler
    },
    {
        path: '/NewAuditSchedule',
        name: 'NewAuditSchedule',
        component: NewAuditScheduler
    },
    {
        path: '/AuditScheduler/:id',
        name: '/AuditSchedulerEdit',
        component: AuditSchedulerEdit
    }
]
