<template>
    <tr>
        <td>
            <router-link :to="`/sets/${set.id}`">{{ this.set.name }}</router-link>
        </td>
        <td>
            <router-link :to="`/sets/${set.id}`">{{ this.set.number }}</router-link>
        </td>
        <td>
            <router-link :to="`/sets/${set.id}`">
                <img v-if="this.set.filename" :src="`/storage/${this.set.filename}`" width="200px" class="rounded" :alt="this.set.name">
                <p v-else>No image</p>
            </router-link>
        </td>
    </tr>
</template>
<script>
export default {
    data() {
        return {

        };
    },

    props: {
        set: {
            type: Object,
            required: true,
        },
    },
};
</script>
