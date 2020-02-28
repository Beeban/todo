<template>
    <b-row>
        <b-input-group prepend="Добавить" class="mt-3">
            <b-form-input
                autocomplete="on"
                v-model="query"
                name="search-legal"
                type="text"
                @keyup.enter="findLegal"
                placeholder="введите ИНН или ОГРН"
            ></b-form-input>
            <b-input-group-append>
                <b-button :disabled="!query" @click="findLegal" variant="primary ">
                    <b-spinner small v-if="loading"></b-spinner>
                    <b-icon v-else icon="search"></b-icon>
                </b-button>
            </b-input-group-append>
        </b-input-group>

        <b-modal v-model="modal" title="Список организаций" size="lg" hide-footer>
            <legals-list :legals="legals"></legals-list>
        </b-modal>
    </b-row>
</template>

<script>
import { LegalApi } from '@api/LegalApi';
import LegalsList from './LegalsList';

export default {
    components: {
        LegalsList,
    },

    data() {
        return {
            query: '',
            modal: false,
            legals: [],
            loading: false,
        };
    },

    methods: {
        async findLegal() {
            this.loading = true;
            try {
                const legals = await LegalApi.findLegal({ query: this.query });
                this.legals = legals;
                this.modal = true;
            } catch (e) {
                console.log(e);
            }
            this.loading = false;
        },
    },
};
</script>

<style lang="scss" scoped></style>
