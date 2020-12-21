import Axios from "axios";

export default {
    namespaced: true,
    state: {
        user: {}
    },
    mutations: {
        set: (state, payload) => {
            state.user = payload;
        }
    },
    actions: {
        set: ({ commit }, payload) => {
            commit("set", payload);
        },
        checkToken: ({ commit }, payload) => {
            let config = {
                headers: {
                    Authorization: "Bearer" + payload.token
                }
            };

            Axios.post("/api/check-token", {}, config)
                .then(response => {
                    commit("set", payload);
                })
                .catch(error => {
                    commit("set", {});
                });
        }
    },
    getters: {
        user: state => state.user,
        guest: state => Object.keys(state.user).length === 0
    }
};
