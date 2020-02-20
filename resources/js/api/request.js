import { remapPagination } from '@utils/helpers';

const isPaginatedResponse = (response) => !isEmpty(response.pagination);

export const handleRequest = async (response) => {
    const { data } = await response;

    if (isPaginatedResponse(data)) {
        return { data: data.data, pagination: remapPagination(data.pagination) };
    }

    return data.data;
};
