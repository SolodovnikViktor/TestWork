<template>
  <section class="p-5 flex justify-center flex-column">
    <div>
      <UButton @click.prevent="logout(arrClients, arrPay)"> Выйти</UButton>
      <UButton @click.prevent="updateClients"> Изменить</UButton>

      <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
            <div class="overflow-hidden">
              <table
                class="table-fixed min-w-full border text-center text-sm font-light dark:border-neutral-500"
              >
                <thead
                  class="border-b font-medium dark:border-neutral-500 dark:text-slate-100"
                >
                  <tr>
                    <th
                      v-for="tableHeader in tableHeaders"
                      scope="col"
                      class="border-r px-6 py-2 dark:border-neutral-500"
                    >
                      {{ tableHeader }}
                    </th>
                  </tr>
                </thead>
                <tbody class="dark:text-slate-300">
                  <tr
                    v-for="client in clients"
                    class="border-b dark:border-neutral-500"
                  >
                    <td :class="classTd">1</td>
                    <td :class="classTd">
                      <p v-for="office in offices">Офис: {{ office }}</p>
                      <p v-for="manager in managers">Менеджер: {{ manager }}</p>
                    </td>
                    <td :class="classTd">
                      <p v-for="lawyer in lawyers">{{ lawyer }}</p>
                    </td>
                    <td :class="classTd">
                      {{ client.first_name }}
                      {{ client.last_name }}
                      {{ client.middle_name }}
                    </td>
                    <td :class="classTd">
                      <p v-for="lawyer in lawyers">{{ lawyer }}</p>
                    </td>
                    <td :class="classTd">
                      <p>
                        {{ user.date_registration }}
                      </p>
                    </td>
                    <td :class="classTd">
                      <p v-for="lawyer in lawyers">{{ lawyer }}</p>
                    </td>
                    <td :class="classTd">
                      <p v-for="lawyer in lawyers">{{ lawyer }}</p>
                    </td>
                    <td :class="classTd">
                      <p v-for="lawyer in lawyers">{{ lawyer }}</p>
                    </td>
                    <td :class="classTd">
                      <p v-for="lawyer in lawyers">{{ lawyer }}</p>
                    </td>
                    <td :class="classTd">
                      <p v-for="lawyer in lawyers">{{ lawyer }}</p>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup>
import { Inertia } from "@inertiajs/inertia";
import UButton from "../components/global/UButton";
import { defineProps, ref } from "vue";

const props = defineProps({
  offices: Object,
  managers: Object,
  lawyers: Object,
  clients: Object,
  payPlanItem: Object,
  filters: Object,
  user: Object,
  role: String,
});

const arrClients = ref(props.clients);
const arrPay = ref(props.payPlanItem.data);
console.log(arrPay._rawValue["1"].id);
console.log(arrPay);
console.log(arrClients);

function updateClients(arrClients, arrPay) {
  arrClients.forEach((elClient) => {
    arrPay.forEach((elPay) => {
      if (elClient.id == elPay.id) {
        elClient.push(elPay.name);
      }
    });
  });
}

const classTd = [
  "whitespace-nowrap",
  "border-r",
  "px-6",
  "py-4",
  "dark:border-neutral-500",
];

const tableHeaders = [
  "#",
  "Офис и менеджер",
  "Юрист (ФИО)",
  "ФИО Клиента",
  "Программа",
  "Дата регистрации",
  "План/Факт",
  "Стоимость программы",
  "Список платежей клиента",
  "Даты оплаты",
  "Дата передачи",
];

function logout() {
  Inertia.post("/logout");
}
</script>

<!-- <script>
import { Inertia } from "@inertiajs/inertia";
import UButton from "../components/global/UButton";

export default {
  components: {
    UButton: UButton,
  },
  data() {
    return {
      pay: this.payPlanItem.data,
      classTd: [
        "whitespace-nowrap",
        "border-r",
        "px-6",
        "py-4",
        "dark:border-neutral-500",
      ],

      tableHeaders: [
        "#",
        "Офис и менеджер",
        "Юрист (ФИО)",
        "ФИО Клиента",
        "Программа",
        "Дата регистрации",
        "План/Факт",
        "Стоимость программы",
        "Список платежей клиента",
        "Даты оплаты",
        "Дата передачи",
      ],
    };
  },
  props: {
    offices: Object,
    managers: Object,
    lawyers: Object,
    clients: Object,
    payPlanItem: Object,
    filters: Object,
    user: Object,
    role: String,
  },
  methods: {
    logout() {
      Inertia.post("/logout");
    },
  },
};
</script> -->
