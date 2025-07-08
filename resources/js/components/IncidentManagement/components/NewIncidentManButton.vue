<template>
      
    <!--begin::Primary button-->
    <a href="#" @click.prevent="NewItem"
      class="btn btn-sm fw-bold btn-success btn-active-color-dark" >
      New        
    </a>
    <!--end::Secondary button-->

</template>



<script>

    export default {
        name:'NewIncidentManButton',
        methods: {
          NewItem() {
            this.$router.push({ name: 'NewIncident' })
          },
        }
    }
    
    
</script>