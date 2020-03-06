<template>
    <b-navbar toggleable="lg" type="dark" variant="secondary">
        <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

        <b-collapse id="nav-collapse" is-nav>
            <b-navbar-nav>
                <b-nav-item href="/legals">Организации</b-nav-item>
            </b-navbar-nav>
        </b-collapse>
    </b-navbar>
</template>

<script>
export default {
    data() {
        return {
            drawer: null
        };
    }
};
</script>

<style lang="scss" scoped></style>
