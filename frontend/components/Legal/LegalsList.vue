<template>
    <b-list-group>
        <b-list-group-item button v-for="(legal, index) in legals" :key="index" @click="() => openLegalModal(legal)">
            <h6>{{ legal.name }}</h6>
            <small>{{ legal.address }}</small>
        </b-list-group-item>

        <b-modal v-model="modal" title="Добавить новую организацию" size="xl" hide-footer>
            <legal-form :legal="modalData"></legal-form>
        </b-modal>
    </b-list-group>
</template>

<script>
import LegalForm from './LegalForm';

export default {
    components: {
        LegalForm,
    },
    props: {
        legals: Array,
    },
    data() {
        return {
            modal: false,
            modalData: null,
        };
    },
    methods: {
        openLegalModal(legal) {
            this.modalData = legal;
            this.modal = true;
        },
    },
};
</script>

<style lang="scss" scoped></style>
