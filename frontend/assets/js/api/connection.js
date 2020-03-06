export default function({ $axios, app }) {
    const API_URL = process.env.API_DOMAIN + '/' + process.env.API_ENDPOINT;

    $axios.setHeader('X-Requested-With', 'XMLHttpRequest');
    $axios.setBaseURL(API_URL);

    $axios.onResponse((response) => {
        const { data } = response;

        if (data.success === false) {
            app.$toast.error(data.error && data.error.message);
            return Promise.reject();
        }

        if (data.message) {
            app.$toast.success(data.message);
        }

        return response;
    });

    $axios.onError(({ response, message }) => {
        if (response.status === 401) {
            //redirectToAuth();
        }
    });
}
