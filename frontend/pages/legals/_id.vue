<template>
    <div>
        <page-heading title="Редактирование организации"></page-heading>
        <b-card>
            <legal-form> </legal-form>
        </b-card>
    </div>
</template>

<script>
import LegalForm from '@components/Legal/LegalForm.vue';

export default {
    components: { LegalForm },

    async fetch({ store, route }) {
        await store.dispatch('legals/GET', route.params.id);
    },
    computed: {
        legal: {
            get() {
                return this.$store.state.legals.current;
            },
            set(value) {
                return this.$store.dispatch('legals/UPDATE', value);
            },
        },
    },
};
</script>

<style lang="scss" scoped></style>
