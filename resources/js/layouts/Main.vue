<script setup lang="ts">
import Header from "@/components/Header.vue";
</script>

<template>
    <div class="w-full h-screen">
        <Header/>
        <main class="bg-white h-full px-2 flex overflow-hidden
          justify-center items-center"
        >
            <slot/>
        </main>
    </div>
</template>

<style scoped>
</style>
