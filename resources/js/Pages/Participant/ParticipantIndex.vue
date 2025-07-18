<script setup>
import PageHint from "@/Components/Hints/PageHint.vue";
import {Link} from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import ParticipantIcon from "@/Components/Icons/ParticipantIcon.vue";

defineProps({
  participants: {
    type: Array,
    required: true,
  },
  participantCount: {
    type: Number,
    required: true,
  },
})
</script>

<template>
  <AuthenticatedLayout title="Participant List">
    <PageHint
        title="Participant List"
        :total="participantCount">
      <ParticipantIcon/>
    </PageHint>
    <table class="min-w-full divide-y divide-gray-700 dark:divide-gray-600">
      <thead>
      <tr>
        <th class="px-3 py-3.5 text-left text-sm/6 font-semibold text-gray-100">Name</th>
        <th class="px-3 py-3.5 text-left text-sm/6 font-semibold text-gray-100">Location</th>
        <th class="px-3 py-3.5 text-left text-sm/6 font-semibold text-gray-100">Type</th>
      </tr>
      </thead>
      <tbody class="divide-y divide-gray-700 dark:divide-gray-600">
      <tr v-for="participant in participants" :key="participant.id">
        <td class="py-4 pl-4 pr-3 text-sm/6 text-gray-100 dark:text-gray-200 sm:pl-6">
          <div class="flex items-center gap-x-2">
            <Link :href="route('participant.show', { participant: participant.id })">
              {{ participant.name }}
            </Link>
          </div>
        </td>
        <td class="px-3 py-4 text-sm/6 text-gray-400 dark:text-gray-500">
          <Link :href="route('participant.show', { participant: participant.id })">
            {{ participant.location[0] }}
          </Link>
        </td>
        <td class="px-3 py-4 text-sm/6 text-gray-100 dark:text-gray-200">
          <Link :href="route('participant.show', { participant: participant.id })">
            {{ participant.url }}
          </Link>
        </td>
      </tr>
      </tbody>
    </table>
  </AuthenticatedLayout>
</template>