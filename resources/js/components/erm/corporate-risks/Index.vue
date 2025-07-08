<template>
    <div>
        <CorporateRisks :title="'Corporate Risks'"></CorporateRisks>
    </div>
</template>

<script>
import CorporateRisks from './_componets/CorporateRisks'

export default {
    data() {
        return {
            reports: {}
        }
    },
    components: {
        CorporateRisks
    },
}
</script>
