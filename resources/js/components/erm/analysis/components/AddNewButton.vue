<template>
      
    <!--begin::Primary button-->
    <a href="#" @click.prevent="newAnalysis"
      class="btn btn-sm fw-bold btn-success btn-active-color-dark" >
      Add Enterprise Risk
    </a>
    <!--end::Secondary button-->

</template>



<script>

    export default {
        name:'AddNewButton',
        methods: {
          newAnalysis() {
            this.$router.push({ name: 'AddNewMainRisk' })
          },
        }
    }
    
    
</script>