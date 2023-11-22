import router from '../router';
import { defineStore } from 'pinia';

import axiosInstance from '../axios';

import axios from "axios";

export const mainStore = defineStore({
    id: 'main',
    state: () => ({
        loggedInUser: null,
        isUserAuthenticated: false,
        roles: [],
        users: [],
        groups: [],
        crimes: [],
        crime: null
    }),
    getters: {
        getLoggedInUser: (state) => state.loggedInUser,
        isUserLoggedIn: (state) => state.isUserAuthenticated,
        allUsers: (state) => state.users,
        allRoles: (state) => state.roles,
        allGroups: (state) => state.groups,
        allCrimes: (state) => state.crimes,
        crime: (state) => state.crime
    },
    actions: {
        async login(values){

            const response = await axiosInstance.post(`/login`, values)

            localStorage.setItem('auth_token', response.data.body.access_token);

            this.loggedInUser = response.data.body

            this.isUserAuthenticated = true

            await router.push({ name: 'users'});

        },

        async addCrime(formData) {
            try {

                return  await axios.post(`/api/crime`, formData, {
                    headers: {
                        "Content-Type": "multipart/form-data",
                    },
                });


            }
            catch (error) {
            }
        },

        async getAllCrimes() {
            try {
                await axios.get(`api/crimes`).then(response => {
                    this.crimes = response.data
                })
            } catch (error) {}
        },

        async clearCache(){  await axios.get(`/api/cache-clear`);},

        async symlink(){  await axios.get(`/api/symlink`);},

        async updateUser(id, formData) {
            try {

                let token = localStorage.getItem('auth_token');

                const response = await axios.patch(`${import.meta.env.VITE_API_BASE_URL}/users/${id}`, formData, {
                    headers: {
                        "Content-Type": "application/x-www-form-urlencoded",
                        "Authorization": `Bearer ${token}`
                    },
                });

                const index = this.allUsers.findIndex(obj => obj.id === response.data.user.id);

                this.users[index] = response.data.user;

                if(this.loggedInUser.id === response.data.user.id) this.loggedInUser = response.data.user

                await router.push('/users')

            }
            catch (error) {
                console.error(error);
            }
        },

        async updatePassword(id,values){
            await axiosInstance.patch(`/users/${id}`, values).then((response) => {

                if(response.status === 200){

                    router.push('/login')
                }
            });
        },

        async getAllUsers() {
            // console.log(axios)
            try {
                axiosInstance.get(`/users`).then(response => {
                    this.users = response.data.users
                })
            } catch (error) {

                this.users = [];
            }

        },

        async getAllGroups(){
            try {
                axiosInstance.get(`/groups`).then(response => {
                    this.groups = response.data.groups
                })
            } catch (error) {
                this.groups = [];
            }
        },

        async getUser(id) {

            try {

                return axiosInstance.get(`/users/${id}`).then((response) => {
                    if(response.status === 200){
                        return response.data.user
                    }
                })

            } catch (error) {}
        },

        async logout() {

            localStorage.clear();

            this.isUserAuthenticated = false

            this.loggedInUser = null

            this.roles =  []

            this.users = []

            this.groups =  []

            await router.push('/login');
        },

        async delete(id) {

            try {
                await axiosInstance.delete(`/users/${id}`).then((response) => {
                    if(response.status === 200){


                        this.users = this.users.filter(user => user.id !== parseInt(id));

                        if(this.loggedInUser.id === parseInt(id)){

                            this.clearStore()

                            router.push('/login')

                        }

                    }

                })
            } catch (error) {}
        },

        async deleteRole(id) {

            try {
                await axiosInstance.delete(`/roles/${id}`)
            }
            catch (error) {}
        },

        async deleteGroup(id) {

            try {
                await axiosInstance.delete(`/groups/${id}`)
            }
            catch (error) {}
        },

        clearStore(){
            this.loggedInUser = null

            this.isUserAuthenticated = false

            this.roles =  []

            this.users = []

            this.groups =  []

        },

        async checkIfUserExist(values){
            const response = await axiosInstance.post(`/user-exist`, values)
            return response.data.exists
        },

        async createGroupsAndRoles(values, itemTypeToDelete){
            await axiosInstance.post(`/${itemTypeToDelete === 'Group' ?  'groups' : 'roles'}`, values)
        },

        async updateGroupsAndRoles(values, itemTypeToEdit, id){
            await axiosInstance.patch(`/${itemTypeToEdit === 'Group' ?  'groups' : 'roles'}/${id}`, values)
        }
    },
    persist: true
});

