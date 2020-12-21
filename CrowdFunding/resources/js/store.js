import Vue from "vue";
import Vuex from "vuex";
import transaction from "./stores/transaction.js";
import alert from "./stores/alert.js";
import auth from "./stores/auth.js";
import dialog from "./stores/dialog.js";
import VuexPersistence from "vuex-persist";

const vuexPersist = new VuexPersistence({ //ini biar kl di refresh smua data2 vuex kesimpan di local storage
    key: "crowdFundDomz",
    storage: window.localStorage
});

Vue.use(Vuex);

export default new Vuex.Store({
    plugins: [vuexPersist.plugin],
    modules: {
        transaction,
        alert,
        auth,
        dialog
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
