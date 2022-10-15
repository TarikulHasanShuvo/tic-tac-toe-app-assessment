<template>
    <div class="container">
        <NavBar/>
        <router-view></router-view>
    </div>
</template>

<script>
import NavBar from "@/layout/NavBar.vue";

export default {
    name: "App",
    components: {NavBar},
}
</script>

<style scoped>

</style>
