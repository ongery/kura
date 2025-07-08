import AllCategories from '../AllCategory.vue'
import ConsequenceScaleGrp from '../ScaleGroup.vue'
import LikelihoodScale from '../LikeLikeHoodScale.vue'
import OrganazationSetting from '../OrganizationSetting.vue'
export default [
    {
        path: '/Category',
        component: AllCategories
    },
    {
        path: '/ConsequenceScaleGroup',
        component: ConsequenceScaleGrp
    },
    {
        path: '/LikelikehoodScale',
        component: LikelihoodScale
    },
    {
        path: '/settings',
        name: 'Settings',
        component: OrganazationSetting
    }
]
