<template>
    <div>
        <b-alert show variant="danger" v-for="(error, index) in errors" :key="index">
            <div v-for="(text, errorIndex) in error" :key="errorIndex">
                {{ text }}
            </div>
        </b-alert>
    </div>
</template>

<script>
export default {
    props: {
        errors: Object,
    },
};
</script>

<style lang="scss" scoped></style>
