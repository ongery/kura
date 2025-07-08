<template>
    <a href="javascript:void(0)" @click.prevent="TreatmentActions" class="btn btn-sm fw-bold btn-bg-secondary">
        Treatment Action
    </a>
</template>

<script>
export default {
    name: 'TreatmentActionButton',
    methods: {
        TreatmentActions() {
            this.$router.push({ name: 'TreatmentAction' })
        }
    }
}
</script>
