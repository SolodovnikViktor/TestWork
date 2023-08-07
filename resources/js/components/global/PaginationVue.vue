import { defineProps, ref } from 'vue';
<template>
  <div class="flex justify-center text-bm font-light dark:text-slate-300">
    <button class="p-2" @click="prevPage">Назад</button>
    <ul class="flex p-2">
      <li v-for="(p, index) in element" :key="index" class="p-3">
        <a
          @click="pageNumber = p"
          :class="{ 'text-amber-600': p == pageNumber }"
        >
          {{ p }}
        </a>
      </li>
    </ul>
    <button @click="nextPage">Вперёд</button>
  </div>
</template>

<script setup>
import { defineProps, ref, watch, defineEmits } from "vue";
const props = defineProps({
  totalPages: Number,
  page: String,
});
const emit = defineEmits(["pageNumber"]);
const totalPages = props.totalPages;
const element = [];
let pageNumber;
if (!props.page) {
  pageNumber = ref(1);
} else {
  pageNumber = ref(props.page);
}

for (let i = 1; i <= totalPages; i++) {
  element.push(i);
}
function prevPage() {
  if (pageNumber.value > 1) {
    pageNumber.value--;
  }
}
function nextPage() {
  if (pageNumber.value < totalPages) {
    pageNumber.value++;
  }
}

watch(pageNumber, (newPageNumber) => {
  emit("pageNumber", newPageNumber);
});
</script>
