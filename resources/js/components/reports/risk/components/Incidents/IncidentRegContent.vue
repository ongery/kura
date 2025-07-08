<template>

    <IncidentTable :reports="reports"></IncidentTable>
</template>


<script>

    import IncidentTable from './IncidentTable.vue'

    export default {

        name:'IncidentRegContent',
        props:['reports', ],
        components:{IncidentTable, }


    }

</script>