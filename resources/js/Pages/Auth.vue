<template>
  <section class="p-5 flex justify-center flex-column">
    <div class="rounded-5 mb-5">
      <div class="w-100 p-4 d-flex justify-content-center pb-4">
        <div class="w-full max-w-xs">
          <form
            @submit.prevent="form.post('/login')"
            class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 dark:bg-slate-300"
          >
            <div class="mb-4">
              <label
                class="block text-gray-700 text-sm font-bold mb-2"
                for="email"
              >
                Email
              </label>
              <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="email"
                type="text"
                placeholder="Email"
                v-model="form.email"
              />
              <div v-if="form.errors.email">
                {{ form.errors.email }}
              </div>
            </div>
            <div class="mb-6">
              <label
                class="block text-gray-700 text-sm font-bold mb-2"
                for="password"
              >
                Password
              </label>
              <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                id="password"
                type="password"
                placeholder="******************"
                v-model="form.password"
              />
              <div v-if="form.errors.password">
                {{ form.errors.password }}
              </div>
            </div>
            <div class="flex items-center justify-between">
              <UButton type="submit" :disabled="form.processing">
                Войти</UButton
              >
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup>
import { useForm } from "@inertiajs/inertia-vue3";
import UButton from "../components/global/UButton";

const form = useForm({
  email: null,
  password: null,
});
</script>
