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
    <header class="bg-white absolute w-full px-2">
        <nav class="mx-auto flex max-w-full items-center justify-between p-2">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                <div
                    class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1"
                    id="navbar-search"
                >
                    <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg
                            bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white
                            dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700"
                    >
                        <li v-if="pageName !== 'home'">
                            <RouterLink
                                class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent
                                        md:text-blue-700 md:p-0 md:dark:text-blue-500"
                                to="/"
                            >
                                Home
                            </RouterLink>
                        </li>
                        <li v-if="pageName !== 'createUser'">
                            <RouterLink
                                class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent
                                        md:text-blue-700 md:p-0 md:dark:text-blue-500"
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
