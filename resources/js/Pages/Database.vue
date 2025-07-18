<script setup>
import UserIcon from "@/Components/Icons/UserIcon.vue";
import PageHint from "@/Components/Hints/PageHint.vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import ActivityIcon from "@/Components/Icons/ActivityIcon.vue";
import ActivityTypeIcon from "@/Components/Icons/ActivityTypeIcon.vue";
import ParticipantIcon from "@/Components/Icons/ParticipantIcon.vue";
import {Link} from "@inertiajs/vue3";

defineProps({
  userCount: {
    type: Number,
    required: true,
  },
  activityCount: {
    type: Number,
    required: true,
  },
  activityTypeCount: {
    type: Number,
    required: true,
  },
  participantCount: {
    type: Number,
    required: true,
  },
})
</script>

<template>
  <AuthenticatedLayout title="Database index">
    <div class="flex flex-wrap gap-x-10">
      <Link :href="route('user.index')" class="w-1/2">
        <PageHint
            title="User List"
            :total="userCount">
          <UserIcon/>
        </PageHint>
      </Link>
      <Link :href="route('activity.index')" class="w-1/2">
        <PageHint
            title="Activity List"
            :total="activityCount">
          <ActivityIcon/>
        </PageHint>
      </Link>
      <Link :href="route('activityType.index')" class="w-1/2">
        <PageHint
            title="Activity Type List"
            :total="activityTypeCount">
          <ActivityTypeIcon/>
        </PageHint>
      </Link>
      <Link :href="route('participant.index')" class="w-1/2">
        <PageHint
            title="Participant List"
            :total="participantCount">
          <ParticipantIcon/>
        </PageHint>
      </Link>
    </div>
  </AuthenticatedLayout>
</template>