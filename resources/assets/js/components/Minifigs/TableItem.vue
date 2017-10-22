<template>
    <tr>
        <td>
            <a :href="this.url">{{ this.minifig.name }}</a>
        </td>
        <td>
            <a :href="this.url">{{ this.minifig.setName }} ({{ this.minifig.setNumber }})</a>
        </td>
        <td>
            <a :href="this.url">
                <img v-if="this.image" :src="this.image" width="200px" class="rounded" :alt="this.minifig.name">
                <p v-else>No image</p>
            </a>
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
        minifig: Object,
    },
};
</script>
