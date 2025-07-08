<template>
      
    <!--begin::Primary button-->
    <a href="#" @click.prevent="AllKRIs"
      class="btn btn-sm fw-bold btn-success btn-active-color-dark" >
      View All        
    </a>
    <!--end::Secondary button-->

</template>



<script>

    export default {
        name:'AllKRIsButton',
        methods: {
          AllKRIs() {
            this.$router.push({ name: 'AllAttestation' })
          },
        }
    }
    
    
</script>