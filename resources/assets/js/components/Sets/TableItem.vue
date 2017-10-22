<template>
    <tr>
        <td>
            <a :href="this.url">{{ this.set.name }}</a>
        </td>
        <td>
            <a :href="this.url">{{ this.set.number }}</a>
        </td>
        <td>
            <a :href="this.url">
                <img v-if="this.set.filename" :src="this.set.filename" width="200px" class="rounded" :alt="this.set.name">
                <p v-else>No image</p>
            </a>
        </td>
    </tr>
</template>
<script>
export default {
    data() {
        return {
            url: `/sets/${this.set.id}`,
        };
    },

    props: {
        set: Object,
    },
};
</script>
