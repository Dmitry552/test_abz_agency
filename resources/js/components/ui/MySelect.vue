<script setup lang="ts">
import type {Position} from "@/types";

type TProps = {
    positions: Position[],
    error?: string[]
}

const props = defineProps<TProps>();
const model = defineModel();
</script>

<template>
<div class="mb-5">
    <label for="position" class="mb-3 block text-base font-medium text-[#07074D]">
        Position
    </label>
    <select
        v-model="model"
        id="position"
        class="w-full rounded-md border bg-white py-3 px-6 text-base font-medium
                        text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
        :class="[props.error ? 'border-red-600' : 'border-[#e0e0e0]']"
    >
        <option
            v-for="position in positions"
            :value="position.id"
            :key="position.id"
        >
            {{position.name}}
        </option>
    </select>
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
