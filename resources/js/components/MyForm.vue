<template>
    <div class="container">
        <FormRenderer
            v-if="formData"
            :form-configuration="formData"
            v-model="formValues">
        </FormRenderer>
    </div>
</template>

<script>
    export default {
        name: "MyForm",

        data: () => ({
            formData: null,
            formValues: null
        }),

        methods: {
            getForm() {
                axios.get(API_PATH +'/GetFormByPath', {
                    params: {
                        path: window.location.pathname
                    }
                })
                .then(data => data.data)
                .then(this.setData);
            },

            setData(formData) {
                if (formData.error) {
                    alert("Form Not Found");
                    return
                }

                // set form configuration
                this.$set(this, 'formData', JSON.parse(formData.Data));
            }
        },

        created() {
            this.getForm()
        }
    }
</script>

<style scoped>

</style>
