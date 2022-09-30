<template>
    <div v-if="message_error != null" class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
        <span class="font-medium">Danger alert!</span> {{ message_error }}
      </div>
    <!-- {{ competition.teams }} -->
    <div class="grid grid-cols-3 gap-4 mt-3 mb-3 ml-2 mr-2">
        <div>
            <div class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <template v-if="competition">
                    <img class="rounded-t-lg" :src="competition.emblem" alt="" />
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Información</h5>
                    <p class="font-normal text-gray-700 dark:text-gray-400">ID: {{ competition.id }}</p>
                    <p class="font-normal text-gray-700 dark:text-gray-400">Nombre: {{ competition.name }}</p>
                    <p class="font-normal text-gray-700 dark:text-gray-400">Código: {{ competition.code }}</p>
                    <p class="font-normal text-gray-700 dark:text-gray-400">Tipo: {{ competition.type }}</p>
                </template>
            </div>
        </div>
        <table class="w-full col-span-2 text-sm text-left text-gray-500 dark:text-gray-400">
            <caption class="p-5 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                Equipos de Fútbol
                <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Lista de Equipos.</p>
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
                <tr v-for="team in teams" :key="team.id" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ team.id }}
                    </th>
                    <td class="px-6 py-4">
                        {{ team.name }}
                    </td>
                    <td class="px-6 py-4">
                        {{ team.area['name'] }}
                    </td>
                    <td class="px-6 py-4 text-right">
                        <button @click="downloadTeam(team.id)" type="button" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10"></path></svg>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
<script>
import Layout from '../../layouts/default.vue'
import axios from 'axios'
import { Notyf } from 'notyf';
import { Inertia } from '@inertiajs/inertia'

export default {
    layout: Layout,
    props: {
        competition_id: Number,
    },
    data() {
        return {
            competition: null,
            teams: null,
            message_error: null
        }
    },
    mounted() {
        axios.get('/api/competitions/'+ this.competition_id +'/teams')
        .then((response) => {
            console.log(response.data);
            this.competition = response.data.data.competition;
            this.teams = response.data.data.teams;
        })
        .catch((error) => {
            // handle error
            console.log(error)
            console.log(error.response.data.message);
            this.message_error = error.response.data.message;
        })
        .finally((response) => {
            // always executed
            // console.log(response);
        });
    },
    methods: {
        downloadTeam(id) {
            // console.log(team);
            const form = {
                team_id : id
            }
            Inertia.post(route('team.store', form));

            const notyf = new Notyf();
            notyf.success('¡Datos almacendos! Dirígase a la secciones de Equipos para visualizarlos');
        }
    }
}
</script>
