<script setup lang="ts">
import {useRoute, useRouter} from "vue-router";
import {computed} from "vue";
import {useStore} from "@/store";
import type {User} from "@/types";

const router = useRouter();
const route = useRoute();
const store = useStore();

const getUser = () => store.dispatch('getUser', route.params.id);
const user = computed<User>(() => store.getters.getUser);

try {
    await getUser();
} catch (err) {
    router.push({name: 'home'});
}

</script>

<template>
    <div class="max-w-4xl w-full flex items-center h-screen flex-wrap mx-auto my-0">
        <div id="profile"
             class="w-3/5 rounded-l-lg rounded-r-none shadow-2xl bg-white opacity-75 mx-0"
        >
            <div class="p-12 text-left flex flex-col">
                <h1 class="text-3xl font-bold pt-8 lg:pt-0">{{user.name}}</h1>
                <div class="mx-auto lg:mx-0 w-4/5 pt-3 border-b-2 border-green-500 opacity-25"></div>
                <div class="mt-4">
                    <div class="flex mb-2">
                        <h2>Phone:</h2>
                        <p class="ml-2">{{user.phone}}</p>
                    </div>
                    <div class="w-full flex mb-2">
                        <h2>Email:</h2>
                        <p class="w-full ml-2">{{user.email}}</p>
                    </div>
                    <div class="flex mb-2">
                        <h2>Position:</h2>
                        <p class="ml-2">{{user.position}}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-52 -ml-14 z-10">
            <img :src="user.photo" class="w-full rounded-lg shadow-2xl block" alt="photo">
        </div>
    </div>
</template>

<style scoped>

</style>
