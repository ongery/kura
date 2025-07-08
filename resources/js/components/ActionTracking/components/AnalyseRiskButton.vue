<template>
      
    <!--begin::Primary button-->
    <a href="#" @click.prevent="GoBack"
      class="btn btn-sm fw-bold btn-info btn-active-color-dark" >
      Back        
    </a>
    <!--end::Secondary button-->

</template>



<script>

    export default {
        name:'BackButton',
        methods: {
          goToRoute() {
            this.$route.router.push('/analyse_risk')
          }
        }
    }
    
    
</script>