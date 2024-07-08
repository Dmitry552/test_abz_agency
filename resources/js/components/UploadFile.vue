<script setup lang="ts">
import {ref} from "vue";

type TProps = {
    error?: string
}

type TEmits = {
    (e: 'addedFile', file: File): void
}

const emits = defineEmits<TEmits>();

const props = defineProps<TProps>();

const showDropZone = ref(true);

function handleDragStart() {
    showDropZone.value = false
}

function handleDarkLeave() {
    showDropZone.value = true
}

function handleAddFile(event) {
    const file = event.dataTransfer.files[0];
    showDropZone.value = true

    if (file) {
        emits('addedFile', file)
    }
}

function handleFileChange(event) {
    const file = event.target.files[0];
    emits('addedFile', file)

}
</script>

<template>
    <div
        class="mb-5"
    >
        <label for="photo" class="mb-3 block text-base font-medium text-[#07074D]">
            Photo
        </label>
        <div
            class="flex items-center justify-center w-full"
            @dragstart.prevent="handleDragStart"
            @dragleave.prevent="handleDarkLeave"
            @dragover.prevent="handleDragStart"
            @drop.prevent="handleAddFile"
        >
            <label
                v-if="showDropZone"
                for="photo"
                class="flex flex-col items-center justify-center w-full h-48 border-2 border-gray-300 border-dashed
                    rounded-lg cursor-pointer bg-gray-50"
                :class="[props.error ? 'border-red-600' : 'border-gray-300']"
            >
                <div
                    class="flex flex-col items-center justify-center pt-5 pb-6"
                >
                    <svg
                        class="w-10 h-10 mb-3 text-gray-400"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"
                        >
                        </path>
                    </svg>
                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">
                        <span class="font-semibold">Click to upload</span>
                        or drag and drop
                    </p>
                    <p class="text-xs text-gray-500 ">only one file</p>
                    <p class="text-xs text-gray-500 ">JPEG or JPG</p>
                </div>
                <input id="photo" type="file" class="hidden" @change.prevent="handleFileChange"/>
            </label>
            <div
                v-else
                class="w-full h-48 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 z-10"
            ></div>
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
