import ApiInstance from './ApiInstance';
import { handleRequest } from './request';

export class LegalApi extends ApiInstance {
    baseUrl = 'legals';

    findLegal = async (params) => await handleRequest(this._connection.get(`${this.baseUrl}/find`, { params }));
}
