<template>
  <div>
    <ReportNewRisk v-if="showmode === 'new'"></ReportNewRisk>
  </div>
</template>
<script>
import ReportNewRisk from './ReportNewRisk'
export default {
  data() {
    return {
      showmode: '',
      reports: {}
    }
  },
  components: {
    ReportNewRisk
  },
  methods: {
    showNew() {
      this.showmode = 'new'
    }
  },
  created() {
    this.showNew()
  }
}
</script>
