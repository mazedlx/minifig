<template>
    <div v-if="loaded" class="row">
        <form class="ml-auto mr-auto">
            <div class="form-group row">
                <label class="col-md-2 col-form-label" for="name">Name</label>
                <div class="col-md-10">
                    <input v-model="name" type="text" name="name" class="form-control" placeholder="Name" autofocus required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2 col-form-label" for="number">Number</label>
                <div class="col-md-10">
                    <input v-model="number" type="text" name="number" class="form-control" placeholder="Number" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2 col-form-label" for="file">Image</label>
                <div class="col-md-10">
                    <input @change="handleFile" type="file" name="file" class="form-control">
                </div>
            </div>

            <div class="form-group row">
                <label for="" class="col-md-2 col-form-label sr-only">Uploaded Image</label>
                <div class="col-md-10 ml-auto">
                    <img v-if="file" :src="file">
                </div>
            </div>

            <div class="form-group row">
                <label for="" class="col-md-2 col-form-label sr-only">Current Image</label>
                <div class="col-md-10 ml-auto">
                    <img v-if="set.filename" :src="set.filename">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-12">
                    <button @click="saveSet" class="btn btn-primary btn-block" type="button">Save it!</button>
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
            set: {},
            name: null,
            number: null,
            loaded: false,
            formData: new FormData(),
            errors: [],
            file: null,
        };
    },

    mounted() {
        axios
            .get(`/api/sets/${this.$route.params.id}`)
            .then((response) => {
                this.set = response.data;
                this.name = response.data.name;
                this.number = response.data.number;
                this.loaded = true;
            });
    },

    methods: {
        saveSet: function () {
            this.formData.append('name', this.name);
            this.formData.append('number', this.number);
            this.formData.append('_method', 'PATCH');

            axios
                .post(`/sets/${this.set.id}`, this.formData)
                .then((response) => {
                    this.$router.replace(`/sets/${this.set.id}`);
                })
                .catch((error) => {
                    this.errors = error.response.data.errors;
                });
        },

        handleFile: function (e) {
            if (! e.target.files.length) {
                return;
            }

            const file = e.target.files[0];
            const reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = (event) => {
                const src = event.target.result;
                this.formData.append('file', file);
                this.file = src;
            };
        },
    },
};
</script>
