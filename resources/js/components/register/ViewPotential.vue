<template>
  <div class="card row mt-2">
    <div class="card-header">
      <h3 class="card-title">
        Viewing: <b>{{ this.form.Name }}</b>
      </h3>
      <div class="card-tools">
        <button
          class="btn btn-info btn-sm"
          v-show="this.form.Status == 0"
          @click="approveModal"
        >
          Click to Approve
        </button>
        <button class="btn btn-success btn-sm" v-show="this.form.Status == 1">
          {{ this.form.RiskStatus }}
        </button>
      </div>
    </div>

    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
      <div>
        <form @submit.prevent="updateRisk()">
          <div class="modal-body">
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for>Risk Submitter</label>
                <input
                  v-model="form.Name"
                  type="text"
                  placeholder="Name"
                  readonly
                  name="Name"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('Name') }"
                />
              </div>
              <div class="form-group col-md-4">
                <label for>Business Unit</label>
                <input
                  v-model="form.Name"
                  type="text"
                  placeholder="Name"
                  readonly
                  name="Name"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('Name') }"
                />
              </div>
              <div class="form-group col-md-4">
                <label for>Created On</label>
                <input
                  v-model="form.created_at"
                  type="text"
                  placeholder="Name"
                  readonly
                  name="Name"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('Name') }"
                />
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for>Date Identified</label>
                <datepicker
                  :bootstrap-styling="true"
                  v-model="form.DateIdentified"
                  :disabledDates="state.disabledDates"
                  :class="{ 'is-invalid': form.errors.has('DateIdentified') }"
                  name="fromWhen"
                >
                  <div
                    slot="beforeCalendarHeader"
                    class="calender-header"
                    style="text-align: center; color: red"
                  ></div>
                </datepicker>
              </div>

              <div class="form-group col-md-8">
                <label for>Potential Risk</label>
                <input
                  v-model="form.Name"
                  type="text"
                  placeholder="Name"
                  name="Name"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('Name') }"
                />
              </div>
            </div>
            <div class="form-row">
              <nav class="nav nav-tabs">
                <a href="#" class="nav-item nav-link" @click.prevent="showRiskCauses"
                  >Risk Causes</a
                >
                <a href="#" class="nav-item nav-link" @click.prevent="showRiskEffects"
                  >Risk Impacts</a
                >
                <a
                  href="#"
                  class="nav-item nav-link"
                  @click.prevent="showRiskCollectiveActions"
                  >Corrective Action(s)</a
                >
              </nav>
            </div>
            <div class="form-row" v-if="showcauses">
              <table
                class="table table-bordered table-hover table-sm col-md-6 mt-2"
              >
                <thead class="thead-light">
                  <tr>
                    <th>Risk Causes</th>
                    <th>Name</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="mode in riskcauses" :key="mode.id">
                    <td>
                      <input
                        type="checkbox"
                        :value="mode.id"
                        @change="CountChecked(mode)"
                        v-model="mode.isSelected"
                      />
                    </td>
                    <td>{{ mode.Name }}</td>
                  </tr>
                </tbody>
              </table>

              <div class="form-group col-md-6">
                <label for>Risk Causes Description</label>
                <textarea
                  rows="2"
                  v-model="form.RiskCauseDescription"
                  placeholder="Risk Causes Description"
                  class="form-control"
                  :class="{
                    'is-invalid': form.errors.has('RiskCauseDescription'),
                  }"
                ></textarea>
                <has-error
                  :form="form"
                  field="RiskCauseDescription"
                ></has-error>
              </div>
            </div>
            <div class="form-row" v-if="showeffects">
              <table
                class="table table-bordered table-hover table-sm col-md-6 mt-2"
              >
                <thead class="thead-light">
                  <tr>
                    <th>Risk Impacts</th>
                    <th>Name</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="mode in riskeffects" :key="mode.id">
                    <td>
                      <input
                        type="checkbox"
                        :value="mode.id"
                        @change="CountChecked(mode)"
                        v-model="mode.isSelected"
                      />
                    </td>
                    <td>{{ mode.Name }}</td>
                  </tr>
                </tbody>
              </table>

              <div class="form-group col-md-6">
                <label for>Risk Effects Description</label>
                <textarea
                  rows="2"
                  v-model="form.RiskEffectsDescription"
                  placeholder="Description"
                  class="form-control"
                  :class="{
                    'is-invalid': form.errors.has('RiskEffectsDescription'),
                  }"
                ></textarea>
                <has-error
                  :form="form"
                  field="RiskEffectsDescription"
                ></has-error>
              </div>
            </div>
            <div class="form-row" v-if="showactions">

              <table
                class="table table-bordered table-hover table-sm col-md-6 mt-2"
              >
                <thead class="thead-light">
                  <tr>
                    <th>Corrective Actions</th>
                    <th>Name</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="mode in controlitems" :key="mode.id">
                    <td>
                      <input
                        type="checkbox"
                        :value="mode.id"
                        @change="CountChecked(mode)"
                        v-model="mode.isSelected"
                      />
                    </td>
                    <td>{{ mode.Name }}</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>

          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>
