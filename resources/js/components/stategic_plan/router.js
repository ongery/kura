import Planning from './Planning.vue'
import ProfileFrom from './profile/Index.vue'
import StrategicObjective from './strategic_objective/Index.vue'

import ScoreCardCreate from './ScoreCard/Create.vue'
import WorkPlanCreate from './WorkPlan/Create.vue'
import ScoreCardEdit from './ScoreCard/Edit.vue'

import MyAction from './myaction/Index.vue'
import ViewAction from './myaction/View.vue'

import StrategicSetup from './Setup/index.vue'
export default [
    {
        path: '/strategic/planning',
        name: 'Planning',
        component: Planning
    },
    {
        path: '/strategic/objective',
        name: 'StrategicObjective',
        component: StrategicObjective
    },
    {
        path: '/strategic/profile_form',
        name: 'profile_form',
        component: ProfileFrom
    },
    {
        path: '/score_card/create',
        name: 'ScoreCardCreate',
        component: ScoreCardCreate
    },
    {
        path: '/score_card/edit/:id',
        name: 'ScoreCardEdit',
        component: ScoreCardEdit
    },
    {
        path: '/work_plan/create',
        name: 'WorkPlanCreate',
        component: WorkPlanCreate
    },
    {
        path: '/strategic/actions',
        name: 'MyAction',
        component: MyAction
    },
    {
        path: '/strategic/setup',
        name: 'StrategicSetup',
        component: StrategicSetup
    },
    {
        path: '/strategic/actions/:id',
        name: 'EditAction',
        component: ViewAction
    }
]
