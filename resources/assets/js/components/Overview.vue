    <template>
    <div v-if="loaded" class="row d-flex justify-content-center">
        <div class="col-md-4">
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
        <div class="col-md-4">
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
            errors: [],
        };
    },

    methods: {
        getLatestMinifig: function () {
            return axios
                .get('/api/minifigs/latest')
                .then((response) => {
                    this.latestMinifig = response.data;
                })
                .catch((error) => {
                    this.errors = error.response.data.errors;
                });
        },

        getLatestSet: function () {
            return axios
                .get('/api/sets/latest')
                .then((response) => {
                    this.latestSet = response.data;
                })
                .catch((error) => {
                    this.errors = error.response.data.errors;
                });
        },
    },

    mounted() {
        Promise.all([
            this.getLatestMinifig(),
            this.getLatestSet(),
        ]).then(() => {
            this.loaded = true;
        }).catch((error) => {
            this.errors = error.response.data.errors;
        });
    },
};
</script>
