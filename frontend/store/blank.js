export const state = () => ({
    all: [],
    fetchAllStatus: null,
    current: {},
    fetchCurrentStatus: null,
});

export const getters = {
    //
};

export const actions = {
    async GET_ALL({ commit }) {
        //
    },
    async GET({ commit }, id) {
        //
    },
    async UPDATE({ commit }, id) {
        //
    },
    async SUBMIT({ commit }, id) {
        //
    },
};

export const mutations = {
    SET_ALL(state, payload) {
        state.all = payload;
    },
    SET_CURRENT(state, payload) {
        state.current = payload;
    },
};
