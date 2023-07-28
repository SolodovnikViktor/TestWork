<template>
    <section
        class="p-5 d-flex justify-content-center flex-column align-items-center"
    >
        <div class="bg-white border rounded-5 mb-5">
            <div class="w-100 p-4 d-flex justify-content-center pb-4">
                <form @submit.prevent="formSubmit">
                    <div class="form-outline mb-4">
                        <input
                            v-model="email"
                            type="login"
                            id="form1Example1"
                            class="form-control"
                        />
                        <label class="form-label" for="form1Example1"
                            >Логин</label
                        >
                    </div>
                    <div class="form-outline mb-4">
                        <input
                            v-model="password"
                            type="password"
                            id="form1Example2"
                            class="form-control"
                        />
                        <label class="form-label" for="form1Example2"
                            >Пароль</label
                        >
                    </div>
                    <div class="d-flex">
                        <button
                            type="submit"
                            class="btn btn-primary btn-block me-5"
                        >
                            Войти
                        </button>
                        <div v-if="loading">Загрузка...</div>
                    </div>
                </form>
            </div>
        </div>
        <div v-if="errored">
            <p>
                We're sorry, we're not able to retrieve this information at the
                moment, please try back later
            </p>
        </div>
    </section>
</template>

<script>
export default {
    data() {
        return {
            info: null,
            loading: true,
            errored: true,
            email: "",
            password: "",
        };
    },
    methods: {
        formSubmit() {
            let data = {
                email: this.email,
                password: this.password,
            };
            axios
                .post("/login?", { data })
                .then((response) => (this.info = response))
                .catch((error) => {
                    console.log(error);
                    this.errored = true;
                })
                .finally(() => (this.loading = false));
        },
    },
};
</script>
