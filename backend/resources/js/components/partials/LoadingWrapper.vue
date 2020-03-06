<template>
    <div class="d-flex justify-content-center align-items-center position-relative">
        <div :class="{ 'opacity-50': loading }">
            <div v-if="loading" class="h-100 w-100 position-absolute"></div>
            <slot></slot>
        </div>
        <div v-if="loading" class="text-center position-absolute">
            <b-spinner v-bind="[...$attrs]"></b-spinner>
        </div>
    </div>
</template>

<script>
export default {
    name: 'LoadingWrapper',

    props: {
        loading: Boolean,
    },
};
</script>
