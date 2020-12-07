import Vue from "vue";
import Vuex from "vuex";
import transaction from "./stores/transaction.js";
import alert from "./stores/alert.js";

Vue.use(Vuex);

export default new Vuex.Store({
    modules: {
        transaction,
        alert
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
