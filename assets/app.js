import { registerVueControllerComponents } from '@symfony/ux-vue';
import './bootstrap.js';
import 'bootstrap/dist/js/bootstrap.js'
import './styles/app.scss';
import axios from 'axios';

axios.defaults.baseURL = process.env.AXIOS_BASE_URL;
registerVueControllerComponents(require.context('./vue/controllers', true, /\.vue$/));
registerVueControllerComponents();

axios.interceptors.request.use((config) => {
    const token = document.cookie.split('; ').find(row => row.startsWith('AUTH_TOKEN='));
    if (token) {
        const tokenValue = token.split('=')[1]; // Extract the token value
        config.headers['Authorization'] = `Bearer ${tokenValue}`;
    }
    return config;
}, (error) => {
    return Promise.reject(error);
});


