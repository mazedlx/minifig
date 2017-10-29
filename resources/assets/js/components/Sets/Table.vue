<template>
    <div>
        <router-link to="/sets/create" class="btn btn-primary">
            <i class="fa fa-fw fa-plus"></i> Set
        </router-link>
        <table v-if="loaded" class="table table-striped table-sm mt-3">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Number</th>
                    <th>Image</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="set in sets" :key="set.id" is="table-item" :set="set"></tr>
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
            sets: [],
        };
    },

    mounted() {
        axios.get('/api/sets').then((response) => {
            this.sets = response.data.data;
            this.loaded = true;
        });
    },
};
</script>
