require ('./bootstrap');

window.Vue = require('vue');

//l Import the App component
import App from './components/App.vue';

//l Create a new Vue Application
const app = new Vue({
    //l Specify entry point aka where to inject content
    el: '#root',
    //l Specify the home ("h") component
    render: h => h(App)
});