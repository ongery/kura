<template>
      
            <!--begin::Primary button-->
            <a href="#"
              @click.prevent="NewKRIItem"
              class="btn btn-sm fw-bold btn-success btn-active-color-dark" >
              New        
            </a>
            <!--end::Secondary button-->


</template>



<script>

    export default {
        name:'NewKRIButton',
        methods: {
          NewKRIItem() {
            this.$router.push({ name: 'CreateRCI' })
          },
        }
    }
    
    
</script>