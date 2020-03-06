import { isArray } from 'util';
import Vue from 'vue';

const BASE_TIMEOUT = 3000;

class ToastInstance {
    show(message, params) {
        const vm = new Vue();
        vm.$bvToast.toast(message, { toaster: 'b-toaster-bottom-full', solid: false, ...params });
    }

    alert(message, timeout = BASE_TIMEOUT) {
        this.show(message, {
            autoHideDelay: timeout,
            variant: 'warning',
            icon: 'warning',
        });
    }

    error(message, timeout = BASE_TIMEOUT) {
        const messages = isArray(message) ? message : [message];

        messages.forEach((message) => {
            this.show(message, {
                title: 'Error',
                autoHideDelay: timeout,
                variant: 'danger',
                icon: 'error',
            });
        });
    }

    success(message, timeout = BASE_TIMEOUT) {
        this.show(message, {
            title: 'Success',
            autoHideDelay: timeout,
            variant: 'success',
            icon: 'done',
        });
    }

    info(message, timeout = BASE_TIMEOUT) {
        this.show(message, {
            autoHideDelay: timeout,
            variant: 'info',
            icon: 'info',
        });
    }
}

export const Toast = new ToastInstance();
