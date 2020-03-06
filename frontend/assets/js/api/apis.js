import { LegalApi } from './LegalApi';
import { SearchApi } from './SearchApi';

export default ({ $axios }, inject) => {
    const apis = {
        legals: new LegalApi($axios),
        search: new SearchApi($axios),
    };

    inject('api', apis);
};
