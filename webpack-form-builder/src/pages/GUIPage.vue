<template>
    <div class="mt-3">
        <h3>Form GUI (Using state)</h3>

        <div class="col-md-4 form-group">
            <label>Select a Template to Render & Use</label>
            <select class="form-control" v-model="selectedFormID" @change="getForm">
                <option selected disabled value="">Select a template</option>
                <option v-for="form in forms" :value="form.id">{{form.text}}</option>
            </select>
        </div>

        <div v-if="formData != null">
            <form-builder type="gui" :form="formData" v-model="formValues" ref="FormGUI"></form-builder>

            <div class="col-md-12 text-right mt-2 mb-2">
                <button class="btn btn-primary" @click="runValidation">Test Form Validation</button>
            </div>

            <div class="col-md-4">
                <h5>Form Values Data</h5>

                <pre><code>{{formValues}}</code></pre>
            </div>
        </div>
    </div>
</template>

<script>
    import {get_all_form, get_form} from "../config/api";
    import FormBuilder from 'v-form-builder';

    export default {
        name: "g-u-i-page",
        components: {FormBuilder},
        data: () => ({
            forms: [],
            formData: null,
            formValues: {},
            selectedFormID: "",
        }),
        methods: {
            getForm() {
                if (this.selectedFormID === "") {
                    return;
                }

                // clear old form
                this.formData = null;
                this.formValues = {};

                let self = this;
                get_form(this.selectedFormID)
                    .done(data => {
                        if (data.error) {
                            self.selectedFormID = "";
                            SethPhatToaster.error(data.error);
                            return;
                        }

                        self.formData = JSON.parse(data.Data);
                    });
            },
            runValidation() {
                var result = this.$refs.FormGUI.validate();

                if (result === true) {
                    SethPhatToaster.success("Form is valid!");
                }
            }
        },
        created() {
            get_all_form()
                .done(resp => {
                    this.forms = resp;
                })
        },
        beforeDestroy() {
            this.formData = null;
        }
    }
</script>

<style scoped>
    pre {
        background: black;
        border-radius: 10px;
        padding: 20px;
    }
    code {
        color:white;
    }
</style>
