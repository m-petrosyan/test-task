<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

defineProps({
  activityType: {
    type: Array,
    required: true
  }
});
</script>

<template>
  <AuthenticatedLayout title="User List">
    <div class="mx-auto text-white bg-gray-800 rounded-lg px-6 py-8 shadow-xl ">
      <p>id: {{ activityType.id }}</p>
      <p>name: {{ activityType.name }}</p>
      <p>sort order: {{ activityType.sort_order }}</p>
    </div>
  </AuthenticatedLayout>
</template>