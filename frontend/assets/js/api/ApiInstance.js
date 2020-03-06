import { connection } from '@api/connection';
import { handleRequest } from '@api/request';

export class ApiInstance {
    baseUrl;

    getAll = async (params = {}) => handleRequest(connection.get(`${this.baseUrl}`, { params }));

    get = async (id, params = {}) => handleRequest(connection.get(`${this.baseUrl}/${id}`, { params }));

    create = async (model) => handleRequest(connection.post(`${this.baseUrl}`, model));

    update = async (model) => handleRequest(connection.patch(`${this.baseUrl}/${model.id}`, model));

    delete = async ({ id }) => handleRequest(connection.delete(`${this.baseUrl}/${id}`));
}