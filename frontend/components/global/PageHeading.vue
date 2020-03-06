<template>
    <div>
        <h2>{{ title }}</h2>
        <div v-if="$slots.default" class="float-right">
            <slot></slot>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        title: String,
    },
};
</script>
