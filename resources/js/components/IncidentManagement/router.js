import AllIncidents from './Index.vue'
import NewIncident from './New.vue'
import EditIncident from './Edit.vue'
import ForReview from './ForReview.vue'
import IncidentAttachment from './Attachments.vue'
import ActionIndex from './Actionindex.vue'
import ActionsCreate from './CreateActions.vue'
export default [
    {
        path: '/AllIncidents',
        name: 'AllIncidents',
        component: AllIncidents
    },
    {
        path: '/NewIncident',
        name: 'NewIncident',
        component: NewIncident
    },
    {
        path: '/IncidentForReview',
        name: 'ForReview',
        component: ForReview
    },
    {
        path: '/incident/:id',
        name: 'EditIncident',
        component: EditIncident
    },
    {
        path: '/incident/attachments/:id',
        name: 'IncidentAttachment',
        component: IncidentAttachment
    },
    {
        path: '/incident/actions/:id',
        name: 'ActionIndex',
        component: ActionIndex
    },
    {
        path: '/incident/actions/:id/create',
        name: 'ActionCreate',
        component: ActionsCreate
    }
]
