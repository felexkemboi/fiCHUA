
<template>
    <div>
        <TransitionRoot as="template" :show="sidebarOpen">
            <Dialog as="div" class="relative z-50 lg:hidden" @close="sidebarOpen = false">
                <TransitionChild as="template" enter="transition-opacity ease-linear duration-300" enter-from="opacity-0" enter-to="opacity-100" leave="transition-opacity ease-linear duration-300" leave-from="opacity-100" leave-to="opacity-0">
                    <div class="fixed inset-0 bg-gray-900/80" />
                </TransitionChild>

                <div class="fixed inset-0 flex">
                    <TransitionChild as="template" enter="transition ease-in-out duration-300 transform" enter-from="-translate-x-full" enter-to="translate-x-0" leave="transition ease-in-out duration-300 transform" leave-from="translate-x-0" leave-to="-translate-x-full">
                        <DialogPanel class="relative mr-16 flex w-full max-w-xs flex-1">
                            <TransitionChild as="template" enter="ease-in-out duration-300" enter-from="opacity-0" enter-to="opacity-100" leave="ease-in-out duration-300" leave-from="opacity-100" leave-to="opacity-0">
                                <div class="absolute left-full top-0 flex w-16 justify-center pt-5">
                                    <button type="button" class="-m-2.5 p-2.5" @click="sidebarOpen = false">
                                        <span class="sr-only">Close sidebar</span>
                                        <XMarkIcon class="h-6 w-6 text-white" aria-hidden="true" />
                                    </button>
                                </div>
                            </TransitionChild>
                            <!-- Sidebar component, swap this element with another sidebar if you like -->
                            <div class="flex grow flex-col gap-y-5 overflow-y-auto bg-white px-6 pb-4">
                                <div class="flex h-16 shrink-0 items-center">
                                    <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company" />
                                </div>
                                <nav class="flex flex-1 flex-col">
                                    <ul role="list" class="flex flex-1 flex-col gap-y-7">
                                        <li>
                                            <ul role="list" class="-mx-2 space-y-1">
                                                <li v-for="item in navigation" :key="item.name">
                                                    <a :href="item.href" :class="[item.current ? 'bg-gray-50 text-indigo-600' : 'text-gray-700 hover:text-indigo-600 hover:bg-gray-50', 'group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold']">
                                                        <component :is="item.icon" :class="[item.current ? 'text-indigo-600' : 'text-gray-400 group-hover:text-indigo-600', 'h-6 w-6 shrink-0']" aria-hidden="true" />
                                                        {{ item.name }}
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
<!--                                        <li>-->
<!--                                            <div class="text-xs font-semibold leading-6 text-gray-400">Your teams</div>-->
<!--                                            <ul role="list" class="-mx-2 mt-2 space-y-1">-->
<!--                                                <li v-for="team in teams" :key="team.name">-->
<!--                                                    <a :href="team.href" :class="[team.current ? 'bg-gray-50 text-indigo-600' : 'text-gray-700 hover:text-indigo-600 hover:bg-gray-50', 'group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold']">-->
<!--                                                        <span :class="[team.current ? 'text-indigo-600 border-indigo-600' : 'text-gray-400 border-gray-200 group-hover:border-indigo-600 group-hover:text-indigo-600', 'flex h-6 w-6 shrink-0 items-center justify-center rounded-lg border text-[0.625rem] font-medium bg-white']">{{ team.initial }}</span>-->
<!--                                                        <span class="truncate">{{ team.name }}</span>-->
<!--                                                    </a>-->
<!--                                                </li>-->
<!--                                            </ul>-->
<!--                                        </li>-->
                                        <li class="mt-auto">
                                            <a href="#" class="group -mx-2 flex gap-x-3 rounded-md p-2 text-sm font-semibold leading-6 text-gray-700 hover:bg-gray-50 hover:text-indigo-600">
                                                <Cog6ToothIcon class="h-6 w-6 shrink-0 text-gray-400 group-hover:text-indigo-600" aria-hidden="true" />
                                                sfsfsdfsd
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </DialogPanel>
                    </TransitionChild>
                </div>
            </Dialog>
        </TransitionRoot>

        <div class="hidden lg:fixed lg:inset-y-0 lg:z-50 lg:flex lg:w-72 lg:flex-col">
            <div class="flex grow flex-col gap-y-5 overflow-y-auto border-r border-gray-200 bg-white px-6 pb-4">
                <div class="flex h-16 shrink-0 items-center">
                    <img src="/storage/images/logo.png" alt="" class=" h-10 w-25 justify-start" />

