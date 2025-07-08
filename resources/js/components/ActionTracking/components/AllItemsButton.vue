<template>
    <a href="javascript:void(0)" @click.prevent="AllItems" class="btn btn-sm fw-bold btn-success btn-active-color-dark">
        All Items
    </a>
</template>

<script>
export default {
    name: 'AllItemsButton',
    methods: {
        AllItems() {
            this.$router.push({ name: 'AllActions' })
        }
    }
}
</script>
