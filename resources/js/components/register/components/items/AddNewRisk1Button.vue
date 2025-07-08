<template>
      
    <!--begin::Primary button-->
    <!-- <a href="./add_analyse_risk" target="_blank" -->
    <a href="javascript:void(0)" @click.prevent="newAnalysis"
      class="btn btn-sm fw-bold btn-success btn-active-color-dark" >
      Add New
    </a>
    <!--end::Secondary button-->

</template>



<script>

    export default {
        name:'AddNewRisk1Button',
        methods: {
            newAnalysis() {
                this.$router.push({ name: 'AnalyseRiskNew' })
            },
        }
    }
    
    
</script>