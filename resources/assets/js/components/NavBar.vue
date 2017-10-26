<template>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">
            <img src="images/lego.png" alt="Lego">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"><router-link class="nav-link" to="/">Home</router-link></li>
                <li class="nav-item"><router-link class="nav-link" to="/minifigs">Minfigs</router-link></li>
                <li class="nav-item"><router-link class="nav-link" to="/sets">Sets</router-link></li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li v-if="isLoggedIn" class="nav-item"><a class="nav-link" href="/logout" @click="logout">Logout</a></li>
                <li v-else class="nav-item"><router-link class="nav-link" to="/login">Login</router-link></li>
            </ul>
        </div>
    </nav>
</template>
<script>
export default {
    data() {
        return {

        };
    },

    methods: {
        logout: function (e) {
            e.preventDefault();
            this.$http.post('/logout').then(() => {
                this.$store.commit('logOut');
                this.$router.push('/');
            });
        },
    },

    computed: {
        isLoggedIn: function () {
            return this.$store.state.loggedIn;
        },
    },
};
</script>
