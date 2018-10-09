<template>
    <div class="mt-3">
        <h3>All Configurated Form Templates</h3>

        <div class="col-md-12 text-right mb-3">
            <router-link to="/template/config/" class="btn btn-primary">Add New</router-link>
        </div>

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Form Title</th>
                    <th>Version</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="form in forms">
                    <td>{{form.text}}</td>
                    <td>{{form.version}}</td>
                    <td>
                        <router-link :to="'/template/config/' + form.id">Edit</router-link>
                    </td>
                </tr>
                <tr v-show="forms.length <= 0">
                    <td colspan="4">No result found!</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    import {get_all_form} from "../config/api";

    export default {
        name: "IndexTemplatePage",
        data: () => ({
            forms: [],
        }),
        created() {
            get_all_form()
                .done(resp => {
                    this.forms = resp;
                })
        }
    }
</script>

<style scoped>

</style>