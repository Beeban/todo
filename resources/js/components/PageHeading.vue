<template>
    <div>
        <h4>{{ title }}</h4>
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
