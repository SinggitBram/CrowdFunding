import Vue from "vue";
import Vuex from "vuex";
import transaction from './stores/transaction.js'

Vue.use(Vuex);

export default new Vuex.Store({
    modules: {
        transaction
    }
    // state: {
    //     transaction: 0
    // },
    // mutations: {
    //     insert: (state, payload) => {
    //         state.transaction++;
    //     }
    // },
    // actions: {},
    // getters: {
    //     transaction: state => state.transaction
    // }
});
