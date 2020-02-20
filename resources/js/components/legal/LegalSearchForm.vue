<template>
    <b-row>
        <b-input-group prepend="ИНН" class="mt-3">
            <b-form-input v-model="query"></b-form-input>
            <b-input-group-append>
                <b-button @click="findLegal" variant="info">Найти</b-button>
            </b-input-group-append>
        </b-input-group>
    </b-row>
</template>

<script>
import { LegalApi } from '@api/LegalApi';

export default {
    data() {
        return {
            query: '',
        };
    },

    methods: {
        findLegal() {
            LegalApi.findLegal({query: this.query});
        },
    },
};
</script>

<style lang="scss" scoped></style>
