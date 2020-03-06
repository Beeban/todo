<template>
    <b-card no-body class="mb-4">
        <b-table-simple hover borderless striped class="m-0">
            <b-thead>
                <b-tr>
                    <b-th>Инн</b-th>
                    <b-th>Наименование</b-th>
                    <b-th>Адрес</b-th>
                    <b-th>Подписант</b-th>
                </b-tr>
            </b-thead>
            <b-tbody>
                <b-tr class="cursor-pointer" v-for="legal in legals" :key="legal.id" @click="() => $emit('click', legal)">
                    <b-td>{{ legal.inn }}</b-td>
                    <b-td>{{ legal.name }}</b-td>
                    <b-td>
                        <small>{{ legal.address }}</small>
                    </b-td>
                    <b-td>{{ legal.signer && legal.signer.name }}</b-td>
                </b-tr>
            </b-tbody>
        </b-table-simple>
    </b-card>
</template>

<script>
import { LegalApi } from '@api/LegalApi';

export default {
    data() {
        return {
            legals: [],
        };
    },

    created() {
        this.legals = this.value;
    },

    props: {
        value: Array,
    },
};
</script>
