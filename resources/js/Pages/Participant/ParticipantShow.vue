<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {Link} from "@inertiajs/vue3";

defineProps({
  participant: {
    type: Array,
    required: true
  }
});
</script>

<template>
  <AuthenticatedLayout title="User List">
    <div class="mx-auto text-white bg-gray-800 rounded-lg px-6 py-8 shadow-xl ">
      <p>id: {{ participant.id }}</p>
      <p>name: {{ participant.name }}</p>
      <div class="flex gap-x-2">
        <p>url:</p> <a class="text-red" :href="participant.url">{{ participant.url }}</a>
      </div>
      <p>location: {{ participant.location[0] }}</p>
    </div>
    <div class="mt-5 w-4/6 mx-auto" v-if="participant.activities.length">
      <h1 class="text-white text-center">Activities</h1>
      <div v-for="activity in participant.activities" :key="activity.id"
           class="mb-4 mx-auto text-white bg-gray-800 rounded-lg px-6 py-8 shadow-xl ">
        <p>title: {{ activity.title }}</p>
        <p>description: {{ activity.description }}</p>
        <p>short description: {{ activity.short_description }}</p>
        <Link class="text-center block text-red-500 mt-4" :href="route('activity.show', { activity: activity.id })">
          More details
        </Link>
      </div>
    </div>
  </AuthenticatedLayout>
</template>