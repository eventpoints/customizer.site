import { registerVueControllerComponents } from '@symfony/ux-vue';
import './bootstrap.js';
import 'bootstrap/dist/js/bootstrap.js'
import './styles/app.scss';

registerVueControllerComponents(require.context('./vue/controllers', true, /\.vue$/));
registerVueControllerComponents();