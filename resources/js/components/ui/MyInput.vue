<script setup lang="ts">
type TProps = {
    title: string,
    type?: string,
    name: string,
    placeholder: string,
    error?: string[]
}

const modal = defineModel<string>();

const props = withDefaults(defineProps<TProps>(), {
    type: 'text',
});
</script>

<template>
    <div class="mb-5">
        <label :for="props.name" class="mb-3 block text-base font-medium text-[#07074D]">
            {{props.title}}
        </label>
        <input
            v-model="modal"
            :type="props.type"
            :name="props.name"
            :id="props.name"
            :placeholder="props.placeholder"
            class="w-full rounded-md border bg-white py-3 px-6 text-base font-medium
                text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
            :class="[props.error ? 'border-red-600' : 'border-[#e0e0e0]']"
        />
        <span
            class="block w-full text-center text-red-600 text-sm"
            v-if="props.error"
        >
            {{props.error[0]}}
        </span>
    </div>
</template>

<style scoped>

</style>