<!--                    <router-link class="bg-purple-400 text-white hover:bg-blue-200 font-bold p-2 rounded"  :to="{ name: 'crime-details'}" tag="button">View Details</router-link>-->

                </div>
                <nav class="flex flex-1 flex-col">
                    <ul role="list" class="flex flex-1 flex-col gap-y-7">
                        <li>
                            <ul role="list" class="-mx-2 space-y-1">
                                <li v-for="item in navigation" :key="item.name">
                                    <a :href="item.href" :class="[item.current ? 'bg-gray-50 text-indigo-600' : 'text-gray-700 hover:text-indigo-600 hover:bg-gray-50', 'group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold']">
                                        <component :is="item.icon" :class="[item.current ? 'text-indigo-600' : 'text-gray-400 group-hover:text-indigo-600', 'h-6 w-6 shrink-0']" aria-hidden="true" />
                                        {{ item.name }}
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="mt-auto">
                            <a href="#" class="group -mx-2 flex gap-x-3 rounded-md p-2 text-sm font-semibold leading-6 text-gray-700 hover:bg-gray-50 hover:text-indigo-600">
                                <Cog6ToothIcon class="h-6 w-6 shrink-0 text-gray-400 group-hover:text-indigo-600" aria-hidden="true" />
                                <router-link to="/admin" tag="button">Log out</router-link>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

        <div class="lg:pl-72">
            <main class="py-8">
                <div class="relative isolate overflow-hidden">
                    <div class="border-b border-b-gray-900/10 lg:border-t lg:border-t-gray-900/5">
                        <dl class="mx-auto grid max-w-7xl grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 lg:px-2 xl:px-0">
                            <div v-for="(stat, statIdx) in stats" :key="stat.name" :class="[statIdx % 2 === 1 ? 'sm:border-l' : statIdx === 2 ? 'lg:border-l' : '', 'flex items-baseline flex-wrap justify-between gap-y-2 gap-x-4 border-t border-gray-900/5 px-4 py-10 sm:px-6 lg:border-t-0 xl:px-8']">
                                <dt class="text-sm font-medium leading-6 text-gray-500">{{ stat.name }}</dt>
                                <dd :class="[stat.changeType === 'negative' ? 'text-rose-600' : 'text-gray-700', 'text-xs font-medium']">{{ stat.change }}</dd>
                                <dd class="w-full flex-none text-3xl font-medium leading-10 tracking-tight text-gray-900">{{ stat.value }}</dd>
                            </div>
                        </dl>
                    </div>

                    <div class="absolute left-0 top-full -z-10 origin-top-left translate-y-40 -rotate-90 transform-gpu opacity-20 blur-3xl sm:left-1/2 sm:-ml-96 sm:-mt-10 sm:translate-y-0 sm:rotate-0 sm:transform-gpu sm:opacity-50" aria-hidden="true">
                        <div class="aspect-[1154/678] w-[72.125rem] bg-gradient-to-br from-[#FF80B5] to-[#9089FC]" style="clip-path: polygon(100% 38.5%, 82.6% 100%, 60.2% 37.7%, 52.4% 32.1%, 47.5% 41.8%, 45.2% 65.6%, 27.5% 23.4%, 0.1% 35.3%, 17.9% 0%, 27.7% 23.4%, 76.2% 2.5%, 74.2% 56%, 100% 38.5%)" />
                    </div>
                </div>

                <div class="space-y-16 py-16 xl:space-y-20">
                    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                        <div class="mx-auto max-w-2xl lg:mx-0 lg:max-w-none">
                            <div class="flex items-center justify-between">
                                <h2 class="text-base font-semibold leading-7 text-gray-900">Recent Crimes</h2>
                                <a href="#" class="text-sm font-semibold leading-6 text-indigo-600 hover:text-indigo-500">View all<span class="sr-only">, crimes</span></a>
                            </div>
                            <ul role="list" class="mt-6 grid grid-cols-1 gap-x-6 gap-y-8 lg:grid-cols-3 xl:gap-x-8">
                                <li v-for="crime in store.allCrimes" :key="crime.id" class="overflow-hidden rounded-xl border border-gray-200">
                                    <div v-if='crime.images !== ""' v-for='src in crime.images.split(",")' class="flex items-center gap-x-4 border-b border-gray-900/5 bg-gray-50 p-6 overflow-x-scroll">
                                        <img :src="getUrl(src, 'image')" class="h-20 w-20 flex-none rounded-lg bg-white object-cover ring-1 ring-gray-900/10" alt=""/>
                                    </div>
                                    <div v-else-if='crime.videos !== ""'>
                                        <video controls v-for='src in crime.videos.split(",")'  class="relative inline-flex items-center justify-center w-20 h-20 overflow-hidden bg-gray-100  dark:bg-gray-600 m-2">
                                            <source :src="getUrl(src, 'video')"  type="video/mp4">
                                        </video>
                                    </div>
                                    <div class="text-center p-4">
                                        No Media provided
                                    </div>
                                    <dl class="-my-3 divide-y divide-gray-100 px-6 py-4 text-sm leading-6">
                                        <div class="flex justify-between gap-x-4 py-3">
                                            <dt>Reported By:</dt>
                                            <dd>
                                                {{ crime.reporter_name }}
                                            </dd>
                                        </div>


                                        <div class="flex justify-between gap-x-4 py-3">
                                            <dt>Reported At:</dt>
                                            <dd>
                                                {{ moment(crime.created_at).format('lll') }}
                                            </dd>
                                        </div>

                                        <div class="flex justify-between gap-x-4 py-3">
                                            <dt>County:</dt>
                                            <dd>
                                                {{ crime.county }}
                                            </dd>
                                        </div>

                                        <div class="flex justify-between gap-x-4 py-3">
                                            <dt>Crime Type:</dt>
                                            <dd>
                                                {{ crime.type }}
                                            </dd>
                                        </div>

                                        <div class="flex justify-between gap-x-4 py-3">
                                            <dt>Suspect Number:</dt>
                                            <dd>
                                                {{ crime.suspect_no }}
                                            </dd>
                                        </div>

                                        <div class="flex justify-between gap-x-4 py-3">
                                            <dt>Building:</dt>
                                            <dd>
                                                {{ crime.building }}
                                            </dd>
                                        </div>

                                        <div class="container py-2 px-2 mx-0 min-w-full flex flex-col items-center">
                                            <router-link class="bg-purple-400 text-white hover:bg-blue-200 font-bold p-2 rounded"  :to="{ name: 'crime-details', params: { id: crime.id }}" tag="button">View Details</router-link>
                                        </div>
                                    </dl>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</template>

