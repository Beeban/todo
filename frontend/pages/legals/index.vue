<template>
    <div>
        <page-heading title="Организации"></page-heading>
        <legal-search-form class="mb-4" @select="createLegal"></legal-search-form>
        <legal-filter class="mb-4"></legal-filter>
        <legals-table :value="legals" @click="(legal) => $router.push('/legals/' + legal.id)"></legals-table>
    </div>
</template>

<script>
import LegalFilter from '@components/Legal/LegalFilter.vue';
import LegalsTable from '@components/Legal/LegalsTable.vue';
import LegalSearchForm from '@components/Legal/LegalSearchForm.vue';

export default {
    async fetch({ store }) {
        await store.dispatch('legals/GET_ALL');
    },

    computed: {
        legals() {
            return this.$store.state.legals.all;
        },
    },

    components: { LegalSearchForm, LegalsTable, LegalFilter },

    methods: {
        createLegal(legal) {
            this.$router.push({ path: '/legals/create', query: { legal: JSON.stringify(legal) } });
        },
    },
};
</script>

<style lang="scss" scoped></style>
