import { remapPagination } from '@utils/helpers';

const isPaginatedResponse = (response) => response.pagination && response.pagination.length;

export const handleRequest = async (response) => {
    const { data } = await response;

    if (isPaginatedResponse(data)) {
        return { data: data.payload, pagination: remapPagination(data.pagination) };
    }

    return data.payload;
};
