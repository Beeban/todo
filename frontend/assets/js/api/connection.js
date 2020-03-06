import axios from 'axios';
import { Toast } from '@utils/Toast';

const domain = process.env.MIX_API_DOMAIN;

export const connection = axios.create({
    //withCredentials: true,
    baseURL: ``,
    headers: {
        'X-Requested-With': 'XMLHttpRequest',
    },
});

connection.interceptors.response.use(
    (response) => {
        const { data } = response;

        if (data.success === false) {
            Toast.error(data.error && data.error.message);
            return Promise.reject();
        }

        if (data.message) {
            //Toast.success(data.message);
        }

        return response;
    },
    ({ response, message }) => {
        if (response.status === 401) {
            //redirectToAuth();
        }
        //console.log(message);
        Toast.error(message);
        return Promise.reject(response);
    }
);
