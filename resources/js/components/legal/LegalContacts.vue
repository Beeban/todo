<template>
    <b-table-simple caption-top small>
        <caption>
            <b-row class="justify-content-between">
                Контакты
                <b-button class="pull-right light" size="sm" @click="addContact">Добавить</b-button>
                
            </b-row>
        </caption>
        <b-thead>
            <b-tr>
                <b-th>Имя</b-th>
                <b-th>Должность</b-th>
                <b-th>Телефон</b-th>
                <b-th>Почта</b-th>
                <b-th>Подписант</b-th>
            </b-tr>
        </b-thead>
        <b-tbody>
            <b-tr v-for="(contact, index) in contacts" :key="index">
                <b-td>
                    <b-input size="sm" :value="contact.name" @input="(name) => updateValue({ name }, index)"></b-input>
                </b-td>
                <b-td>
                    <b-input size="sm" :value="contact.position" @input="(position) => updateValue({ position }, index)"></b-input>
                </b-td>
                <b-td>
                    <b-input size="sm" :value="contact.phone" @input="(phone) => updateValue({ phone }, index)"></b-input>
                </b-td>
                <b-td>
                    <b-input size="sm" :value="contact.email" @input="(name) => updateValue({ name }, index)"></b-input>
                </b-td>
                <b-td><b-checkbox></b-checkbox></b-td>
            </b-tr>
        </b-tbody>
    </b-table-simple>
</template>

<script>
const emptyContact = {
    name: null,
    position: null,
    phone: null,
    email: null,
};

export default {
    props: {
        contacts: Array,
    },

    methods: {
        updateValue(value, index) {
            const contacts = this.contacts.map((contact, contactIndex) => (contactIndex === index ? { ...contact, ...value } : contact));
            this.$emit('upate', contacts);
        },

        addContact() {
            const contacts = [...this.contacts, emptyContact];
            this.$emit('upate', contacts);
        },
    },
};
</script>
