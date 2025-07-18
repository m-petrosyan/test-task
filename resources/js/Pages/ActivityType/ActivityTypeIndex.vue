<script setup>
import PageHint from "@/Components/Hints/PageHint.vue";
import {Link} from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import ActivityTypeIcon from "@/Components/Icons/ActivityTypeIcon.vue";

defineProps({
  activityTypes: {
    type: Array,
    required: true,
  },
  activityTypeCount: {
    type: Number,
    required: true,
  },
})
</script>

<template>
  <AuthenticatedLayout title="Activity Type List">
    <PageHint
        title="Activity Type List"
        :total="activityTypeCount">
      <ActivityTypeIcon/>
    </PageHint>
    <table class="min-w-full divide-y divide-gray-700 dark:divide-gray-600">
      <thead>
      <tr>
        <th class="px-3 py-3.5 text-left text-sm/6 font-semibold text-gray-100">Name</th>
        <th class="px-3 py-3.5 text-left text-sm/6 font-semibold text-gray-100">Sort order</th>
      </tr>
      </thead>
      <tbody class="divide-y divide-gray-700 dark:divide-gray-600">
      <tr v-for="activity in activityTypes" :key="activity.id">
        <td class="py-4 pl-4 pr-3 text-sm/6 text-gray-100 dark:text-gray-200 sm:pl-6">
          <div class="flex items-center gap-x-2">
            <Link :href="route('activityType.show', {  activityType: activity.id })">
              {{ activity.name }}
            </Link>
          </div>
        </td>
        <td class="px-3 py-4 text-sm/6 text-gray-400 dark:text-gray-500">
          <Link :href="route('activityType.show', {  activityType: activity.id })">
            {{ activity.sort_order }}
          </Link>
        </td>
      </tr>
      </tbody>
    </table>
  </AuthenticatedLayout>
</template>