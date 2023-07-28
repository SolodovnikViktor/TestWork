<template>
    <div>привет</div>
    <button @click="logout">Выйти</button>
</template>

<script>
export default {
    data() {
        return {};
    },
    methods: {
        logout() {
            axios.post("/logout");
        },
    },
};
</script>
