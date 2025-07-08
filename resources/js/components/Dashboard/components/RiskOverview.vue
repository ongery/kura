<template>
    <!-- begin: Row -->
    <div class="row flex flex-lg-row-fluid">
        <KeyRiskIndicators :summaryReports="summaryReports" :totalRiskCal="this.totalRiskCal"></KeyRiskIndicators>
        <KeyRiskIndicatorsTends :summaryReports="summaryReports" :totalRiskCal="this.totalRiskCal"></KeyRiskIndicatorsTends>
        <RiskEvents :summaryReports="summaryReports" :totalRiskCal="this.totalRiskCal"></RiskEvents>
        <RiskStatus :summaryReports="summaryReports" :totalRiskCal="this.totalRiskCal"></RiskStatus>
        <ResidualRiskAssessment :summaryReports="summaryReports" :totalRiskCal="this.totalRiskCal"></ResidualRiskAssessment>
    </div>
</template>


<script>
    // import OctagonHighRisk from './items/OctagonHighRisk.vue';
    // import OctagonMidRisk from './items/OctagonMidRisk.vue';
    // import OctagonLowRisk from './items/OctagonLowRisk.vue';
    // import TotalRisk from './items/TotalRisk.vue';
    // import CardOverviewLowRiskDash from './items/CardOverviewLowRiskDash.vue';
    // import CardOverviewHighRiskDash from './items/CardOverviewHighRiskDash.vue';
    // import CardOverviewMidRiskDash from './items/CardOverviewMidRiskDash.vue';

    import RiskStatus from './items/RiskStatus.vue';
    import RiskEvents from './items/RiskEvents.vue';
    import KeyRiskIndicators from './items/KeyRiskIndicators.vue';
    import KeyRiskIndicatorsTends from './items/KeyRiskIndicatorsTends.vue';
    import ResidualRiskAssessment from './items/ResidualRiskAssessment.vue';

    export default {
        name:'RiskOverview',
        props:['summaryReports','totalRiskCal'],
        data() {
            return {
                totalRiskCalculated:'0',
                totalRiskReport:'0',
                lowRisk:'0',
                highRisk:'0',
                midRisk:'0',
            }
        },

        // components:{OctagonHighRisk, OctagonMidRisk, OctagonLowRisk, TotalRisk, CardOverviewLowRiskDash, CardOverviewHighRiskDash,CardOverviewMidRiskDash, KeyRiskIndicators},
        components:{RiskEvents, RiskStatus, KeyRiskIndicators, KeyRiskIndicatorsTends, ResidualRiskAssessment},
    }
</script>