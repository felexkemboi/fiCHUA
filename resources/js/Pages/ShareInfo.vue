
<template>
    <div class="divide-gray-900/10  flex row justify-center m-16">
        <form @submit.prevent="submitForm" class="bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl md:col-span-2 w-8/12 justify-center ">
                <div class="px-4 py-6 sm:p-12">

                    <h4 class="text-center mb-6 text-gray-700 text-3xl">Fill the form below</h4>

                    <div class=" grid  gap-x-6 gap-y-8 sm:grid-cols-6">

                        <!--name-->
                        <div class="sm:col-span-8">
                            <label  class="block text-sm font-medium leading-6 text-gray-900">Name(optional)</label>
                            <div class="mt-2">
                                <input v-model="crime.reporter_name" name="name" type="text" autocomplete="text" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                            </div>
                        </div>

                        <!--crime type-->
                        <div class="sm:col-span-8">
                            <label  class="block text-sm font-medium leading-6 text-gray-900">Crime Type</label>
                            <div class="mt-2">
                                <select v-model="crime.type" name="crime_type" autocomplete="crime_type" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                    <option v-for="type in crimeTypes" :key="type.id" :value="type.id">
                                        {{ type.name }}
                                    </option>

                                </select>

                            </div>
                        </div>

                        <!--geo-location-->
                        <div class="sm:col-span-8">
                            <label  class="block text-sm font-medium leading-6 text-gray-900">Geo-location</label>
                            <div class="mt-2">
                                <input v-model="crime.geo_location" name="location" type="text" autocomplete="text" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                            </div>
                        </div>

                        <!--county-->
                        <div class="sm:col-span-8">
                            <label  class="block text-sm font-medium leading-6 text-gray-900">County</label>
                            <div class="mt-2">
                                <select v-model="crime.county" name="county" autocomplete="county" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                    <option v-for="county in counties" :key="county.id" :value="county.id">
                                        {{ county.name }}
                                    </option>
                                </select>

                            </div>
                        </div>

                        <!--town-->
                        <div class="sm:col-span-8">
                            <label  class="block text-sm font-medium leading-6 text-gray-900">Town</label>
                            <div class="mt-2">
                                <input v-model="crime.town" name="location" type="text" autocomplete="text" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                            </div>
                        </div>

                        <!--apartment name-->
                        <div class="sm:col-span-8">
                            <label  class="block text-sm font-medium leading-6 text-gray-900">Building/Apartment Name</label>
                            <div class="mt-2">
                                <input v-model="crime.building" name="location" type="text" autocomplete="text" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                            </div>
                        </div>

                        <!--number-->
                        <div class="sm:col-span-8">
                            <label  class="block text-sm font-medium leading-6 text-gray-900">Number of Suspect</label>
                            <div class="mt-2">
                                <input v-model="crime.suspect_no" name="location" type="text" autocomplete="text" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                            </div>
                        </div>

                        <!--images-->
                        <div class="sm:col-span-8">
                            <p class="mb-2">Images</p>

                            <div class="row" v-if="images.length > 0">
                                <img  v-for="image in images"   :src="imagePath(image)" class="relative inline-flex items-center justify-center w-20 h-20 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600 m-2"  alt="Default avatar">
                            </div>

                            <div>
                                <label for="image-upload" class="mt-2 cursor-pointer bg-blue-500 text-white py-2 px-4  rounded-lg hover:bg-indigo-500">
                                    Add Image
                                </label>
                                <input id="image-upload" type="file" class="hidden" @change="addImage" />
                                <p class="text-gray-300 mt-1">Allowed jpg/gif/png(max 800kb)</p>
                            </div>
                        </div>

                        <!--videos-->
                        <div class="sm:col-span-8">
                            <p class="mb-2">Videos</p>

                            <div class="row" v-if="videos.length > 0">
                                <video controls v-for="video in videos"  class="relative inline-flex items-center justify-center w-20 h-20 overflow-hidden bg-gray-100  dark:bg-gray-600 m-2">
                                    <source :src="videoPath(video)"  type="video/mp4">
                                </video>
                            </div>

                            <div>
                                <label for="video-upload" class="mt-2 cursor-pointer bg-blue-500 text-white py-2 px-4  rounded-lg hover:bg-indigo-500">
                                    Add Video
                                </label>
                                <input id="video-upload" type="file" class="hidden" @change="addVideo" />
                            </div>
                        </div>

                        <!--audio-->
                        <div class="sm:col-span-8">
                            <p class="mb-2">Audio</p>

                            <div class="row mb-2" v-if="audios.length > 0">
                                <audio controls v-for="audio in audios"  class="relative inline-flex items-center justify-center w-20 h-20 overflow-hidden bg-gray-100  dark:bg-gray-600 m-2">
                                    <source :src="audioPath(audio)" type="audio/ogg">
                                </audio>
                            </div>

                            <div>
                                <label for="audio-upload" class="mt-2 cursor-pointer bg-blue-500 text-white py-2 px-4  rounded-lg hover:bg-indigo-500">
                                    Add Audio
                                </label>
                                <input id="audio-upload" type="file" class="hidden" @change="addAudio" />
                            </div>
                        </div>

                        <!--document-->
                        <div class="sm:col-span-4">
                            <p class="mb-2">Document</p>
                            <div class="col m-2" v-if="documents.length > 0">
                                <p v-for="document in documents" >{{ document.name }}</p>
                            </div>

                            <div>
                                <label for="doc-upload" class="mt-2 cursor-pointer bg-blue-500 text-white py-2 px-4  rounded-lg hover:bg-indigo-500">
                                    Add Document
                                </label>
                                <input id="doc-upload" type="file" class="hidden" @change="addDocument" />
                            </div>
                        </div>

                        <!--link to evidence-->
                        <div class="sm:col-span-8">
                            <label  class="block text-sm font-medium leading-6 text-gray-900">Link to evidence</label>
                            <div class="mt-2">
                                <input v-model="crime.evidence_link" name="link" type="text" autocomplete="text" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                            </div>
                        </div>

                        <!--A small description of the crime-->
                        <div class="col-span-full">
                            <label for="about" class="block text-sm font-medium leading-6 text-gray-900">Description of evidence</label>
                            <div class="mt-2">
                                <textarea id="about" name="about" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                            </div>
                            <p class="mt-3 text-sm leading-6 text-gray-600">Share as much as you know/witnessed.</p>
                        </div>

                    </div>
                </div>
                <div class="flex items-center justify-end gap-x-6 border-t border-gray-900/10 px-4 py-4 sm:px-8">
                    <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
                    <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600" >Save</button>
                </div>
            </form>
    </div>
