<template>
    <div>
        <b-table-simple hover bordered borderless striped>
            <b-thead>
                <b-tr>
                    <b-th>Инн</b-th>
                    <b-th>Наименование</b-th>
                    <b-th>Адрес</b-th>
                    <b-th>Подписант</b-th>
                </b-tr>
            </b-thead>
            <b-tbody>
                <b-tr v-for="legal in legals" :key="legal.id" @click="() => showLegalForm(legal)">
                    <b-td>{{ legal.inn }}</b-td>
                    <b-td>{{ legal.name }}</b-td>
                    <b-td
                        ><small>{{ legal.address }}</small></b-td
                    >
                    <b-td>{{ legal.signer && legal.signer.name }}</b-td>
                </b-tr>
            </b-tbody>
        </b-table-simple>

        <b-modal v-model="modal" title="Редактирование организации" size="xl">
            <legal-form :legal="modalData"></legal-form>
        </b-modal>
    </div>
</template>

<script>
import LegalForm from './LegalForm';
import { LegalApi } from '@api/LegalApi';

export default {
    components: {
        LegalForm,
    },

    data() {
        return {
            loading: false,
            modal: false,
            modalData: false,
        };
    },

    props: {
        legals: Array,
    },

    methods: {
        async showLegalForm(legal) {
            this.loading = true;
            this.modalData = await LegalApi.get(legal.id);
            this.modal = true;
            this.loading = false;
        },
    },
};
</script>
