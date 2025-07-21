<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {Link} from "@inertiajs/vue3";
import GoogleMap from "@/Components/Map/GoogleMap.vue";

defineProps({
  activity: {
    type: Array,
    required: true
  }
});
</script>

<template>
  <AuthenticatedLayout title="User List">
    <div class="mx-auto text-white bg-gray-800 rounded-lg px-6 py-8 shadow-xl ">
      <p>id: {{ activity.id }}</p>
      <p>type: {{ activity.activity_type?.name }}</p>
      <p>title: {{ activity.title }}</p>
      <p>description: {{ activity.description }}</p>
      <p>short description: {{ activity.short_description }}</p>
      <p>activity dates: start: {{ activity.activity_dates[0].start }}, end: {{ activity.activity_dates[0].end }}</p>
      <div class="flex gap-x-2">
        <p>link :</p> <a class="text-red" :href="activity.registration_link">{{ activity.registration_link }}</a>
      </div>
      <p>location: latitude:{{ activity.location[0].latitude }},
        longitude:{{ activity.location[0].longitude }}</p>
      <div v-if="activity.files && activity.files.length" class="mt-4">
        <div v-for="media in activity.files" :key="media.id" class="mb-4">
          <img v-if="media.mime_type.startsWith('image/')" :src="media.original_url" alt="Media"
               class="max-w-full h-auto"/>
          <video v-else-if="media.mime_type.startsWith('video/')" controls class="max-w-full h-auto max-h-96">
            <source :src="media.original_url" :type="media.mime_type">
          </video>
        </div>
      </div>

      <GoogleMap
          :latitude="activity.location[0].latitude"
          :longitude="activity.location[0].longitude"
          class="mt-4"
      />
    </div>


    <div class="mt-5 w-4/6 mx-auto" v-if="activity.participant.length">
      <h1 class="text-white text-center">Participant</h1>
      <div v-for="participant in activity.participant" :key="participant.id"
           class="mb-4 mx-auto text-white bg-gray-800 rounded-lg px-6 py-8 shadow-xl ">
        <p>id: {{ participant.id }}</p>
        <p>name: {{ participant.name }}</p>
        <Link class="text-center block text-red-500 mt-4"
              :href="route('participant.show', { participant: participant.id })">
          More details
        </Link>
      </div>
    </div>
  </AuthenticatedLayout>
</template>