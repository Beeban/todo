import { ApiInstance } from './ApiInstance';
import { handleRequest } from './request';
import { connection } from './connection';

class LegalApiInstance extends ApiInstance {
    baseUrl = 'legals';

    findLegal = async (params) => await handleRequest(connection.get(`${this.baseUrl}/find`, { params }));
}

export const LegalApi = new LegalApiInstance();
