<template>
    <div>
        <navbar></navbar>
        <div class="container-fluid mt-2">
            <nuxt />
        </div>
    </div>
</template>

<script>
import Navbar from './partials/Navbar';
export default {
    components: { Navbar },
};
</script>
