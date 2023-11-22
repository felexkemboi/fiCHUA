<template>
    {{ crime }}
</template>
<script setup>

import {onMounted, ref } from "vue";

import { mainStore } from '../store'

import { useRoute } from 'vue-router'
import axios from "axios";

const store = mainStore()

const route = useRoute()

const crime = ref({})

onMounted(async () => {
    try {
        await axios.get(`api/crimes/${parseInt(route.params.id)}`).then(response => {
            crime.value =  response.data
        })
    } catch (error) {}

})

</script>
