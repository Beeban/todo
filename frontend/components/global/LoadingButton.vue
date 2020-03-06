<template>
    <b-button v-bind="{ ...$attrs }" @click="() => $emit('click')">
        <b-spinner small v-if="loading"></b-spinner>
        <template v-else>
            <slot></slot>
        </template>
    </b-button>
</template>

<script>
export default {
    props: {
        loading: Boolean,
    },
};
</script>
