<template>
  <div class="dashboard">

    <div class="content">
      <div class="tabs-container">
        <div class="tabs">
            <button
                v-for="tab in tabs"
                :key="tab.name"
                :title="tab.label"
                :class="{ active: tab.name === activeTab }"
                @click="activeTab = tab.name"
            >
            {{ tab.label }}
            </button>
        </div>
      </div>

      <div class="tab-content">
        <component :is="getTabComponent(activeTab)" v-if="activeTab"></component>
      </div>
    </div>
  </div>
</template>

<script>
import Self from './Self/Self'
import Contacts from './Contacts/Contacts'
import Questions from './Questions/Questions'
import Templates from './Templates/Templates'
import Questionnaires from './Questionnaires/Questionnaires'
import QuestionnairesResult from './Results/QuestionnairesResult'
import RiskAnalysis from './RiskAnalysis/RiskAnalysis'
import ImportExport from './ImportExport/ImportExport'
import AuditTrail from './AuditTrail/AuditTrail'

export default {
  data() {
    return {
      tabs: [
        { name: "Self", label: "Self Assessments" },
        { name: "Contacts", label: "Assessment Contacts" },
        { name: "Questions", label: "Questionnaire Questions" },
        { name: "Templates", label: "Questionnaire Templates" },
        { name: "Questionnaires", label: "Questionnaire" },
        { name: "Results", label: "Questionnaire Results" },
        { name: "RiskAnalysis", label: "Risk Analysis" },
        { name: "ImportExport", label: "Import/Export" },
        { name: "AuditTrail", label: "Questionnaire Audit Trail" },
      ],
      activeTab: "Self",
    };
  },
  methods: {
    getTabComponent(tabName) {
      switch (tabName) {
        case "Self":
          return Self;
        case "Contacts":
          return Contacts;
        case "Questions":
          return Questions;
        case "Templates":
          return Templates;
        case "Questionnaires":
          return Questionnaires;
        case "Results":
          return QuestionnairesResult;
        case "RiskAnalysis":
          return RiskAnalysis;
        case "ImportExport":
          return ImportExport;
        case "AuditTrail":
          return AuditTrail;
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
