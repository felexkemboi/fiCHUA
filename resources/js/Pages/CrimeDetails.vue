<template>
    <div class="divide-gray-900/10  flex row justify-center mt-10 ">
        <form class="bg-gray-100 ring-1 rounded-lg ring-gray-900/5 justify-center w-full lg:w-8/12 sm:w-full">
            <div class="px-4 py-6 sm:p-12 mb-3">

                <p class="text-center p-4">{{ crime.description ? crime.description : 'Description Not Given' }}</p>

                <div class="flex flex-col shadow mb-4">

                    <h5 class="pt-4 text-center mb-6 text-gray-700 text-2xl">Media</h5>

                    <div class="container mx-auto p-4">
                        <ul class="flex justify-center space-x-2 text-white">
                            <li>
                                <button @click="activeTabOne" class="inline-block px-4 py-2 rounded" :class="tab === 1 ? 'bg-green-300': 'bg-indigo-300 '">Images</button>
                            </li>
                            <li>
                                <button @click="activeTabTwo" class="inline-block px-4 py-2  rounded" :class="tab === 2 ? 'bg-green-300': 'bg-indigo-300'">Videos</button>
                            </li>
                            <li>
                                <button @click="activeTabThree" class="inline-block px-4 py-2  rounded"  :class="tab === 3 ? 'bg-green-300': 'bg-indigo-300'">Audios</button>
                            </li>
                            <li>
                                <button @click="activeTabFour" class="inline-block px-4 py-2  rounded"  :class="tab === 4 ? 'bg-green-300': 'bg-indigo-300'">Documents</button>
                            </li>
                        </ul>
                        <div class="p-4 mt-6 overflow-x-scroll">
                            <div v-show="tab === 1" class="flex flex-row">

                                <div v-if='crime.images !== ""' v-for='src in crime.images.split(",")' class="flex items-center gap-x-4 border-b overflow-x-scroll">
                                    <img :src="getUrl(src, 'image')" class="h-20 max-w-xs pr-2 flex-none rounded-lg bg-white object-cover ring-1 ring-gray-900/10" alt=""/>
                                </div>
                                <div v-else>
                                    No images provided
                                </div>
                            </div>

                            <div v-show="tab === 2" class="flex flex-row">

                                <div v-if='crime.videos !== ""' v-for='src in crime.videos.split(",")' class="flex items-center gap-x-4 border-b overflow-x-scroll">
                                    <video controls  class="h-24 w-20  pr-2 flex-none rounded-lg  object-cover ring-1 ring-gray-900/10">
                                        <source :src="getUrl(src, 'video')"  type="video/mp4">
                                    </video>
                                </div>
                                <div v-else>
                                    No Videos provided
                                </div>
                            </div>

                            <div v-show="tab === 3" class="flex flex-row">

                                <div v-if='crime.audios !== ""' v-for='src in crime.audios.split(",")'>
                                    <audio controls class="h-24 w-20  pr-2 flex-none rounded-lg  object-cover ring-1 ring-gray-900/10">
                                        <source :src="getUrl(src, 'audio')"  type="audio/ogg">
                                    </audio>
                                </div>
                                <div v-else>
                                    No Audios provided
                                </div>
                            </div>

                            <div v-show="tab === 4" class="flex flex-row">

                                <div v-if='crime.documents !== ""' v-for='src in crime.documents.split(",")'>
                                    <embed :src="getUrl(src, 'document')" width="100px" height="100px" />
                                </div>
                                <div v-else>
                                    No Files provided
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="flex flex-col shadow">
                    <h5 class="text-center mb-6 mt-6 text-gray-700 text-2xl">Details</h5>
                    <div class="flex flex-col ml-10 mb-6">
                        <div>Date Reported:  {{ crime.created_at }}</div>
                        <div>Reporter Name: {{ crime.reporter_name }}</div>
                        <div>County: {{ crime.county }}</div>
                        <div>Type: {{ crime.type }}</div>
                        <div>Town: {{ crime.town }}</div>
                        <div>Building: {{ crime.building }}</div>
                        <div>Suspect Number: {{ crime.suspect_no }}</div>
                        <div>Evidence Link: {{ crime.evidence_link }}</div>
                    </div>
                </div>

            </div>
            <div class="flex items-center justify-end gap-x-6 border-t border-gray-900/10 px-4 py-4 sm:px-8">
                <router-link class="rounded-md bg-indigo-500 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-400" to="/admin">Click here to go Back</router-link>
            </div>
        </form>
    </div>
</template>

<script setup>


const getUrl = (src, type)  =>{
    return `/storage/${type}s/${src}`
}

import {onMounted, ref } from "vue";

import { mainStore } from '../store'

import { useRoute } from 'vue-router'
import axios from "axios";

const store = mainStore()

const route = useRoute()

const crime = ref({})

const tab = ref(1)


const activeTabOne =  () =>  {
    tab.value = 1;
}

const activeTabTwo =  () =>  {
    tab.value = 2;
}

const activeTabThree =  () =>  {
    tab.value = 3;
}

const activeTabFour =  () =>  {
    tab.value = 4;
}



onMounted(async () => {
    try {
        await axios.get(`api/crimes/${parseInt(route.params.id)}`).then(response => {
            crime.value =  response.data
        })
    } catch (error) {}

})

</script>


