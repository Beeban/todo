import { handleRequest } from '@api/request';

export default class ApiInstance {
    baseUrl;
    _connection;

    constructor(connection, url = '') {
        if (url) {
            this.baseUrl = url;
        }
        this._connection = connection;
    }

    getAll = async (params = {}) => handleRequest(this._connection.get(`${this.baseUrl}`, { params }));

    get = async (id, params = {}) => handleRequest(this._connection.get(`${this.baseUrl}/${id}`, { params }));

    create = async (model) => handleRequest(this._connection.post(`${this.baseUrl}`, model));

    update = async (model) => handleRequest(this._connection.patch(`${this.baseUrl}/${model.id}`, model));

    delete = async ({ id }) => handleRequest(this._connection.delete(`${this.baseUrl}/${id}`));
}
