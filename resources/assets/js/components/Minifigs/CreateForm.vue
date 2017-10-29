<template>
    <div v-if="loaded" class="row">
        <form class="ml-auto mr-auto">
            <div class="form-group row">
                <label class="col-md-2 col-form-label" for="name">Name</label>
                <div class="col-md-10">
                    <input v-model="name" type="text" name="name" class="form-control" autofocus required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-2 col-form-label" for="set_id">Set</label>
                <div class="col-md-10">
                    <select v-model="set_id" name="set_id" class="form-control" required>
                        <option v-for="set in sets" :key="set.id" :value="set.id">{{ set.name }} ({{ set.number }})</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-2 col-form-label" for="files">Image(s)</label>
                <div class="col-md-10">
                    <input @change="handleFiles" type="file" name="files[]" accept="image/*" multiple="multiple" class="form-control">
                </div>
            </div>

            <div class="form-group row">
                <label for="" class="col-md-2 col-form-label sr-only">Uploaded Image(s)</label>
                <div class="col-md-10 ml-auto">
                    <ul class="list-unstyled" v-if="files.length">
                        <li v-for="file in files">
                            <img :src="file">
                        </li>
                    </ul>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-12">
                    <button @click="storeMinifig" class="btn btn-primary btn-block" type="button">Save it!</button>
                </div>
            </div>

            <div v-for="error in errors" class="alert alert-danger" role="alert">
                {{ error[0] }}
            </div>
        </form>
    </div>
</template>
<script>
export default {
    data() {
        return {
            loaded: false,
            sets: [],
            name: null,
            set_id: null,
            formData: new FormData(),
            files: [],
            errors: [],
        };
    },

    methods: {
        storeMinifig: function () {
            this.formData.append('name', this.name);
            this.formData.append('set_id', this.set_id);

            axios
                .post('/minifigs', this.formData)
                .then((response) => {
                    this.$router.replace(`/minifigs/${response.data.id}`);
                })
                .catch((error) => {
                    this.errors = error.response.data.errors;
                });
        },

        handleFiles: function (e) {
            if (! e.target.files.length) {
                return;
            }
            this.files = [];
            this.formData.delete('files[]');
            const files = Array.from(e.target.files);
            files.map((file) => {
                const reader = new FileReader();
                reader.readAsDataURL(file);
                reader.onload = (event) => {
                    const src = event.target.result;
                    this.files.push(src);
                    this.formData.append('files[]', file);
                };
            });
        },
    },

    mounted() {
        axios('/api/options/sets').then((response) => {
            this.sets = response.data;
            this.loaded = true;
        });
    },
};
</script>
