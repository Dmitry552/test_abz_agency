<script setup lang="ts">
import Header from "@/components/Header.vue";
</script>

<template>
    <div class="w-full pb-4">
        <Header/>
        <main class="bg-white h-full px-2 flex justify-center items-start">
            <slot/>
        </main>
    </div>
</template>

<style scoped>
</style>
