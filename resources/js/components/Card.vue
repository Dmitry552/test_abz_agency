<script setup lang="ts">
import type {User} from "@/types";

type TProps = {
    user: User
}

type TEmits = {
    (e: 'selectedUser', value: number): void
}

const props = defineProps<TProps>();
const emits = defineEmits<TEmits>();

function handleSelectUser() {
    emits('selectedUser', props.user.id)
}
</script>

<template>
    <div
        @click="handleSelectUser"
        class="flex w-full items-center bg-white border border-gray-200 rounded-lg shadow cursor-pointer"
    >
        <div class="p-2">
            <p>{{props.user.id}}</p>
        </div>
        <img
            class="object-cover h-full"
            :src="props.user.photo"
            alt=""
        >
        <div class="w-full flex flex-col justify-between p-2 leading-normal">
            <h2 class="text-lg font-bold tracking-tight text-gray-900 ">
                {{props.user.name}}
            </h2>
            <div class="w-full flex justify-between">
                <div>
                    <p class="font-normal text-gray-700">
                        {{props.user.email}}
                    </p>
                </div>
                <div>
                    <p class="ml-4 font-normal text-gray-700">
                        {{props.user.phone}}
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
