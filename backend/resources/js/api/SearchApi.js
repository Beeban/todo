import { ApiInstance } from './ApiInstance';
import { handleRequest } from './request';
import { connection } from './connection';

class SearchApiInstance extends ApiInstance {
    baseUrl = 'search';

    findLegal = async (params) => await handleRequest(connection.get(`${this.baseUrl}/legal`, { params }));
}

export const SearchApi = new SearchApiInstance();
