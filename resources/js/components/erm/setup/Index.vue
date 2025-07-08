<template>
    <div>
        <RiskEvents v-if="showmode === 'events'"></RiskEvents>
    </div>
</template>
<script>
import RiskEvents from './_componets/RiskEvents'

export default {
    data() {
        return {
            showmode: '',
            reports: {}
        }
    },
    components: {
        RiskEvents
    },
    methods: {
        showEvents() {
            this.showmode = 'events'
        }
    },
    created() {
        this.showEvents()
    }
}
</script>
