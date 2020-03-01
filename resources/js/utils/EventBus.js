import Vue from 'vue';

export const EventBus = new Vue({
    methods: {
        asyncEmit(eventName, value) {
            return new Promise((resolve, reject) => {
                this.$emit(eventName, value);
                this.$nextTick();
            });
        },
    },
});
