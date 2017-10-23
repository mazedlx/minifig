<template>
    <tr>
        <td>
            <router-link :to="`/minifigs/${minifig.id}`">{{ this.minifig.name }}</router-link>
        </td>
        <td>
            <router-link :to="`/sets/${minifig.set_id}`">{{ this.minifig.setName }} ({{ this.minifig.setNumber }})</router-link>
        </td>
        <td>
            <router-link :to="`/minifigs/${minifig.id}`">
                <img v-if="this.image" :src="`/storage/${this.image}`" width="200px" class="rounded" :alt="this.minifig.name">
                <p v-else>No image</p>
            </router-link>
        </td>
    </tr>
</template>
<script>
export default {
    data() {
        return {
            image: this.minifig.images.length ? this.minifig.images[0].filename : null,
            url: `/minifigs/${this.minifig.id}`,
        };
    },

    props: {
        minifig: {
            type: Object,
            required: true,
        },
    },
};
</script>
