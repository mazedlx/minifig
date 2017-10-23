<template>
    <form class="ml-auto mr-auto col-md-4">
        <div class="form-group row">
            <label class="sr-only" for="email">Email</label>
            <div class="col-md-12">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-fw fa-envelope-o"></i></span>
                    <input v-model="email" type="email" class="form-control" name="email" placeholder="Email" autofocus required>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label class="sr-only" for="password">Password</label>
            <div class="col-md-12">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-fw fa-lock"></i></span>
                    <input v-model="password" type="password" class="form-control" name="password" placeholder="Password" required>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-12">
                <button @click="login" type="button" class="btn btn-primary btn-block">Login</button>
            </div>
        </div>

        <div v-for="error in errors" class="alert alert-danger" role="alert">
            {{ error[0] }}
        </div>
    </form>
</template>
<script>
export default {
    data() {
        return {
            email: null,
            password: null,
            errors: [],
        };
    },

    methods: {
        login: function () {
            this.$http
                .post('/login', { email: this.email, password: this.password })
                .then((response) => {
                    this.$router.replace('/');
                })
                .catch((error) => {
                    this.errors = error.response.data.errors;
                });
        },
    },
};
</script>
