<script setup lang="ts">
import { useDropzone } from "vue3-dropzone";

type TProps = {
    error?: string
}

type TEmits = {
    (e: 'addedFile', file: File): void
}

const emits = defineEmits<TEmits>();

const props = defineProps<TProps>();


function onDrop(acceptFiles: any) {
    if (acceptFiles[0]) {
        emits('addedFile', acceptFiles[0])
    }
}

const { getRootProps, getInputProps, isDragActive } = useDropzone({ onDrop });
</script>

<template>
    <div
        class="mb-5"
    >
        <div class="mb-3 block text-base font-medium text-[#07074D]">
            Photo
        </div>
        <div
            v-bind="getRootProps()"
            class="flex flex-col items-center justify-center w-full h-48 border-2 border-gray-300 border-dashed
                    rounded-lg cursor-pointer bg-gray-50">
            <div>
                <div
                    v-if="!isDragActive"
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
                <div
                    v-else
                    class="flex flex-col items-center justify-center pt-5 pb-6"
                >
                    <p>Drop the files here ...</p>
                </div>
                <input v-bind="getInputProps()" />
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
