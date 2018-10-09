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
            <button class="btn btn-primary">Save</button>
        </div>
    </div>
</template>

<script>
    import FormBuilder from 'v-form-builder';

    export default {
        name: "template-config-page",
        components: {FormBuilder},
        data: () => ({
            name: "",
            formData: {},
        }),
        methods: {
            resetForm() {
                this.formData.type = "";
                this.formData.sections = [];
            }
        }
    }
</script>

<style scoped>

</style>
