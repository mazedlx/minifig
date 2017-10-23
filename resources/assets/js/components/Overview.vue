    <template>
    <div v-if="loaded" class="row">
        <div class="col-md-6">
            <div class="card">
                <img v-if="latestMinifig.images.length" class="card-img-top" :src="`/storage/${latestMinifig.images[0].filename}`" :alt="latestMinifig.name">
                <div class="card-header">
                    Latest Minifig
                </div>
                <div class="card-body">
                    <h4 class="card-title">{{ latestMinifig.name }}</h4>
                    <router-link :to="`/minifigs/${latestMinifig.id}`" class="btn btn-primary">Show {{ latestMinifig.name }}</router-link>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <img v-if="latestSet.filename" class="card-img-top" :src="`/storage/${latestSet.filename}`" :alt="latestSet.name">
                <div class="card-header">
                    Latest Set
                </div>

                <div class="card-body">
                    <h4 class="card-title">{{ latestSet.name }}</h4>
                    <router-link :to="`/sets/${latestSet.id}`" class="btn btn-primary">Show {{ latestSet.name }}</router-link>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            latestSet: {},
            latestMinifig: {},
            loaded: false,
        };
    },

    mounted() {
        this.$http
            .all([
                this.$http.get('/api/minifigs/latest').then(response => {
                    this.latestMinifig = response.data;
                }),
                this.$http.get('/api/sets/latest').then(response => {
                    this.latestSet = response.data;
                }),
            ]).then(() => {
                this.loaded = true;
            });
    },
};
</script>
