<template>
    <b-form @submit.prevent="submit">
        <b-row>
            <base-input
                label="Полное наименование"
                class="col-md-12"
                :value="legal.full_name"
                @change="(full_name) => updateStore({ full_name })"
                required
            ></base-input>

            <base-input
                label="Наименование"
                class="col-md-12"
                size="sm"
                :value="legal.name"
                @change="(name) => updateStore({ name })"
                required
            ></base-input>

            <base-input
                label="Адрес"
                class="col-md-12"
                size="sm"
                :value="legal.address"
                @change="(address) => updateStore({ address })"
                required
            ></base-input>

            <base-input
                label="ИНН"
                class="col-md-6"
                size="sm"
                :value="legal.inn"
                @change="(inn) => updateStore({ inn })"
                required
            ></base-input>

            <base-input
                label="ОГРН"
                class="col-md-6"
                size="sm"
                :value="legal.ogrn"
                @change="(ogrn) => updateStore({ ogrn })"
                required
            ></base-input>

            <base-input label="КПП" class="col-md-6" size="sm" :value="legal.kpp" @change="(kpp) => updateStore({ kpp })"></base-input>

            <base-input label="ОПП" class="col-md-6" size="sm" :value="legal.opp" @change="(opp) => updateStore({ opp })"></base-input>
        </b-row>

        <legal-contacts :contacts="legal.contacts" @change="(contacts) => updateStore({ contacts })"></legal-contacts>

        <hr />
        <loading-button :loading="pending" type="submit" variant="primary" class="float-right">Сохранить</loading-button>
    </b-form>
</template>

<script>
import LegalContacts from './LegalContacts';
import { LegalApi } from '@api/LegalApi';

export default {
    components: {
        LegalContacts,
    },

    async fetch({ store, route }) {
        await store.dispatch('legals/GET', route.params.id);
    },

    computed: {
        legal() {
            return this.$store.state.legals.current;
        },
    },

    data() {
        return {
            pending: false,
        };
    },

    methods: {
        updateStore(value) {
            this.$store.dispatch('legals/UPDATE', { ...this.legal, ...value });
        },

        async submit(event) {
            this.pending = true;
            await this.$store.dispatch('legals/SUBMIT');
            this.$router.push('/legals');
            this.pending = false;
        },
    },
};
</script>

<style lang="scss" scoped></style>
