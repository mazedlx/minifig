<template>
    <div v-if="loaded" class="col-md-6">
        <div class="card">
          <img v-if="minifig.images.length" class="card-img-top" :src="minifig.images[0].filename" :alt="minifig.name">

          <h4 class="card-header">
            {{ minifig.name }} <router-link :to="`/minifigs/${minifig.id}/edit`" class="btn btn-default">Edit</router-link>
          </h4>
          <div class="card-body">

              <p class="card-text">Belongs to <router-link :to="`/sets/${minifig.set_id}`">{{ minifig.setName }}</router-link>.</p>

              <p class="card-text">
                  <img v-for="image in minifig.images" :key="image.id" :src="image.filename" class="rounded" width="200px">
              </p>
          </div>
      </div>
  </div>
</template>
<script>
export default {
    data() {
        return {
            loaded: false,
            minifig: {},
        };
    },

    mounted() {
        axios.get(`/api/minifigs/${this.$route.params.id}`).then((response) => {
            this.minifig = response.data;
            this.loaded = true;
        });
    },
};
</script>
