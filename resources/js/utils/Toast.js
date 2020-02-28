import { isArray } from 'util';

class ToastInstance {
    show(params) {
        Vue.$bvToast.toast(params);
    }

    alert(message, timeout = 3000) {
        this.show({
            timeout: timeout,
            message: message,
            color: 'warning',
            icon: 'warning',
        });
    }

    error(message, timeout = 3000) {
        const messages = isArray(message) ? message : [message];

        messages.forEach((message) => {
            this.show({
                timeout: timeout,
                message: message,
                color: 'negative',
                icon: 'error',
            });
        });
    }

    success(message, timeout = 3000) {
        this.show({
            timeout: timeout,
            message: message,
            color: 'positive',
            icon: 'done',
        });
    }

    info(message, timeout = 3000) {
        this.show({
            timeout: timeout,
            message: message,
            color: 'info',
            icon: 'info',
        });
    }
}

export const Toast = new ToastInstance();
