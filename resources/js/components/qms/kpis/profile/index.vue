<template>
  <div>
    <div class="row mt-2">
      <div class="col-md-12">
        <ul class="nav">
          <li class="nav-item">
            <button
              class="btn btn-primary btn-sm"
              @click="showDetailsPage"
            >
              <i class="fa fa-calendar"></i>
              Details
            </button>
          </li>
          <li class="nav-item ml-1">
            <button
              class="btn btn-primary btn-sm"
              @click="showAttachments"
            >
              <i class="fa fa-calendar"></i>
              Assignment Attachments
            </button>
          </li>
          <li class="nav-item ml-1">
            <button
              class="btn btn-primary btn-sm"
              @click="showActionsItems"
            >
              <i class="fa fa-users"></i>
              Action Items
            </button>
          </li>
        </ul>
        <Details v-if="showmode === 'details'"></Details>
        <ActionIndex v-if="showmode === 'actionitems'"></ActionIndex>
      </div>
    </div>
  </div>
</template>

<script>
import Details from './Details.vue'
import ActionIndex from './Actionindex'
// import Pledges from './profile/Pledges.vue'
// import Children from './profile/Children.vue'
// import Departments from './profile/Departments.vue'
export default {
  data() {
    return {
      id: null,
      showincome: false,
      editmode: false,
      showmode: '',
      members: {
        details: {}
      },
      form: new Form({
        Name: '',
        description: '',
        Weight: '',
        Frequency: '',
        StartDate: '',
        ExpiredDate: '',
        DataType: '',
        LowerLimit: '',
        GreenAmber: '',
        AmberRed: '',
        UpperLimit: ''
      })
    }
  },
  components: {
    Details,
    ActionIndex
  },
  methods: {
    showDetailsPage() {
      this.showmode = 'details'
    },
    showAttachments() {
      this.showmode = 'attachments'
    },
    showActionsItems() {
      this.showmode = 'actionitems'
    }
  },
  created() {
    this.showDetailsPage()
    // this.loadMemberDetails()
    // Fire.$on('AfterCreate', () => {
    //   this.loadMemberDetails()
    // })
  }
}
</script>
