<template>
      
    <!--begin::Primary button-->
    <a href="#" @click.prevent="GoBack"
      class="btn btn-sm fw-bold btn-info" >
      Back        
    </a>
    <!--end::Secondary button-->

</template>



<script>

    export default {
        name:'BackButton',
        methods: {
          GoBack() {
            this.$router.back()
          }
        }
    }
    
    
</script>