import MyRCI from './MyRCI.vue'
import AllRCIs from './AllRCIs.vue'
import Create from './NewRCI.vue'
import Edit from './EditRCI.vue'
import RiskCriteria from './rc-scales/index.vue'
export default [
    {
        path: '/risk-criteria/myrci',
        name: 'MyRCIs',
        component: MyRCI
    },
    {
        path: '/risk-criteria/all',
        name: 'AllRCIs',
        component: AllRCIs
    },
    {
        path: '/risk-criteria/rci/create',
        name: 'CreateRCI',
        component: Create
    },
    {
        path: '/risk-criteria/rci/edit/:ObjType/:id',
        name: 'EditRCI',
        component: Edit
    },
    {
        path: '/risk-criteria',
        name: 'MyRCIs',
        component: RiskCriteria
    }
]
