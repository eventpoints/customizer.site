import { registerVueControllerComponents } from '@symfony/ux-vue';
import './bootstrap.js';
import 'bootstrap/dist/js/bootstrap.js'
import './styles/app.scss';
import axios from 'axios';

axios.defaults.baseURL = process.env.AXIOS_BASE_URL;
registerVueControllerComponents(require.context('./vue/controllers', true, /\.vue$/));
registerVueControllerComponents();