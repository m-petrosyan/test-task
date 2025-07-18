<script setup>
import {Head, Link} from "@inertiajs/vue3";
import ResponsiveNavLink from "@/Components/ResponsiveNavLink.vue";

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
    <div class="flex justify-between px-2">
      <Link class="text-center block text-red-500 mt-4" :href="route('db')">
        Index
      </Link>
      <ResponsiveNavLink
          class="w-1/12"
          :href="route('logout')"
          method="post"
          as="button">
        Log Out
      </ResponsiveNavLink>
    </div>
    <div class="mx-auto mt-6 overflow-hidden px-6 py-4 shadow-md lg:w-10/12 sm:w-md sm:rounded-lg">
      <slot/>
    </div>
  </div>
</template>
