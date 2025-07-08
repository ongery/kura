<template>
  <div>
    <nav class="nav nav-tabs row mt-2 navbar-dark bg-dark">
      <a
        href="#"
        class="nav-item nav-link"
        @click="showConsequenceMatrix"
      ><b>Consequence Matrix</b></a>
      <a
        href="#"
        class="nav-item nav-link"
        @click="showLikelihoodScale"
      ><b>Likelihood Scale</b></a>

      <a
        href="#"
        class="nav-item nav-link"
        @click="showRiskAppetite"
      ><b>Risk Appetitie</b></a>
    </nav>
    <ConsequenceMatrix v-if="showmode === 'risk'"></ConsequenceMatrix>
    <LikelihoodScale v-else-if="showmode === 'erm'"></LikelihoodScale>
    <RiskAppetite v-else-if="showmode === 'riskappetite'"></RiskAppetite>
  </div>
</template>
<script>
import ConsequenceMatrix from './ConsequenceMatrix.vue'
import LikelihoodScale from './LikelihoodScale.vue'
import RiskAppetite from './RiskAppetiteMatrix.vue'
export default {
  data() {
    return {
      showmode: 'risk',
      reports: {}
    }
  },
  components: {
    ConsequenceMatrix,
    LikelihoodScale,
    RiskAppetite
  },

  methods: {
    showConsequenceMatrix() {
      this.showmode = 'risk'
    },
    showLikelihoodScale() {
      this.showmode = 'erm'
    },
    showRiskAppetite() {
      this.showmode = 'riskappetite'
    }
  },
  created() {
    this.showConsequenceMatrix()
  }
}
</script>
