<script setup lang="ts">
import { RouterView } from 'vue-router';
import Main from '../layouts/Main.vue';
</script>

<template>
    <component :is="Main">
        <Suspense>
            <template #fallback>
                ...Loading
            </template>
            <RouterView/>
        </Suspense>
    </component>
</template>

<style scoped>

</style>
