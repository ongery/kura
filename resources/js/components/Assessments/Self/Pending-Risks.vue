<template>
    <table class="table">
        <thead>
        <tr>
            <th>Pending Risks</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="risk in pendingRisks" :key="risk">
            <td>{{ risk }}</td>
        </tr>
        </tbody>
    </table>
</template>
<script>
export default {
  data() {
    return {
        activeTab:'Self Assessments'
    }
  }
}
</script>
