<script setup lang="ts">
type TProps = {
    showDropZone: boolean,
    image: string | undefined
    error?: string
}

type TEmits = {
    (e: 'deleteImage'): void
}
const props = defineProps<TProps>();
const emits = defineEmits<TEmits>();

function handleDeleteImage() {
    emits('deleteImage');
}
</script>

<template>
<div>
    <div
        class="relative flex justify-center h-48"
        v-show="!showDropZone"
    >
        <img
            class="h-full border-2 rounded-lg cursor-pointer bg-gray-50"
            :class="[props.error ? 'border-red-600' : 'border-gray-300']"
            alt="photo"
            :src="image!"
        />
        <div
            @click="handleDeleteImage"
            class="absolute right-32 cursor-pointer"
        >
            <svg
                class="h-10 w-10 border-gray-600"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                stroke-width="2"
                stroke="currentColor"
                fill="none"
                stroke-linecap="round"
                stroke-linejoin="round"
            >
                <path stroke="none" d="M0 0h24v24H0z"/>
                <line x1="18" y1="6" x2="6" y2="18" />
                <line x1="6" y1="6" x2="18" y2="18" />
            </svg>
        </div>
    </div>
    <span
        class="block w-full text-center text-red-600 text-sm"
        v-if="props.error"
    >
        {{props.error}}
    </span>
</div>
</template>

<style scoped>

</style>
