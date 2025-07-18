<script setup>
import PageHint from "@/Components/Hints/PageHint.vue";
import {Link} from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import ActivityIcon from "@/Components/Icons/ActivityIcon.vue";

defineProps({
  activities: {
    type: Array,
    required: true,
  },
  activityCount: {
    type: Number,
    required: true,
  },
})
</script>

<template>
  <AuthenticatedLayout title="Activity List">
    <PageHint
        title="Activity List"
        :total="activityCount"
        description="TThis page shows a paginated list of all recorded activities in the system.">
      <ActivityIcon/>
    </PageHint>
    <table class="min-w-full divide-y divide-gray-700 dark:divide-gray-600">
      <thead>
      <tr>
        <th class="px-3 py-3.5 text-left text-sm/6 font-semibold text-gray-100">Title</th>
        <th class="px-3 py-3.5 text-left text-sm/6 font-semibold text-gray-100">Location</th>
        <th class="px-3 py-3.5 text-left text-sm/6 font-semibold text-gray-100">Type</th>
        <th class="px-3 py-3.5 text-left text-sm/6 font-semibold text-gray-100">Type sort order</th>
      </tr>
      </thead>
      <tbody class="divide-y divide-gray-700 dark:divide-gray-600">
      <tr v-for="activity in activities" :key="activity.id">
        <td class="py-4 pl-4 pr-3 text-sm/6 text-gray-100 dark:text-gray-200 sm:pl-6">
          <div class="flex items-center gap-x-2">
            <Link :href="route('activity.show', { activity: activity.id })">
              {{ activity.title }}
            </Link>
          </div>
        </td>
        <td class="px-3 py-4 text-sm/6 text-gray-400 dark:text-gray-500">
          <Link :href="route('activity.show', { activity: activity.id })">
            {{ activity.location[0] }}
          </Link>
        </td>
        <td class="px-3 py-4 text-sm/6 text-gray-100 dark:text-gray-200">
          <Link :href="route('activity.show', { activity: activity.id })">
            {{ activity.activity_type?.name }}
          </Link>
        </td>
        <td class="px-3 py-4 text-sm/6 text-gray-100 dark:text-gray-200">
          <Link :href="route('activity.show', { activity: activity.id })">
            {{ activity.activity_type?.sort_order }}
          </Link>
        </td>
      </tr>
      </tbody>
    </table>
  </AuthenticatedLayout>
</template>