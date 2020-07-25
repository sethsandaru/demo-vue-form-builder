<template>
    <div class="mt-3 mb-4">
        <div class="text-right mt-3" style="margin: 0 20px;">
            <button class="btn btn-default" @click="revertForm">Revert</button>
            <button class="btn btn-primary" @click="saveForm">Save Form Configuration</button>
        </div>

        <div class="form-group pl-3 pr-3">
            <label>Form Title</label>
            <input type="text" class="form-control" v-model="formTitle">
        </div>

        <div class="form-group pl-3 pr-3">
            <label>Mapping URL</label>
            <input type="text" class="form-control" v-model="mappedPath">
        </div>

        <FormBuilder
            v-model="formData">
        </FormBuilder>

        <div class="text-right mt-3" style="margin: 0 20px;">
            <button class="btn btn-default" @click="revertForm">Revert</button>
            <button class="btn btn-primary" @click="saveForm">Save Form Configuration</button>
        </div>
    </div>
</template>

<script>
    export default {
        name: "FormConfiguration",
        props: ['formId'],
        data: () => ({
            formData: null,
            baseFormData: null,
            mappedPath: null,
            formTitle: null,
        }),
        methods: {
            revertForm() {
                this.formData = JSON.parse(JSON.stringify(this.baseFormData))
            },
            loadOldForm() {
                if (this.formId == 0) {
                    return
                }

                $.getJSON(API_PATH + "/GetFormData/" + this.formId)
                    .done(data => {
                        // set data
                        this.mappedPath = data.Path;
                        this.formTitle = data.Title;
                        this.formData = JSON.parse(data.Data)
                        this.baseFormData = JSON.parse(data.Data)
                    });
            },
            saveForm() {
                if (!this.mappedPath || !this.mappedPath) {
                    alert("Form Title and Route Mapped Path must be declared")
                    return
                }

                // ajax request to store the form
                $.post(
                    API_PATH + "/UpdateForm/" + this.formId,
                    {
                        title: this.formTitle,
                        mappedPath: this.mappedPath,
                        formData: JSON.stringify(this.formData)
                    }
                ).fail(err => {
                    alert("Failed to store the Form. Please try again.")
                }).done(data => {
                    if (data.error) {
                        alert(data.error)
                        return
                    }

                    alert("Successfully saved the form!");
                    window.location.href = data.next || "";
                });
            }
        },
        created() {
            this.loadOldForm()
        }
    }
</script>

<style scoped>

</style>
