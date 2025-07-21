<script setup>
import {GoogleMap, Marker} from 'vue3-google-map';

const apiKey = import.meta.env.VITE_GOOGLE_MAPS_API_KEY;

const props = defineProps({
  latitude: {
    type: [Number, String],
    required: true
  },
  longitude: {
    type: [Number, String],
    required: true
  },
});

const center = {
  lat: parseFloat(props.latitude) || 0,
  lng: parseFloat(props.longitude) || 0
};
</script>

<template>
  <GoogleMap
      :api-key="apiKey"
      style="width: 100%; height: 500px"
      :center="center"
      :zoom="15"
  >
    <Marker :options="{ position: center, title: 'Activity Location' }"/>
  </GoogleMap>
</template>