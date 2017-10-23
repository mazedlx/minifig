<template>
    <div>
        <router-link to="/minifigs/create" class="btn btn-primary">
            <i class="fa fa-fw fa-plus"></i> Minifig
        </router-link>
        <table v-if="loaded" class="table table-striped table-sm mt-3">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Set</th>
                    <th>Image</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="minifig in minifigs" :key="minifig.id" is="table-item" :minifig="minifig"></tr>
            </tbody>
        </table>
    </div>
</template>
<script>
import TableItem from './TableItem.vue';

export default {
    components: {
        TableItem,
    },

    data() {
        return {
            loaded: false,
            minifigs: [],
        };
    },

    mounted() {
        this.$http.get('/api/minifigs').then((response) => {
            this.minifigs = response.data.data;
            this.loaded = true;
        });
    },
};
</script>
