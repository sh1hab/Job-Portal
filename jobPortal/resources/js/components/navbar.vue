<template>
        <nav class="navbar navbar-expand-sm navbar-dark bg-info mb-2">
            <div class="container">
                <router-link exact to="/" class="navbar-brand">jobPortal</router-link>
                <router-link exact to="/jobs" style="color:white !important">Jobs</router-link>
                <router-link exact to="/add-job" style="color:white !important">addJob</router-link>
            </div>
        </nav>
</template>

<script>
    export default {
        name: "navbar"
    }
</script>

<style scoped>

</style>
