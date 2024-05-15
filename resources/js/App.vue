<script setup>
</script>

<template>
    <v-layout class="rounded rounded-md">
        <v-app-bar title="BMK Solutions"></v-app-bar>

        <v-navigation-drawer>
            <v-list>
                <v-list-item>
                    <RouterLink to="/">films</RouterLink>
                </v-list-item>
                <v-list-item>
                    <RouterLink to="/people">people</RouterLink>
                </v-list-item>
            </v-list>
        </v-navigation-drawer>

        <v-main class="d-flex align-center justify-center" style="min-height: 300px; width: 100%">
            <RouterView />
        </v-main>
    </v-layout>
</template>

<style scoped>

</style>