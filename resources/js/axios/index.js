import axios from 'axios'

const axiosInstance = axios.create({
    baseURL: window.location.protocol + '//' + window.location.hostname  + '/api/'
})

export default axiosInstance
