<template>
    <div v-if="loaded" class="col-md-6">
        <div class="card">
            <img v-if="set.filename" class="card-img-top" :src="`/storage/${set.filename}`" :alt="set.name">
            <h4 class="card-header">
                {{ set.name }} ({{ set.number }}) <router-link :to="`/sets/${set.id}/edit`" class="btn btn-default">Edit</router-link>
            </h4>
            <div class="card-body">
                <p class="card-text">Minifigs belonging to this set:</p>
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Image</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-if="set.minifigs.length" v-for="minifig in set.minifigs" :key="minifig.id">
                            <td>
                                <router-link :to="`/minifigs/${minifig.id}`">{{ minifig.name }}</router-link>
                            </td>
                            <td>
                                <router-link :to="`/minifigs/${minifig.id}`">
                                    <img
                                        v-if="minifig.images.length"
                                        :src="`/storage/${minifig.images[0].filename}`"
                                        class="rounded"
                                        width="150px"
                                        :alt="minifig.name"
                                    >
                                    <p v-else>No image</p>
                                </router-link>
                            </td>
                        </tr>
                        <tr v-else>
                            <td colspan="2">No sets belonging to this set.</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            loaded: false,
            set: {},
        };
    },

    mounted() {
        this.$http.get(`/api/sets/${this.$route.params.id}`).then((response) => {
            this.set = response.data;
            this.loaded = true;
        });
    },
};
</script>