<script setup>

import {computed, onMounted, ref} from 'vue'

const crimes = ref([])

const getUrl = (src, type)  =>{
    return `/storage/${type}s/${src}`
}

import moment from 'moment'


import { mainStore } from '../store'
const store = mainStore()

import { XMarkIcon } from '@heroicons/vue/24/outline'
import { Dialog, DialogPanel } from '@headlessui/vue'
import { TransitionChild, TransitionRoot } from '@headlessui/vue'
import {CalendarIcon, Cog6ToothIcon, FolderIcon, HomeIcon, UsersIcon } from '@heroicons/vue/24/outline'

const images = ref(["https://picsum.photos/id/238/1024/800", "https://picsum.photos/id/239/1024/800", "https://picsum.photos/id/238/1024/800", "https://picsum.photos/id/239/1024/800" ])

const active = ref(0);

import { useRouter } from 'vue-router'


const router = useRouter()


const test = () => {
    let i = 0;
    setInterval(() => {

        if (i > images.value.length - 1) {i = 0;}

        active.value = i;

        i++;

    }, 2000);
}
onMounted(() => {
    store.getAllCrimes()
    test()
})

const stats = [
    { name: 'Rape', value: '78', change: '+4.75%', changeType: 'positive' },
    { name: 'Gender Based Violence', value: '32', change: '+54.02%', changeType: 'negative' },
    { name: 'Corruption', value: '45', change: '-1.39%', changeType: 'positive' },
    { name: 'Robbery', value: '60', change: '+10.18%', changeType: 'negative' },
]

const navigation = [
    { name: 'Dashboard', href: '#', icon: HomeIcon, current: true },
    { name: 'Counties', href: '#', icon: UsersIcon, current: false },
    { name: 'Crime Types', href: '#', icon: FolderIcon, current: false },
    { name: 'Users', href: '#', icon: CalendarIcon, current: false },
]
//
// const teams = [
//     { id: 1, name: 'Heroicons', href: '#', initial: 'H', current: false },
//     { id: 2, name: 'Tailwind Labs', href: '#', initial: 'T', current: false },
//     { id: 3, name: 'Workcation', href: '#', initial: 'W', current: false },
// ]

const sidebarOpen = ref(false)

</script>

