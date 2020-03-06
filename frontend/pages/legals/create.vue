<template>
    <div>
        <page-heading title="Добавить организацию"></page-heading>
        <b-card>
            <legal-form> </legal-form>
        </b-card>
    </div>
</template>

<script>
import LegalForm from '@components/Legal/LegalForm.vue';

export default {
    fetch({ store, route }) {
        const legal = route.query.legal ? JSON.parse(route.query.legal) : {};
        store.dispatch('legals/UPDATE', legal);
    },
    components: { LegalForm },
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
