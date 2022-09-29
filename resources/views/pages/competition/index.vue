<template>
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <div v-if="message_error != null" class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
        <span class="font-medium">Danger alert!</span> {{ message_error }}
      </div>
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <caption class="p-5 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
            Ligas de Fútbol
            <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Lista de todas las ligas de fúltbol alrededor del mundo.</p>
        </caption>
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    ID
                </th>
                <th scope="col" class="px-6 py-3">
                    Nombre
                </th>
                <th scope="col" class="px-6 py-3">
                    País
                </th>
                <th scope="col" class="px-6 py-3">
                    <span class="sr-only">Acciones</span>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="competition in competitions" :key="competition.id" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ competition.id }}
                </th>
                <td class="px-6 py-4">
                    {{ competition.name }}
                </td>
                <td class="px-6 py-4">
                    {{ competition.area['name'] }}
                </td>
                <td class="px-6 py-4 text-right">
                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Ver</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>

</template>
<script>
import Layout from '../../layouts/default.vue'
import axios from 'axios'

export default {
    layout: Layout,
    props: {
    },
    data() {
        return {
            competitions: null,
            message_error: null
        }
    },
    mounted() {
        axios.get('/api/competitions')
        .then((response) => {
            console.log(response);
            this.competitions = response.data.data;
        })
        .catch((error) => {
            // handle error
            // console.log(error)
            console.log(error.response.data.message);
            this.message_error = error.response.data.message;
        })
        .finally((response) => {
            // always executed
            // console.log(response);
        })
        ;
    }
}
</script>
