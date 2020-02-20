export const remapPagination = ({ perPage, ...pagination }) => ({
    rowsPerPage: perPage,
    ...pagination,
});
