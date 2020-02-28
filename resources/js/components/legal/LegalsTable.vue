<template>
    <b-table-simple caption-top small>
        <b-thead>
            <b-tr>
                <b-th>Инн</b-th>
                <b-th>Наименование</b-th>
                <b-th>Адрес</b-th>
                <b-th>Подписант</b-th>
            </b-tr>
        </b-thead>
        <b-tbody>
            <b-tr v-for="legal in legals" :key="legal.id">
                <b-td>{{ legal.inn }}</b-td>
                <b-td>{{ legal.name }}</b-td>
                <b-td>{{ legal.address }}</b-td>
                <b-td>{{ legal.signer && legal.signer.name }}</b-td>
            </b-tr>
        </b-tbody>
    </b-table-simple>
</template>

<script>
export default {
    props: {
        legals: Array,
    },

    methods: {},
};
</script>