</template>

<script setup>

import { ref } from 'vue'

const crime = ref({
    type: 1,
    reporter_name: '',
    geo_location: '',
    county: '',
    town: '',
    building: '',
    suspect_no: '',
    evidence_link: ''
})

const crimeTypes = ref([
    {
        'id': 1,
        'name': 'Sexual Assault'
    },
    {
        'id': 2,
        'name': 'Cyber Crime'
    },
    {
        'id': 3,
        'name': 'Violence'
    },
    {
        'id': 4,
        'name': 'Murder'
    },
    {
        'id': 5,
        'name': 'Domestic Violence'
    }
])

const counties = ref([
    {
        'id': 1,
        'name': 'Nairobi'
    },
    {
        'id': 2,
        'name': 'Mombasa'
    },
    {
        'id': 3,
        'name': 'Kiambu'
    },
    {
        'id': 4,
        'name': 'Meru'
    },
    {
        'id': 5,
        'name': 'Kisumu'
    }
])

const imagePath = (file) => {
    return   URL.createObjectURL(file);
}
const images = ref([])

const addImage =  (event) => {

    event.preventDefault();

    const selectedFile = event.target.files[0];

    console.log(selectedFile)

    images.value.push(selectedFile)

    // if (selectedFile) formData.append("profile_image", selectedFile);

}


const videoPath = (file) => {
    return   URL.createObjectURL(file);
}

const videos = ref([])

const addVideo =  (event) => {

    event.preventDefault();

    const selectedFile = event.target.files[0];


    videos.value.push(selectedFile)

    // if (selectedFile) formData.append("profile_image", selectedFile);

}


const audioPath = (file) => {
    return   URL.createObjectURL(file);
}

const audios = ref([])

const addAudio =  (event) => {

    event.preventDefault();

    const selectedFile = event.target.files[0];


    audios.value.push(selectedFile)

    // if (selectedFile) formData.append("profile_image", selectedFile);

}



const documents = ref([])

const addDocument =  (event) => {

    event.preventDefault();

    const selectedFile = event.target.files[0];

    console.log(selectedFile.name)


    documents.value.push(selectedFile)

    // if (selectedFile) formData.append("profile_image", selectedFile);

}

const formData = new FormData();
import { mainStore } from '../store'

const store = mainStore()

const submitForm = async () => {

    formData.append("type", crime.value.type);
    formData.append("reporter_name", crime.value.reporter_name);
    formData.append("geo_location", crime.value.geo_location);
    formData.append("county", crime.value.county);
    formData.append("town", crime.value.town);
    formData.append("building", crime.value.building);
    formData.append("suspect_no", crime.value.suspect_no);
    formData.append("evidence_link", crime.value.evidence_link);

    Array.from(videos.value).forEach((file, index) => {
        formData.append(`video${index + 1}`, file);
    });


    Array.from(images.value).forEach((file, index) => {
        formData.append(`image${index + 1}`, file);
    });


    Array.from(audios.value).forEach((file, index) => {
        formData.append(`audio${index + 1}`, file);
    });

    Array.from(documents.value).forEach((file, index) => {
        formData.append(`document${index + 1}`, file);
    });


    try {

        await store.addCrime(formData)

    } catch (error) {}

}

</script>
