<template>
      
    <!--begin::Primary button-->
    <a href="#" @click.prevent="forReview"
      class="btn btn-sm fw-bold btn-warning btn-active-color-dark" >
      For Review        
    </a>
    <!--end::Secondary button-->

</template>



<script>

    export default {
        name:'ForReviewIncidentManButton',
        methods: {
          forReview() {
            this.$router.push({ name: 'ForReview' })
          },
        }
    }
    
    
</script>