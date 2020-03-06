<template>
    <b-form-group label-size="sm" :label="smartLabel">
        <b-input
            @change="(value) => $emit('change', value)"
            :class="{ 'bg-grey-3': disable, 'text-black': disable }"
            v-bind="{ ...$attrs, ...$props }"
        ></b-input>
    </b-form-group>
</template>

<script>
export default {
    props: {
        disable: Boolean,
        required: Boolean,
        label: String,
        value: [String, Number],
    },
    computed: {
        smartLabel() {
            const label = this.label + (this.required ? ' *' : '');
            return this.label && label;
        },
    },
};
</script>
