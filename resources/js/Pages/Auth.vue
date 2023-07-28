<template>
    <section
        class="p-5 d-flex justify-content-center flex-column align-items-center"
    >
        <h3>Авторизация</h3>
        <div class="bg-white border rounded-5 mb-5">
            <div class="w-100 p-4 d-flex justify-content-center pb-4">
                <!-- @submit.prevent="formSubmit" -->
                <!-- method="POST" action="{{ route('/login') }}" -->
                <form @submit.prevent="formSubmit">
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form1Example1"
                            >Email</label
                        >
                        <input
                            v-model="form.email"
                            type="email"
                            name="email"
                            id="form1Example1"
                            class="form-control"
                        />
                        <!-- @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror -->
                    </div>
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form1Example2"
                            >Пароль</label
                        >
                        <input
                            v-model="form.password"
                            type="password"
                            name="password"
                            id="form1Example2"
                            class="form-control"
                        />
                        <!-- @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror -->
                    </div>
                    <div class="d-flex">
                        <button
                            type="submit"
                            class="btn btn-primary btn-block me-5"
                        >
                            Войти
                        </button>
                        <!-- <div v-if="loading">Загрузка...</div> -->
                    </div>
                </form>
            </div>
        </div>
        <!-- <div v-if="errored">
            <p>Ошибка, что-то пошло не так.</p>
        </div> -->
    </section>
</template>

<script>
import { reactive } from "vue";
import { Inertia } from "@inertiajs/inertia";

export default {
    setup() {
        const form = reactive({
            email: null,
            password: null,
        });
        function formSubmit() {
            Inertia.post("/login", form);
        }
        return { form, submit };
    },
};
</script>
