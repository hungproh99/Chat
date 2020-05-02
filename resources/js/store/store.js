import Vue from 'vue';
import Vuex from 'vuex';
import axios from 'axios';
Vue.use(Vuex);
export const store = new Vuex.Store({
    states: {

    },

    mutations: {

    },

    actions: {
        getMessages() {
            var start_time = new Date().getTime();
            const a = axios.get('/messages')
                .then(res => {
                    var request_time = new Date().getTime() - start_time;
                    console.log(request_time)
                    return res
                })
            return a
        }
    }
})