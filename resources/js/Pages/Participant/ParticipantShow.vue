<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {Link} from "@inertiajs/vue3";
import GoogleMap from "@/Components/Map/GoogleMap.vue";

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
      <p>location: latitude:{{ participant.location[0].latitude }},
        longitude:{{ participant.location[0].longitude }}</p>

      <GoogleMap
          :latitude="participant.location[0].latitude"
          :longitude="participant.location[0].longitude"
          class="mt-4"
      />

      <img v-if="participant.logo" :src="participant.logo" alt="Logo"
           class="max-w-full mt-6 max-h-64"/>
    </div>
    <div class="mt-5 w-4/6 mx-auto" v-if="participant.activities.length">
      <h1 class="text-white text-center">Activities</h1>
      <div v-for="activity in participant.activities" :key="activity.id"
           class="mb-4 mx-auto text-white bg-gray-800 rounded-lg px-6 py-8 shadow-xl ">
        <p>title: {{ activity.title }}</p>
        <p>short description: {{ activity.short_description }}</p>
        <Link class="text-center block text-red-500 mt-4" :href="route('activity.show', { activity: activity.id })">
          More details
        </Link>
      </div>
    </div>
  </AuthenticatedLayout>
</template>