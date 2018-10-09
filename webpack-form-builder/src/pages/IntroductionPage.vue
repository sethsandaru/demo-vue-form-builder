<template>
    <div class="mt-3">
        <h3 class="text-center">Welcome to Vue Form Builder Demo - Seth Sandaru</h3>

        <div class="text-center">
            <p>Please choose a place that you want to test/check it out</p>

            <p>
                <router-link class="btn btn-success" to="/template">Template (Config)</router-link>
                <router-link class="btn btn-danger" to="/gui">GUI (In-use)</router-link>
            </p>
        </div>
    </div>
</template>

<script>
    export default {
        name: "IntroductionPage"
    }
</script>

<style scoped>

</style>