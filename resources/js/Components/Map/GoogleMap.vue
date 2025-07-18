<script setup>
import {GoogleMap, Marker} from 'vue3-google-map'

defineProps({})
const center = {lat: 40.689247, lng: -74.044502}
</script>

<template>
  <GoogleMap
      api-key="`import.meta.env.VITE_GOOGLE_MAPS_API_KEY`"
      style="width: 100%; height: 500px"
      :center="center"
      :zoom="15"
  >
    <Marker :options="{ position: center }"/>
  </GoogleMap>
</template>