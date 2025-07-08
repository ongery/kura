<template>
      
    <!--begin::Primary button-->
    <a href="#" @click.prevent="GoBack"
      class="btn btn-sm fw-bold btn-info btn-active-color-dark" >
      Add New        
    </a>
    <!--end::Secondary button-->

</template>



<script>

    export default {
        name:'AddCategoryButton',
        methods: {
          GoBack() {
            this.$router.back()
          }
        }
    }
    
    
</script>