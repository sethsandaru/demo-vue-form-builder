<template>
    <div class="mt-3">
        <div class="row" style="margin: 0px 20px;">
            <div class="col-md-4">
                <div class="form-group">
                    <label>Form Config Title</label>
                    <input type="text" class="form-control" v-model="name">
                </div>
            </div>
        </div>

        <hr>

        <form-builder type="template" v-model="formData"></form-builder>

        <div class="text-right mt-3" style="margin: 0px 20px;">
            <button class="btn btn-default" @click="resetForm">Reset</button>
            <button class="btn btn-primary" @click="saveForm">Save</button>
        </div>
    </div>
</template>

<script>
    import {get_form, update_form, save_form} from "../config/api";
    import FormBuilder from 'v-form-builder';

    export default {
        name: "template-config-page",
        components: {FormBuilder},
        data: () => ({
            name: "",
            formData: null,
            id: "",
        }),
        methods: {
            resetForm() {
                this.formData.type = "";
                this.formData.sections = [];
            },
            loadOldForm() {
                let self = this;
                get_form(this.id)
                    .done(data => {
                        if (data.error) {
                            SethPhatToaster.error(data.error);
                            self.$router.push("/template");
                            return;
                        }

                        // set data
                        self.name = data.Title;
                        self.formData = JSON.parse(data.Data);
                    });
            },
            saveForm() {
                if (this.name === "") {
                    SethPhatToaster.error("Please input your form config title");
                    return;
                }

                // ajax request
                var promise = null;
                if (this.id !== "") {
                    promise = update_form(this.id, this.name, this.formData);
                } else {
                    promise = save_form(this.name, this.formData);
                }

                let self = this;
                promise.done(data => {
                    if (data.error) {
                        SethPhatToaster.error(data.error);
                    } else {
                        SethPhatToaster.success(data.success);
                        self.$router.push("/template");
                    }
                });
            }
        },
        created() {
            if (this.$route.params.id) {
                this.id = this.$route.params.id;

                // load form here
                this.loadOldForm();
            }
        },
        beforeDestroy() {
            this.formData = null;
        }
    }
</script>

<style scoped>

</style>
