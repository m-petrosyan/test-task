<script setup>
import PageHint from "@/Components/Hints/PageHint.vue";
import UserIcon from "@/Components/Icons/UserIcon.vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {Link} from '@inertiajs/vue3'

defineProps({
  users: {
    type: Array,
    required: true
  },
  userCount: {
    type: Number,
    required: true
  }
});
</script>

<template>
  <AuthenticatedLayout title="User List">
    <PageHint
        title="User List"
        :total="userCount"
        description="This page displays a list of all registered users in the system. Each user is shown with basic information such as name, email, and assigned roles.">
      <UserIcon/>
    </PageHint>
    <table class="min-w-full divide-y divide-gray-700 dark:divide-gray-600">
      <thead>
      <tr>
        <th class="px-3 py-3.5 text-left text-sm/6 font-semibold text-gray-100">Name</th>
        <th class="px-3 py-3.5 text-left text-sm/6 font-semibold text-gray-100">Email</th>
        <th class="px-3 py-3.5 text-left text-sm/6 font-semibold text-gray-100">Role</th>
      </tr>
      </thead>
      <tbody class="divide-y divide-gray-700 dark:divide-gray-600">
      <tr v-for="user in users" :key="user.id">
        <td class="py-4 pl-4 pr-3 text-sm/6 text-gray-100 dark:text-gray-200 sm:pl-6">
          <div class="flex items-center gap-x-2">
            <Link :href="route('user.show', { user: user.id })">
              {{ user.name }}
            </Link>
          </div>
        </td>
        <td class="px-3 py-4 text-sm/6 text-gray-400 dark:text-gray-500">
          <Link :href="route('user.show', { user: user.id })">
            {{ user.email }}
          </Link>
        </td>
        <td class="px-3 py-4 text-sm/6 text-gray-100 dark:text-gray-200">
          <Link :href="route('user.show', { user: user.id })">
            {{ user.role }}
          </Link>
        </td>
      </tr>
      </tbody>
    </table>
  </AuthenticatedLayout>
</template>
