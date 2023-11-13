
<template>
    <div class="divide-gray-900/10 justify-center m-16">
        <h4 class="text-center mb-6 text-gray-700 text-3xl">Fill the form below</h4>
        <div class="md:flex md:justify-center">

            <form class="bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl md:col-span-2">
                <div class="px-4 py-6 sm:p-8">
                    <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                        <div class="sm:col-span-4">
                            <label  class="block text-sm font-medium leading-6 text-gray-900">Name(optional)</label>
                            <div class="mt-2">
                                <input v-model="crime.reporter_name" name="name" type="text" autocomplete="text" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                            </div>
                        </div>

                        <div class="sm:col-span-4">
                            <label  class="block text-sm font-medium leading-6 text-gray-900">Crime Type</label>
                            <div class="mt-2">
                                <select v-model="crime.type" name="crime_type" autocomplete="crime_type" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                    <option v-for="type in crimeTypes" :key="type.id" :value="type.id">
                                        {{ type.name }}
                                    </option>

                                </select>

                            </div>
                        </div>

                        <div class="sm:col-span-4">
                            <label  class="block text-sm font-medium leading-6 text-gray-900">Geo-location</label>
                            <div class="mt-2">
                                <input v-model="crime.geo_location" name="location" type="text" autocomplete="text" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                            </div>
                        </div>


                        <div class="sm:col-span-4">
                            <label  class="block text-sm font-medium leading-6 text-gray-900">County</label>
                            <div class="mt-2">
                                <select v-model="crime.county" name="county" autocomplete="county" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                    <option v-for="county in counties" :key="county.id" :value="county.id">
                                        {{ county.name }}
                                    </option>
                                </select>

                            </div>
                        </div>


<!--                        <div class="mt-2 flex items-center gap-x-3">-->
<!--                            <img  class="relative inline-flex items-center justify-center w-20 h-20 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600" v-if="imageUrlPreview !== ''" :src="imageUrlPreview" alt="Default avatar">-->
<!--                            <div v-else class="relative inline-flex items-center justify-center w-20 h-20 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">-->
<!--                                <span class="text-sm	text-center text-gray-600 dark:text-gray-300">Image</span>-->
<!--                            </div>-->
<!--                            <div>-->
<!--                                <div class="mb-2">-->
<!--                                    <label for="file-upload" class="cursor-pointer bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-indigo-500">-->
<!--                                        Select Image-->
<!--                                    </label>-->
<!--                                    <input id="file-upload" type="file" class="hidden" @change="" />-->
<!--                                </div>-->
<!--                                <p class="text-gray-300">Allowed jpg/gif/png(max 800kb)</p>-->
<!--                            </div>-->
<!--                        </div>-->


                        <div class="sm:col-span-4">
                            <p>Images</p>
                            <div class="row mb-2">
                                <img  src="/storage/images/1.jpg" class="relative inline-flex items-center justify-center w-20 h-20 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600 m-2"  alt="Default avatar">
                                <img  src="/storage/images/1.jpg" class="relative inline-flex items-center justify-center w-20 h-20 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600 m-2"  alt="Default avatar">
                                <img  src="/storage/images/1.jpg" class="relative inline-flex items-center justify-center w-20 h-20 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600 m-2"  alt="Default avatar">
                                <img  src="/storage/images/1.jpg" class="relative inline-flex items-center justify-center w-20 h-20 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600 m-2"  alt="Default avatar">
                                <img  src="/storage/images/1.jpg" class="relative inline-flex items-center justify-center w-20 h-20 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600 m-2"  alt="Default avatar">
                                <img  src="/storage/images/1.jpg" class="relative inline-flex items-center justify-center w-20 h-20 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600 m-2"  alt="Default avatar">
                            </div>
                            <div>
                                <label for="file-upload" class="cursor-pointer bg-blue-500 text-white py-2 px-4  rounded-lg hover:bg-indigo-500">
                                    Add Image
                                </label>
                                <input id="file-upload" type="file" class="hidden" @change="" />
                            </div>
                        </div>








                        <div class="sm:col-span-4">
                            <label  class="block text-sm font-medium leading-6 text-gray-900">Town</label>
                            <div class="mt-2">
                                <input v-model="crime.town" name="location" type="text" autocomplete="text" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                            </div>
                        </div>

                        <div class="sm:col-span-4">
                            <label  class="block text-sm font-medium leading-6 text-gray-900">Building/Apartment Name</label>
                            <div class="mt-2">
                                <input v-model="crime.building" name="location" type="text" autocomplete="text" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                            </div>
                        </div>


                        <div class="sm:col-span-4">
                            <label  class="block text-sm font-medium leading-6 text-gray-900">Number of Suspect</label>
                            <div class="mt-2">
                                <input v-model="crime.suspect_no" name="location" type="text" autocomplete="text" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                            </div>
                        </div>




                        <div class="col-span-full">
                            <label for="about" class="block text-sm font-medium leading-6 text-gray-900">Description of evidence</label>
                            <div class="mt-2">
                                <textarea id="about" name="about" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                            </div>
                            <p class="mt-3 text-sm leading-6 text-gray-600">Share as much as you know/witnessed.</p>
                        </div>





                        <div class="sm:col-span-3">
                            <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">First name</label>
                            <div class="mt-2">
                                <input type="text" name="first-name" id="first-name" autocomplete="given-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                            </div>
                        </div>

                        <div class="sm:col-span-3">
                            <label for="last-name" class="block text-sm font-medium leading-6 text-gray-900">Last name</label>
                            <div class="mt-2">
                                <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                            </div>
                        </div>


                        <div class="col-span-full">
                            <label for="street-address" class="block text-sm font-medium leading-6 text-gray-900">Street address</label>
                            <div class="mt-2">
                                <input type="text" name="street-address" id="street-address" autocomplete="street-address" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                            </div>
                        </div>

                        <div class="sm:col-span-2 sm:col-start-1">
                            <label for="city" class="block text-sm font-medium leading-6 text-gray-900">City</label>
                            <div class="mt-2">
                                <input type="text" name="city" id="city" autocomplete="address-level2" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="region" class="block text-sm font-medium leading-6 text-gray-900">State / Province</label>
                            <div class="mt-2">
                                <input type="text" name="region" id="region" autocomplete="address-level1" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="postal-code" class="block text-sm font-medium leading-6 text-gray-900">ZIP / Postal code</label>
                            <div class="mt-2">
                                <input type="text" name="postal-code" id="postal-code" autocomplete="postal-code" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                            </div>
                        </div>

                        <div class="col-span-full">
                            <label for="cover-photo" class="block text-sm font-medium leading-6 text-gray-900">Cover photo</label>
                            <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                                <div class="text-center">
                                    <PhotoIcon class="mx-auto h-12 w-12 text-gray-300" aria-hidden="true" />
                                    <div class="mt-4 flex text-sm leading-6 text-gray-600">
                                        <label for="file-upload" class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                            <span>Upload a file</span>
                                            <input id="file-upload" name="file-upload" type="file" class="sr-only" />
                                        </label>
                                        <p class="pl-1">or drag and drop</p>
                                    </div>
                                    <p class="text-xs leading-5 text-gray-600">PNG, JPG, GIF up to 10MB</p>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="flex items-center justify-end gap-x-6 border-t border-gray-900/10 px-4 py-4 sm:px-8">
                    <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
                    <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script setup>
import { PhotoIcon } from '@heroicons/vue/24/solid'
import {reactive, ref} from 'vue'

const crime = reactive({
    type: 1,
    reporter_name: '',
    geo_location: '',
    county: '',
    town: '',
    building: '',
    suspect_no: ''
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

</script>
