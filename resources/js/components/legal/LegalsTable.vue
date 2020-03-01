<template>
    <div>
        <loading-wrapper :loading="loading">
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
                    <b-tr class="cursor-pointer" v-for="legal in legals" :key="legal.id" @click="() => showLegalForm(legal)">
                        <b-td>{{ legal.inn }}</b-td>
                        <b-td>{{ legal.name }}</b-td>
                        <b-td>
                            <small>{{ legal.address }}</small>
                        </b-td>
                        <b-td>{{ legal.signer && legal.signer.name }}</b-td>
                    </b-tr>
                </b-tbody>
            </b-table-simple>
        </loading-wrapper>

        <base-modal v-model="modal" title="Редактирование организации" size="xl">
            <legal-form @submit="handleSubmit()" :legal="modalData"></legal-form>
        </base-modal>
    </div>
</template>

<script>
import LegalForm from './LegalForm';
import BaseModal from '../partials/BaseModal';
import { LegalApi } from '@api/LegalApi';

export default {
    components: {
        LegalForm,
        BaseModal,
    },

    data() {
        return {
            legals: [],
            loading: false,
            modal: false,
            modalData: null,
        };
    },

    created() {
        this.legals = this.value;
    },

    props: {
        value: Array,
    },

    methods: {
        async showLegalForm(legal) {
            this.loading = true;
            this.modalData = await LegalApi.get(legal.id);
            this.modal = true;
            this.loading = false;
        },

        async handleSubmit() {
            this.modal = false;
            this.loading = true;
            this.legals = await LegalApi.getAll();
            this.loading = false;
        },
    },
};
</script>
