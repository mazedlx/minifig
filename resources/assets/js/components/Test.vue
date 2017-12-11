<template>
    <div>STUFF</div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            count: 0,
            m: [],
        };
    },

    mounted() {
        axios.get('/api/minifigs/latest').then((response) => {
            this.m = response.data;
        });
    },
};
</script>
