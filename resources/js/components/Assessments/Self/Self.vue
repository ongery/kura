<template>
    <div>
        <p>Content for Self Assessments.</p>

        <div class="tabs-container">
            <div class="tabs">
            <button
                :class="{ active: 'Assessments' === activeTabIn }"
                @click="activeTabIn = 'Assessments'"
            >
                Assessments
            </button>
            <!-- <button
                :class="{ active: 'PendingRisks' === activeTabIn }"
                @click="activeTabIn = 'PendingRisks'"
            >
                Pending Risks
            </button> -->
            </div>
        </div>

        <div class="tab-content">
            <component :is="getTabComponent(activeTabIn)" v-if="activeTabIn"></component>
        </div>
    </div>
</template>
<script>
import Assessments from './Assessments.vue'
import PendingRisks from './Pending-Risks.vue'

export default {
  data() {
    return {
      activeTabIn: 'Assessments',
    };
  },
  methods: {
    getTabComponent(tabName) {
      switch (tabName) {
        case "Assessments":
          return Assessments;
        case "PendingRisks":
          return PendingRisks;
        default:
          return null;
      }
    }
  },
};
</script>

<style scoped>
.dashboard {
  display: flex;
}

.sidebar {
  background-color: #2a623d;
  width: 240px;
  padding: 20px;
  color: #fff;
}

.sidebar ul {
  list-style-type: none;
  padding: 0;
}

.sidebar ul li {
  margin-bottom: 10px;
}

.sidebar ul li a {
  color: #fff;
  text-decoration: none;
}

.sidebar ul li.active {
  background-color: #1b4729;
  padding: 10px;
}

.content {
  flex: 1;
  padding: 20px;
}

.tabs-container {
  border-bottom: 1px solid #ccc;
  margin-bottom: 20px;
}

.tabs {
  display: flex;
  gap: 10px;
}

.tabs button {
  background: none;
  border: none;
  padding: 10px 20px;
  cursor: pointer;
  background-color: #f5f5f5;
  border-radius: 5px;
  transition: background-color 0.3s;
}

.tabs button.active {
  background-color: #2a623d;
  color: #fff;
}

.tab-content {
  margin-top: 20px;
}

.tab-panel {
  display: none;
}

.tab-panel.active {
  display: block;
}

.table {
  width: 100%;
  border-collapse: collapse;
}

.table th,
.table td {
  border: 1px solid #ccc;
  padding: 10px;
  text-align: left;
}

.table th {
  background-color: #f5f5f5;
}
</style>
