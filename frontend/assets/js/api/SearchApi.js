import ApiInstance from './ApiInstance';
import { handleRequest } from './request';

export class SearchApi extends ApiInstance {
    baseUrl = 'search';

    findLegal = async (params) => await handleRequest(this._connection.get(`${this.baseUrl}/legal`, { params }));
}
