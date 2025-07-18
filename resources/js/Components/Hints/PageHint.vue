<script setup>
import DatabaseIcon from "@/Components/Icons/DatabaseIcon.vue";

defineProps({
  title: {
    type: String,
    default: 'Writes upside-down',
  },
  description: {
    type: String,
    default: '',
  },
  total: {
    type: Number,
    default: 0,
  },
  class: {
    type: String,
    default: 'w-full',
  },
})
</script>

<template>
  <div :class class="bg-gray-800 rounded-lg px-6 py-8 ring shadow-xl ring-gray-900/5 mb-6">
    <div class="flex gap-x-10">
      <div>
        <span class="inline-flex  rounded-md bg-indigo-500 p-2 shadow-lg">
          <slot/>
        </span>
        <h3 class="text-gray-900 dark:text-white mt-5 text-base font-medium tracking-tight ">{{ title }}</h3>
      </div>
      <div>
        <span class="inline-flex rounded-md bg-indigo-500 p-2 shadow-lg">
             <DatabaseIcon/>
        </span>
        <h3 class="text-gray-900 dark:text-white mt-5 text-base font-medium tracking-tight ">Total: {{ total }}</h3>
      </div>
    </div>
    <p class="text-gray-500 dark:text-gray-400 mt-2 text-sm">
      {{ description }}
    </p>
  </div>
</template>