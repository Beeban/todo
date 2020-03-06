<template>
    <b-modal v-bind="{ ...$attrs, ...$props }" v-model="state" hide-footer>
        <slot></slot>
    </b-modal>
</template>

<script>
export default {
    name: 'BaseModel',

    props: {
        value: Boolean,
    },

    computed: {
        state: {
            get() {
                return this.value;
            },
            set(value) {
                this.$emit('input', value);
            },
        },
    },

    methods: {
        submit(callback) {
            callback();
        },
    },
};
</script>

<style lang="scss" scoped></style>
