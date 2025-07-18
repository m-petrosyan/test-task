<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

defineProps({
  user: {
    type: Array,
    required: true
  }
});
</script>

<template>
  <AuthenticatedLayout title="User List">
    <div class="w-1/3 mx-auto text-white bg-gray-800 rounded-lg px-6 py-8 shadow-xl ">
      <p>id: {{ user.id }}</p>
      <p>name: {{ user.name }}</p>
      <p>email: {{ user.email }}</p>
      <p>role: {{ user.role }}</p>
    </div>
  </AuthenticatedLayout>
</template>