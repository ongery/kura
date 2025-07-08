<template>
      
    <!--begin::Primary button-->
    <a href="#"
      @click.prevent="MyKRIs"
      class="btn btn-sm fw-bold btn-info btn-active-color-dark" >
      Back        
    </a>
    <!--end::Secondary button-->


</template>



<script>

    export default {
        name:'MyKRIButton',
        methods: {
            
          MyKRIs() {
            this.$router.push({ name: 'MyRCIs' })
          },

        }
    }
    
    
</script>