<script>
import Datepicker from "vuejs-datepicker";
import moment from "moment";
export default {
  data() {
    return {
      reports: {},
      riskcauses: {},
      showcauses: false,
      showactions: false,
      showeffects: false,
      alldata: {},
      effectsl: {},
      riskcauses: {},
      riskeffects: {},
      controlitems: {},
      risk: {},
      form: new Form({
        id: "",
        Name: "",
        ObjType: 12,
        DateIdentified: "",
        RiskCauseDescription: "",
        RiskEffectsDescription: "",
        RiskStatus: "",
        created_at: "",
        Status: "",
        isSelected: "",
        selectedCauses: [],
        selectedImpacts: [],
        selectedActions: [],
      }),
      state: {
        disabledDates: {
          from: new Date(),
        },
      },
    };
  },
  components: {
    Datepicker,
  },
  methods: {
    CountChecked(mode) {
      var isSelected = mode.isSelected;
      axios
        .get("api/syncRelationship", {
          params: {
            RiskID: localStorage.risk_id,
            ItemID: mode.id,
            isSelected: isSelected,
            ObjType: mode.ObjType,
          },
        })
        .then((res) => {
          if (res.data.ResultCode == 1200) {
            // this.riskcauses = res.data.ResponseData.causes;
            // this.riskeffects = res.data.ResponseData.effects;
            // this.controlitems = res.data.ResponseData.controlitems;
          } else {
            console.log(res.data.ResultDesc);
            toast.fire({
              type: "error",
              title: res.data.ResultDesc,
            });
          }
        })
        .catch((e) => {
          this.$Progress.fail();
          toast.fire({
            type: "error",
            title: "Operation not successfull" + "\n" + e.response.data.message,
          });
        });
    },
    loadCausesEffects() {
      axios
        .get("api/getCausesEffects", {
          params: {
            RiskID: localStorage.risk_id,
          },
        })
        .then((res) => {
          if (res.data.ResultCode == 1200) {
            this.riskcauses = res.data.ResponseData.causes;
            this.riskeffects = res.data.ResponseData.effects;
            this.controlitems = res.data.ResponseData.controlitems;
          } else {
            console.log(res.data.ResultDesc);
            toast.fire({
              type: "error",
              title: res.data.ResultDesc,
            });
          }
        })
        .catch((e) => {
          this.$Progress.fail();
          toast.fire({
            type: "error",
            title: "Operation not successfull" + "\n" + e.response.data.message,
          });
        });
    },
    updateRisk() {
      this.$Progress.start();
      this.form
        .put("api/risks/" + localStorage.risk_id)
        .then(() => {
          $("#addNew").modal("hide");
          swal.fire("Updated!", "Information has been updated.", "success");
          this.$Progress.finish();
          Fire.$emit("AfterCreate");
        })
        .catch(() => {
          this.$Progress.fail();
        });
    },
    showRiskCauses() {
      this.showcauses = true;
      this.showactions = false;
      this.showeffects = false;
    },
    showRiskEffects() {
      this.showcauses = false;
      this.showactions = false;
      this.showeffects = true;
    },
    showRiskCollectiveActions() {
      this.showcauses = false;
      this.showactions = true;
      this.showeffects = false;
    },

    loadRisk() {
      axios
        .get("/api/risks/" + localStorage.risk_id)
        .then(({ data }) => this.form.fill(data.ResponseData));
    },
    approveModal() {
      swal
        .fire({
          title: "Are you sure?",
          text: "You won't be able to revert this!",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Yes, Approve it!",
        })
        .then((result) => {
          // Send request to the server
          if (result.value) {
            axios
              .post("api/approve-risk/" + localStorage.risk_id)
              .then(() => {
                swal.fire(
                  "Approved!",
                  "The Risk has been Approved.",
                  "success"
                );
                Fire.$emit("AfterCreate");
              })
              .catch(() => {
                swal.fire("Failed!", "Something when wrong", "warning");
              });
          }
        });
    },
  },
  created() {
    this.showcauses = true;
    this.loadCausesEffects();
    this.loadRisk();
    Fire.$on("AfterCreate", () => {
      this.loadRisk();
    });
  },
};
</script>
