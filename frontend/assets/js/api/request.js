import { remapPagination } from '@utils/helpers';

const isPaginatedResponse = (response) => response.pagination && response.pagination.length;

export const handleRequest = async (response) => {
    try {
        const { data } = await response;

        if (isPaginatedResponse(data)) {
            return { payload: data.payload, pagination: remapPagination(data.pagination) };
        }

        return data;
    } catch (exception) {
        throw exception;
    }
};
