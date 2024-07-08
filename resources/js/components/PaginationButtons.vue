<script setup lang="ts">

type TButtonsProps = {
    disabledPrevious: boolean,
    disabledMore: boolean,
    disabledNext: boolean
}

type TButtonsEmits = {
    (e: 'previous'): void
    (e: 'more'): void
    (e: 'next'): void
}

const props = withDefaults(defineProps<TButtonsProps>(), {
    disabledPrevious: false,
    disabledMore: false,
    disabledNext: false
})

const emits = defineEmits<TButtonsEmits>();
</script>

<template>
    <div class="mt-2 w-full flex justify-between">
        <button
            :disabled="props.disabledPrevious"
            @click="() => emits('previous')"
            type="button"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium
                rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 focus:outline-none w-24 disabled:bg-gray-400"
        >
            Previous
        </button>
        <button
            :disabled="props.disabledMore"
            @click="() => emits('more')"
            type="button"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium
                rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 focus:outline-none max-w-48 disabled:bg-gray-400"
        >
            Show more
        </button>
        <button
            :disabled="props.disabledNext"
            @click="() => emits('next')"
            type="button"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium
                rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 focus:outline-none w-24 disabled:bg-gray-400"
        >
            Next
        </button>
    </div>
</template>

<style scoped>

</style>
