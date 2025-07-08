<template>
  <div>
    <nav class="nav nav-tabs row mt-2 navbar-dark bg-dark">
      <a
        href="#"
        class="nav-item nav-link"
        @click.prevent="showRiskDashboard"
      ><b>Risk Dashboard</b></a>
      <a
        href="#"
        class="nav-item nav-link"
        @click.prevent="showERMDashboard"
      ><b>ERM Dashboard</b></a>
    </nav>


    <!-- //Switch UUI by data change on Nav click -->
    <RiskDashboard v-if="showmode === 'risk'"></RiskDashboard>
    <ERMDashboard v-else-if="showmode === 'erm'"></ERMDashboard>


  </div>
</template>
<script>
import RiskDashboard from './RiskDashboard.vue'
import ERMDashboard from './ErmDashboard.vue'

export default {
  data() {
    return {
      showmode: 'risk',
      reports: {}
    }
  },
  components: {
    RiskDashboard,
    ERMDashboard
  },

  methods: {
    showRiskDashboard() {
      this.showmode = 'risk'
    },
    showERMDashboard() {
      this.showmode = 'erm'
    }
  },
  created() {
    this.showRiskDashboard()
  }
}
</script>
