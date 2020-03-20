import { fetchStatus } from '~/assets/js/utils/constants';

export const state = () => ({
    all: [],
    filter: {},
    fetchAllStatus: fetchStatus.NONE,
    current: {},
    validationErrors: {},
    fetchCurrentStatus: fetchStatus.NONE,
});

export const getters = {
    //
};

export const actions = {
    async GET_ALL({ commit, state }, refresh = false) {
        if (!refresh && state.fetchAllStatus === fetchStatus.SUCCESS) {
            return true;
        }

        try {
            commit('SET_ALL_STATUS', fetchStatus.PENDING);
            const { payload, error } = await this.$api.legals.getAll(state.filter);
            commit('SET_ALL', payload);
        } catch (exception) {
            commit('SET_ALL_STATUS', fetchStatus.ERROR);
        }
    },

    async GET({ commit, state }, id, refresh = false) {
        if (!refresh && state.fetchCurrentStatus === fetchStatus.SUCCESS && state.current.id == id) {
            return true;
        }

        try {
            commit('SET_CURRENT_STATUS', fetchStatus.PENDING);
            const { payload, error } = await this.$api.legals.get(id);
            commit('SET_CURRENT', payload);
        } catch (exception) {
            commit('SET_CURRENT_STATUS', fetchStatus.ERROR);
        }
    },

    async SUBMIT({ commit, state }) {
        try {
            commit('SET_CURRENT_STATUS', fetchStatus.PENDING);
            const { payload, error } = state.current.id
                ? await this.$api.legals.update(state.current)
                : await this.$api.legals.create(state.current);

            commit('SET_CURRENT', payload);
        } catch (exception) {
            const errors = exception.response?.data?.errors || {};
            commit('SET_CURRENT_ERROR', errors);
            throw exception;
        }
    },

    UPDATE({ commit }, legal) {
        commit('SET_CURRENT', legal);
    },

    SET_FILTER({ commit }, payload) {
        commit('SET_FILTER', payload);
    },
};

export const mutations = {
    SET_ALL(state, payload) {
        state.all = payload;
        state.fetchAllStatus = fetchStatus.SUCCESS;
    },

    SET_CURRENT(state, payload) {
        state.current = payload;
        state.fetchCurrentStatus = fetchStatus.SUCCESS;
    },

    SET_FILTER(state, payload) {
        state.filter = payload;
    },

    SET_ALL_STATUS(state, status) {
        state.fetchAllStatus = status;
    },

    SET_CURRENT_STATUS(state, status) {
        state.fetchCurrentStatus = status;
        state.validationErrors = {};
    },

    SET_CURRENT_ERROR(state, errors) {
        state.fetchCurrentStatus = fetchStatus.ERROR;
        state.validationErrors = errors;
    },
};
