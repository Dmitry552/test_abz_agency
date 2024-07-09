<script setup lang="ts">
import {useRoute} from "vue-router";
import {ref, watch} from "vue";

const pageName = ref<string | null>(null);

const route = useRoute();
watch(route, () => {
    pageName.value = route.name as string;
})

</script>

<template>
    <header class="bg-white absolute w-full px-2 h-14 items-center">
        <nav class="mx-auto flex max-w-full items-center justify-center h-full">
            <div class="max-w-screen-xl flex items-center justify-between mx-auto">
                <div
                    class="flex items-center justify-between w-auto"
                    id="navbar-search"
                >
                    <ul class="flex font-medium rounded-lg space-x-8 bg-white">
                        <li v-if="pageName !== 'home'">
                            <RouterLink
                                class="block bg-blue-700 rounded bg-transparent text-blue-700"
                                to="/"
                            >
                                Home
                            </RouterLink>
                        </li>
                        <li v-if="pageName !== 'createUser'">
                            <RouterLink
                                class="block bg-blue-700 rounded bg-transparent text-blue-700"
                                to="/user/create"
                            >
                                createUser
                            </RouterLink>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
</template>

<style scoped>

</style>
