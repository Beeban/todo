<template>
    <b-card title="Поиск">
        <b-row>
            <base-input label="Инн" class="col-3" :value="filter.inn" @change="(inn) => updateFilter({ inn })"></base-input>
            <base-input label="Наименование" class="col-3" :value="filter.name" @change="(name) => updateFilter({ name })"></base-input>
            <base-input label="Адрес" class="col-3" :value="filter.address" @change="(address) => updateFilter({ address })"></base-input>
            <base-input label="Подписант" class="col-3" :value="filter.signer" @change="(signer) => updateFilter({ signer })"></base-input>
        </b-row>
        <loading-button variant="info" :loading="pending" @click="applyFilter" class="b-col float-right">Применить</loading-button>
        <b-button variant="light" @click="clearFilter" class="b-col float-right mr-3">Очистить</b-button>
    </b-card>
</template>

<script>
export default {
    data() {
        return {
            pending: false,
        };
    },

    computed: {
        filter() {
            return this.$store.state.legals.filter;
        },
    },

    methods: {
        async clearFilter() {
            this.pending = true;
            this.$store.dispatch('legals/SET_FILTER', {});
            await this.$store.dispatch('legals/GET_ALL', true);
            this.pending = false;
        },
        updateFilter(value) {
            this.$store.dispatch('legals/SET_FILTER', { ...this.filter, ...value });
        },
        async applyFilter() {
            this.pending = true;
            await this.$store.dispatch('legals/GET_ALL', true);
            this.pending = false;
        },
    },
};
</script>
