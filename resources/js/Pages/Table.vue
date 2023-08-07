<template>
  <section class="p-5 flex justify-center flex-column">
    <div>
      <UButton @click.prevent="logout"> Выйти</UButton>
      <UButton @click.prevent="updateClients"> Изменить</UButton>
      <PaginationVue
        :page="page"
        :total-pages="totalPages"
        @page-number="numberCount"
      />
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
                    v-for="(client, index) in refPay"
                    :key="client.id"
                    class="border-b dark:border-neutral-500"
                  >
                    <td :class="classTd">{{ index + 1 }}</td>
                    <td :class="classTd">
                      <div>
                        <p>Офис: {{ client.manager.office }}</p>
                        <p>Менеджер: {{ client.manager.name }}</p>
                      </div>
                    </td>
                    <td :class="classTd">
                      <p v-if="client.lawyer.name != ''">
                        {{ client.lawyer.name }}
                      </p>
                      <p v-else>Не назначен</p>
                    </td>
                    <td :class="classTd">
                      {{ client.name }}
                    </td>
                    <td :class="classTd">
                      <p v-if="client">
                        {{ client.program_type }}
                      </p>
                      <p v-else>Не задана</p>
                    </td>
                    <td :class="classTd">
                      <p v-if="client">
                        {{ client.date_register }}
                      </p>
                      <p v-else>Не даты</p>
                    </td>
                    <td :class="classTd">
                      <p v-if="client">
                        {{ client.program_plan }}р / <br />
                        {{ client.program_price }}р
                      </p>
                      <p v-else>Не данных</p>
                    </td>
                    <td :class="classTd">
                      <p v-if="client">
                        {{ client.program_payment_per_month }}р
                      </p>
                      <p v-else>--</p>
                    </td>
                    <td :class="classTd">
                      <p v-for="remmitance in client.list_remmitances">
                        {{ remmitance.amount }}р
                      </p>
                    </td>
                    <td :class="classTd">
                      <p v-for="remmitance in client.list_remmitances">
                        {{ remmitance.payed_at }}
                      </p>
                    </td>
                    <td :class="classTd">
                      <p v-if="client">
                        {{ client.client_handover_date }}
                      </p>

                      <p v-else>--</p>
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
import PaginationVue from "../components/global/PaginationVue";
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

const refPay = ref(props.payPlanItem.data);
const page = props.filters.page;

let totalPages;

let payPlanItemData;
if (typeof props.payPlanItem.data === "object") {
  payPlanItemData = Object.keys(props.payPlanItem.data).length;
} else {
  payPlanItemData = props.payPlanItem.data.length;
}
totalPages = props.clients.length / payPlanItemData;

const numberCount = (count) => {
  Inertia.get("/table", { page: count });
};

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
