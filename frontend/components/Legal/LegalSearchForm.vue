<template>
    <div>
        <b-input-group class="mt-3">
            <b-input-group-prepend>
                <b-button :disabled="!legals.length" @click="popover = !popover" variant="success">Добавить</b-button>
            </b-input-group-prepend>

            <b-form-input
                autocomplete="on"
                v-model="query"
                name="search-legal"
                type="text"
                @keyup.enter="findLegal"
                placeholder="введите ИНН или ОГРН"
            ></b-form-input>

            <b-input-group-append>
                <loading-button :loading="pending" :disabled="!query" @click="findLegal" variant="primary ">
                    <b-icon icon="search"></b-icon>
                </loading-button>
            </b-input-group-append>
        </b-input-group>

        <b-card no-body v-if="popover" inline class="position-absolute zindex-dropdown">
            <b-list-group>
                <b-list-group-item button v-for="(legal, index) in legals" :key="index" @click="() => handleClick(legal)">
                    <h6>{{ legal.name }}</h6>
                    <small>{{ legal.address }}</small>
                </b-list-group-item>
            </b-list-group>
        </b-card>
    </div>
</template>

<script>
export default {
    data() {
        return {
            query: '',
            popover: false,
            legals: [],
            pending: false,
        };
    },

    methods: {
        async findLegal() {
            this.pending = true;
            try {
                const { payload } = await this.$api.search.findLegal({ query: this.query });
                this.legals = payload;
                this.popover = true;
            } catch (e) {
                //console.log(e);
            }
            this.pending = false;
        },
        handleClick(legal) {
            this.popover = false;
            this.$emit('select', legal);
        },
    },
};
</script>
