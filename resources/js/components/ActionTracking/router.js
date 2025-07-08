import AllActions from './AllActions.vue'
import TreatmentAction from './TreatmentAction.vue'
import ActionTrackingCreate from './Create.vue'
import ActionProfile from './ActionProfile.vue'
import ActionEdit from './ActionProfileEdit.vue'
import TreatmentActionEdit from './TreatmentActionEdit.vue'

export default [
    {
        path: '/all_actions',
        name: 'AllActions',
        component: AllActions
    },
    {
        path: '/ActionTrackingCreate',
        name: 'ActionTrackingCreate',
        component: ActionTrackingCreate
    },
    {
        path: '/ActionProfile',
        name: 'ActionProfile',
        component: ActionProfile
    },
    {
        path: '/ActionProfile/:id',
        name: 'ActionProfileId',
        component: ActionProfile
    },
    {
        path: '/ActionTrackingEdit/:id',
        name: 'ActionTrackingEdit',
        component: ActionEdit
    },
    {
        path: '/TreatmentAction',
        name: 'TreatmentAction',
        component: TreatmentAction
    },
    {
        path: '/TreatmentAction/:id',
        name: 'TreatmentActionEdit',
        component: TreatmentActionEdit
    },
]
