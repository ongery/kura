<template>
      
    <!--begin::Primary button-->
    <a href="#" @click.prevent="MyKRIs"
      class="btn btn-sm fw-bold btn-info btn-active-color-dark" >
      All Incidents        
    </a>
    <!--end::Secondary button-->

</template>



<script>

    export default {
        name:'AllIncidentsButton',
        methods: {
          MyKRIs() {
            this.$router.push({ name: 'AllIncidents' })
          },
        }
    }
    
    
</script>