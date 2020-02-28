<template>
    <b-form @submit="submit">
        <b-row>
            <b-form-group label-size="sm" class="col-md-12" label="Полное наименование">
                <b-form-input size="sm" v-model="form.full_name" required></b-form-input>
            </b-form-group>
            <b-form-group label-size="sm" class="col-md-12" label="Наименование">
                <b-form-input size="sm" v-model="form.name" required></b-form-input>
            </b-form-group>
            <b-form-group label-size="sm" class="col-md-12" label="Адрес">
                <b-form-input size="sm" v-model="form.address" required></b-form-input>
            </b-form-group>

            <b-form-group label="ИНН" class="col-md-6" label-size="sm">
                <b-form-input size="sm" v-model="form.inn" required></b-form-input>
            </b-form-group>
            <b-form-group label="ОГРН" class="col-md-6" label-size="sm">
                <b-form-input size="sm" v-model="form.ogrn" required></b-form-input>
            </b-form-group>
            <b-form-group label="КПП" class="col-md-6" label-size="sm">
                <b-form-input size="sm" v-model="form.kpp"></b-form-input>
            </b-form-group>
            <b-form-group label="ОПП" class="col-md-6" label-size="sm">
                <b-form-input size="sm" v-model="form.opp"></b-form-input>
            </b-form-group>
        </b-row>

        <legal-contacts :contacts="form.contacts" @update="updateContacts"></legal-contacts>

        <b-button type="submit" variant="primary">Сохранить</b-button>
    </b-form>
</template>

<script>
import LegalContacts from './LegalContacts';
import { LegalApi } from '@api/LegalApi';

export default {
    components: {
        LegalContacts,
    },

    props: {
        legal: Object,
    },

    data() {
        return {
            form: null,
        };
    },

    created() {
        this.form = { ...this.legal };
    },

    methods: {
        updateContacts(contacts) {
            this.form.contacts = contacts;
        },

        async submit(event) {
            event.preventDefault();
            const response = await (this.form.id ? LegalApi.update(this.form) : LegalApi.create(this.form));
        },
    },
};
</script>

<style lang="scss" scoped></style>
