<script setup>
import {Head, Link} from "@inertiajs/vue3";

defineProps({
  title: {
    type: String,
    default: ''
  }
});
</script>

<template>
  <Head :title/>
  <div class="flex min-h-screen flex-col sm:pt-0">
    <div class="flex justify-center gap-x-16  mt-4 font-bold">
      <Link class="text-white" :href="route('db')">
        Index
      </Link>
      <button
          class="text-red-500"
          :href="route('logout')"
          @click.prevent="() => $inertia.post(route('logout'))">
        Log Out
      </button>
    </div>
    <div class="mx-auto mt-6 overflow-hidden px-6 py-4 shadow-md lg:w-10/12 sm:w-md sm:rounded-lg">
      <slot/>
    </div>
  </div>
</template>
