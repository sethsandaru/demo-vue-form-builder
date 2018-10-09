<template>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <router-link class="navbar-brand" to="/">{{app_name}}</router-link>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item" v-for="link in nav_links" :class="{'active': isCurrent(link.to)}">
                        <router-link class="nav-link" :to="link.to">{{link.label}}</router-link>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="col-md-12">
            <router-view :key="$route.fullPath"></router-view>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'app',
        data() {
            return {
                app_name: "Demo Vue Form Builder - Seth Sandaru",
                nav_links: [
                    {to: "/", label: "Index"},
                    {to: "/template", label: "Template"},
                    {to: "/gui", label: "GUI"}
                ],
            }
        },
        methods: {
            isCurrent(nowPath) {
                var current_path = location.href.split("#")[1];
                return current_path === nowPath;
            }
        }
    }
</script>

<style>

</style>
